<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Genre::all();
        return view('categories', compact('categories'));
    }
}