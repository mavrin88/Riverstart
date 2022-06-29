<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'price' => 'required',
            'categories' => 'required|array|between:2,10'
        ]);

        $product = Product::create($request->all());

        $product->categories()->attach($request['categories']);

        return response()->json(['success' => true, 'product' => new ProductResource($product)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product does not exist']);
        }

        return response()->json(['success' => true, 'product' => new ProductResource($product)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'price' => 'required',
            'categories' => 'required|array|between:2,10'
        ]);

        $product = Product::find($id);

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product does not exist']);
        }

        $product->name = $request['name'];
        $product->active = $request['active'];
        $product->price = $request['price'];
        $product->save();

        $product->categories()->attach($request['categories']);

        return response()->json(['success' => true, 'category' => new CategoryResource($product)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product does not exist']);
        }

        $product->delete();

        return response()->json(['success' => true, 'message' => 'Product delete.']);
    }

    public function search(Request $request)
    {
        $products = Product::filter($request->all())->get();

        return ProductResource::collection($products);
    }
}
