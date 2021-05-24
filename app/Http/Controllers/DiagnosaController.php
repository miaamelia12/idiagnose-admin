<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    public function store(Request $request)
    {
        $diagnosa = new Diagnosa();

        $diagnosa->nama_diagnosa = $request->input('nama_diagnosa');

        $diagnosa->save();

        return redirect('anak.create')->with('success', 'Data tersimpan');
    }
}
