<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ДЛЯ СОЗДАНИЯ ШАБЛОНА (7 ФУНКЦИЙ) ЭТОГО КОНТРОЛЛЕРА ИСПОЛЬЗОВАЛОСЬ php artisan make:controller Admin/CategoryController --resource --model=Category
        $categories = Category::get();
        return view('auth.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.categories.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $path = $request->file('image')->store('categories');
        $params = $request->all(); // собираем все что прилетело из POST
        $params['image'] = $path; // подменяем сгенерированным
        Category::create($params);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // в компакт category берется из прилетевшего из вьюшки значения resources/views/auth/categories/index.blade.php
        return view('auth.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // в компакт category берется из прилетевшего из вьюшки значения resources/views/auth/categories/index.blade.php
        return view('auth.categories.form', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $params = $request->all(); // собираем все что прилетело из POST
        unset($params['image']);
        if ($request->has('image') ) {
            Storage::delete($category->image); // удаляем старый файл
            $path = $request->file('image')->store('categories');
            $params['image'] = $path; // подменяем сгенерированным
        }
        $category->update($params);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
