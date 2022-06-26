<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request) {

    }

    public function list(Request $request) {
        $data = [];
        $data['products'] = Product::all();
        return view('products.list')->with($data);
    }
}
