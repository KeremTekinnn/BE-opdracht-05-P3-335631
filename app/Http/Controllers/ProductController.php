<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
            ->join('stores', 'products.id', '=', 'stores.product_id')
            ->join('product_users', 'products.id', '=', 'product_users.product_id')
            ->select('products.*', 'stores.unit', 'product_users.amount')
            ->get();

        return view('dashboard', ['products' => $products]);
    }
}
