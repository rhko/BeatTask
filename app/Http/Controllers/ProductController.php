<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Traits\ImageUpload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    use ImageUpload;

    public function index() {
        return view('product.index', [
            'products' => Product::
                            where('user_id', Auth::user()->id)
                            ->with(['offers' => function($q) {
                                $q->orderBy('updated_at', 'desc');
                            }])
                            ->paginate()
        ]);
    }

    public function show(Product $product) {
        if($product->user_id != Auth::user()->id) {
            abort(403, 'You cannot show this product!');
        }
        return view('product.show', compact('product'));
    }

    public function create() {
        return view('product.create');
    }

    public function store(ProductRequest $request) {
        $data = $request->only('name', 'description');
        $data['image'] = $this->uploadImage($request);

        Product::create($data);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully!');
    }
}
