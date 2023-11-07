<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubmitPriceRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index(Request $request) {
        $cacheKey = 'get_products_' . serialize($request->query());

        if(Cache::has($cacheKey)) {
            $products = Cache::get($cacheKey);
        } else {
            $products = Product::filter($request->query())->get();
            Cache::put($cacheKey, $products);
        }

        return response()->json($products);
    }

    public function submitPrice(SubmitPriceRequest $request) {
        try {
            $product = Product::findOrFail($request->product_id);

            $product->offers()->updateOrCreate(
                [
                    'user_id' => $request->user_id
                ],
                [
                    'price' => $request->price,
                    'user_id' => $request->user_id
                ]
            );

            return response()->json([
                'message' => 'Your price offer was sent.'
            ]);
        } catch(\Exception $ex) {
            return response()->json([
                'message' => 'Error: ' . $ex->getMessage()
            ]);
        }
    }
}
