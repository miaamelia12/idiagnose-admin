<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HasilPemeriksaanController extends Controller
{
    public function index()
    {
        return view('hasil-pemeriksaan.index');
    }
}
