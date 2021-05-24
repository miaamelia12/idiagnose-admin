<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PertumbuhanController extends Controller
{
    public function index()
    {
        return view('Pertumbuhan.index');
    }
}
