<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function categories()
    {
        return view('categories');
    }

    public function category($category)
    {
        // dump($category);
        return view('category', compact('category'));
    }

    public function product($product = 'кривая ссылка')
    {
        return view('product', ['product' => $product]);
    }
}
