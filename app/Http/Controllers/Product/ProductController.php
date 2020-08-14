<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use Validator;

class ProductController extends Controller
{
    public function addProduct(Request $request)
    {
        $rules = [
            'pr_name' => 'required',
            'pr_quantity' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    public function getOneProduct($id){
        $product = Product::find($id);
        if(is_null($product))
        {
            return response()->json(["message" =>"Record not found"], 404);
        }
        return response()->json($product, 200);
    }

    public function getAllProducts(){
        return response()->json(Product::get(), 200);
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);
        if(is_null($product))
        {
            return response()->json(["message" =>"Record not found"], 404);
        }
        $product->update($request->all());
        return response()->json($product, 200);
    }

    public function deleteProduct(Request $request, $id){
        $product = Product::find($id);
        if(is_null($product))
        {
            return response()->json(["message" =>"Record not found"], 404);
        }
        $product->delete();
        return response()->json(["message" =>"Record Deleted"], 204);
    }

    public static function index(Request $request)
    {
            return Product::getAll();
    }
}
