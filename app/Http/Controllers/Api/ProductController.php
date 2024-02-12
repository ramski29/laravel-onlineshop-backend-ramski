<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //index api
    public function index()
    {
        // Retrieve all products
        $products = Product::all();

        // Return the products as JSON response
        return response()->json([
            'status' => 'success',
            'data' => $products
        ], 200);
    }
}
