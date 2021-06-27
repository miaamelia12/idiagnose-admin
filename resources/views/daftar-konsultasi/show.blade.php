@extends('layout.backend-dashboard.app')

@section('title','Monika - Admin')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Detail Konsultasi</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <br />
                    <table class="table table-stripped" width="100%">
                        <tr>
                            <td width="35%">Nama Anak </td>
                            <td width="1%"> : </td>
                            <td>
                                {{ $datas->nama }}
                            </td>
                        </tr>
                        <tr>
                            <td width="35%">Tanggal Konsultasi</td>
                            <td width="1%"> : </td>
                            <td>{{ date('d M Y', strtotime($datas->tgl_konsultasi)) }}</td>
                        </tr>
                        <tr>
                            <td width="35%">Problema </td>
                            <td width="1%"> : </td>
                            <td>{{ $datas->problema }}</td>
                        </tr>
                        <tr>
                            <td width="35%">Konsultan </td>
                            <td width="1%"> : </td>
                            <td>
                                {{ $datas->nama_konsultan }}
                            </td>
                        </tr>
                        <tr>
                            <td width="35%">Spesialis </td>
                            <td width="1%"> : </td>
                            <td>
                                {{ $datas->spesialis }}
                            </td>
                        </tr>
                        <tr>
                            <td width="35%">Rumah Sakit </td>
                            <td width="1%"> : </td>
                            <td>
                                {{ $datas->rumah_sakit }}
                            </td>
                        </tr>
                        <tr>
                            <td width="35%">Pendamping </td>
                            <td width="1%"> : </td>
                            <td>
                                @foreach($pendamping as $item)
                                <span>{{ $item->nama_pendamping }}</span>, <br />
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td width="35%">Analisis Ahli </td>
                            <td width="1%"> : </td>
                            <td>{{ $datas->analisis_ahli }}</td>
                        </tr>
                        <tr>
                            <td width="35%">Status </td>
                            <td width="1%"> : </td>
                            <td>
                                @if($datas->status == "Selesai")
                                <span class="badge badge-success">{{ $datas->status }}</span>
                                @elseif($datas->status == "Menunggu")
                                <span class="badge badge-warning">{{ $datas->status }}</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                    <br>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-10">
                            <button type="submit" onclick="window.location='{{ route("daftar-konsultasi.index")}}'" class="btn btn-secondary">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection