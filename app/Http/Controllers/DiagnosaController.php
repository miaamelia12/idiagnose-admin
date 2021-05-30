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

        return view('diagnosa.edit', compact('datas'));
    }

    public function update(Request $request, $id)
    {
        $diagnosa = Diagnosa::findOrFail($id);
        $request->all();
        $diagnosa->update($request->all());

        return redirect()->route('diagnosa.index');
    }

    public function hapus($id)
    {
        Diagnosa::findOrFail($id)->delete();
        return redirect()->route('diagnosa.index');
    }
}
