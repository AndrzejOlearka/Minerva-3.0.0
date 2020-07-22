<?php

namespace App\Http\Controllers;

class AuthorsController extends Controller
{
    public function index()
    {
        return view('authors');
    }
}
