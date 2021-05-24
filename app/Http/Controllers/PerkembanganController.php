<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerkembanganController extends Controller
{
    public function konsultasi()
    {
        return view('Konsultasi.index');
    }
}
