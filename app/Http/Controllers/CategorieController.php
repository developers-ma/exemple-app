<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Genre::paginate(10);
        return view('categories', compact('categories'));
    }
}