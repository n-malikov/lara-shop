<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function categories()
    {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    public function category($code)
    {
        // dump($category);
        $category = Category::where('code', $code)->first();
        // dd($categoryObject);
        return view('category', compact('category'));
    }

    public function product($product = 'кривая ссылка')
    {
        return view('product', ['product' => $product]);
    }
}
