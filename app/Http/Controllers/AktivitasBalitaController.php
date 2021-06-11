<?php

namespace App\Http\Controllers;

use App\Models\AktivitasBalita;
use Illuminate\Http\Request;

class AktivitasBalitaController extends Controller
{
    public function index(Request $request)
    {
        $datas = AktivitasBalita::all();
        return view('aktivitas-balita.index', compact('datas'));
    }

    public function create()
    {
        return view('aktivitas-balita.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        AktivitasBalita::create($input);

        return redirect()->route('aktivitas-balita.index');
    }
}
