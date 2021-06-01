<?php

namespace App\Http\Controllers;

use App\Models\Konsultan;
use Illuminate\Http\Request;

class KonsultanController extends Controller
{
    public function index()
    {
        $datas = Konsultan::all();
        return view('konsultan.index', compact('datas'));
    }

    public function create()
    {
        return view('konsultan.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Konsultan::create($input);

        return redirect()->route('konsultan.index');
    }

    public function edit($id)
    {
        $datas = Konsultan::findOrFail($id);

        return view('konsultan.edit', compact('datas'));
    }

    public function update(Request $request, $id)
    {
        $konsultan = Konsultan::findOrFail($id);
        $request->all();
        $konsultan->update($request->all());

        return redirect()->route('konsultan.index');
    }

    public function hapus($id)
    {
        Konsultan::findOrFail($id)->delete();
        return redirect()->route('konsultan.index');
    }
}
