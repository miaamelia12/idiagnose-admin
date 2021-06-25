<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\DaftarKonsultasi;
use App\Models\Konsultan;
use App\Models\Pendamping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class DaftarKonsultasiController extends Controller
{
    public function index()
    {
        $datas = DaftarKonsultasi::all();
        return view('konsultasi.index', compact('datas'));
    }

    public function show($id)
    {
        // $datas = DaftarKonsultasi::findOrFail($id);
        $datas = DB::table('daftar_konsultasi')
            ->leftJoin('anak', 'daftar_konsultasi.anak_id', '=', 'anak.id')
            ->leftJoin('konsultan', 'daftar_konsultasi.konsultan_id', '=', 'konsultan.id')
            ->where('daftar_konsultasi.id', $id)
            ->first();

        $pendamping = DB::table('pendamping_konsultasi')
            ->leftJoin('pendamping', 'pendamping.id', '=', 'pendamping_konsultasi.pendamping_id')
            ->where('konsultasi_id', $id)->get();

        return view('konsultasi.show', compact('datas', 'pendamping'));
    }

    public function create()
    {
        $anak = Anak::all();
        $konsultan = Konsultan::all();
        $pendamping = Pendamping::all();
        return view('konsultasi.create', compact('anak', 'konsultan', 'pendamping'));
    }

    public function store(Request $request)
    {
        DaftarKonsultasi::create([
            'anak_id' => $request->get('anak_id'),
            'tgl_konsultasi' => Carbon::createFromFormat('d M Y',  $request->get('tgl_konsultasi')),
            'problema' => $request->get('problema'),
            'konsultan_id' => $request->get('konsultan_id'),
            'analisis_ahli' => $request->get('analisis_ahli'),
        ]);

        $id_konsultasi = DB::getPdo()->lastInsertId();

        $get_pendamping = $request->get('pendamping');
        for ($i = 0; $i < count($get_pendamping); $i++) {
            $simpan_pendamping = [
                'konsultasi_id' => $id_konsultasi,
                'pendamping_id' => $get_pendamping[$i],
            ];
            DB::table('pendamping_konsultasi')->insert($simpan_pendamping);
        }

        // $input = $request->all();
        // $konsultasi = DaftarKonsultasi::create($input);
        // $konsultasi->pendamping()->attach($request->input('pendamping'));

        return redirect()->route('konsultasi.index');
    }

    public function edit($id)
    {
        $datas = DaftarKonsultasi::findOrFail($id);
        $anak = Anak::all();
        $konsultan = Konsultan::all();
        $pendamping = Pendamping::all();
        // $pendamping = DB::table('pendamping_konsultasi')
        //     ->join('pendamping', 'pendamping.id', '=', 'pendamping_konsultasi.pendamping_id')
        //     ->where('konsultasi_id', $id)->get();

        return view('konsultasi.edit', compact('datas', 'anak', 'konsultan', 'pendamping'));
    }

    public function update(Request $request, $id)
    {
        // $input = $request->all();
        // $konsultasi = DaftarKonsultasi::create($input);
        // $konsultasi->pendamping()->attach($request->input('pendamping'));

        $konsultasi = DaftarKonsultasi::find($id)->update([
            'anak_id' => $request->get('anak_id'),
            'tgl_konsultasi' => Carbon::createFromFormat('d M Y',  $request->get('tgl_konsultasi')),
            'problema' => $request->get('problema'),
            'konsultan_id' => $request->get('konsultan_id'),
            'analisis_ahli' => $request->get('analisis_ahli'),
        ]);

        $get_pendamping = $request->get('pendamping');
        DB::table('pendamping_konsultasi')->where('konsultasi_id', $id)->truncate();
        for ($i = 0; $i < count($get_pendamping); $i++) {
            $simpan_pendamping = [
                'konsultasi_id' => $id,
                'pendamping_id' => $get_pendamping[$i],
            ];
            DB::table('pendamping_konsultasi')->insert($simpan_pendamping);
        }
        // $input->pendamping()->updateExistingPivot($input->id, $request['pendamping_id']);
        // $request->all();
        // $konsultasi->update($request->all());
        // $konsultasi->pendamping()->sync($request->input('pendamping'));

        return redirect()->route('konsultasi.index');
    }

    public function hapus($id)
    {
        DaftarKonsultasi::findOrFail($id)->delete();
        return redirect()->route('konsultasi.index');
    }
}
