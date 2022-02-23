<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaotouController extends Controller
{
    public function index()
    {
        return view('maotou.index');
    }
}
