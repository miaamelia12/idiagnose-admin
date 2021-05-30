<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Diagnosa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnakController extends Controller
{
    public function index()
    {
        $datas = Anak::all();
        return view('anak.index', compact('datas'));
    }

    public function show($id)
    {
        $datas = Anak::findOrFail($id);
        return view('anak.show', compact('datas'));
    }

    public function create()
    {
        $diagnosa = Diagnosa::all();
        return view('anak.create', compact('diagnosa'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $anak = Anak::create($input);
        $anak->diagnosa()->attach($request->input('diagnosa'));

        return redirect()->route('anak.index');
    }

    public function edit($id)
    {
        $datas = Anak::findOrFail($id);
        $diagnosa = Diagnosa::all();

        return view('anak.edit', compact('datas', 'diagnosa'));
    }

    public function update(Request $request, $id)
    {
        $anak = Anak::findOrFail($id);
        $request->all();
        $anak->update($request->all());
        $anak->diagnosa()->sync($request->input('diagnosa'));

        return redirect()->route('anak.index');
    }

    public function hapus($id)
    {
        Anak::findOrFail($id)->delete();
        return redirect()->route('anak.index');
    }
}
