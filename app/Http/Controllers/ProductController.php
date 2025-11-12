<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index(Request $request)
    {
        //default per 5 pages
        $perPage = $request->input('per_page', 5);

        $products = Product::latest()->paginate($perPage)->withQueryString();

        return view('products.index', compact('products', 'perPage'));
    }
}

