<?php

namespace App\Http\Controllers;

use App\Imports\DataTrainingImport;
use App\Models\DataTraining;
use Illuminate\Http\Request;

use Excel;

class DataTrainingController extends Controller
{
    public function index()
    {
        $datas = DataTraining::all();
        return view('data-sampel.index', compact('datas'));
    }

    public function create()
    {
        return view('data-sampel.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        DataTraining::create($input);

        return redirect()->route('data-sampel.index');
    }

    public function import(Request $request)
    {
        Excel::import(new DataTrainingImport, $request->file);

        return back();
    }

    public function edit($id)
    {
        $datas = DataTraining::findOrFail($id);
        return view('data-sampel.edit', compact('datas'));
    }

    public function update(Request $request, $id)
    {
        $datas = DataTraining::findOrFail($id);
        $request->all();
        $datas->update($request->all());

        return redirect()->route('data-sampel.index');
    }

    public function hapus($id)
    {
        DataTraining::findOrFail($id)->delete();
        return redirect()->route('data-sampel.index');
    }
}
