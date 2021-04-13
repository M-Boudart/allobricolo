<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();

        return view('backend.category.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'category' => 'required|unique:categories|string|max:30',
        ]);

        $result = Category::insert(['category' => $request->category]);

        if ($result) {
            return redirect()->route('backend.category.index')->with('success', 'La catégorie a été ajoutée');
        }

        return redirect()->route('backend.category.index')->with('error', 'Une erreur est survenue lors de la création de la catégorie');
    }
}
