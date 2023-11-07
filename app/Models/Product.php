<?php

namespace App\Models;

use App\Casts\ImageCast;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'image'
    ];

    protected $casts = [
        'image' => ImageCast::class,
    ];

    protected static function booted()
    {
        static::creating(function(Product $product) {
            $product->user_id = Auth::user()->id;
        });

        static::created(function() {
            Cache::flush();
        });
    }

    public function scopeFilter(Builder $builder, $filters) {
        $builder->when($filters['seller_filter'] ?? false, function($builder, $value) {
            $builder->whereHas('user', function($q) use($value) {
                $q->where('name', 'LIKE', "%{$value}%");
            });
        });

        $builder->when($filters['product_filter'] ?? false, function($builder, $value) {
            $builder->where('products.name', 'LIKE', "%{$value}%");
        });
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function offers() {
        return $this->hasMany(Offer::class);
    }
}
