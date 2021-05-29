<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    public function index()
    {
        $datas = Diagnosa::all();
        return view('diagnosa.index', compact('datas'));
    }

    public function create()
    {
        return view('diagnosa.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Diagnosa::create($input);

        return redirect()->route('diagnosa.index');
    }

    public function edit($id)
    {
        $datas = Diagnosa::findOrFail($id);
        $diagnosa = Diagnosa::all();

        return view('diagnosa.edit', compact('datas', 'diagnosa'));
    }
}
