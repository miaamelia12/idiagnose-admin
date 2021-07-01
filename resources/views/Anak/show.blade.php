@extends('layout.backend-dashboard.app')

@section('title','Monika - Admin')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Detail Data Anak</h3>
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
                            <td width="35%">Nama Lengkap </td>
                            <td width="1%"> : </td>
                            <td>{{ $datas->nama }}</td>
                        </tr>
                        <tr>
                            <td width="35%">Usia</td>
                            <td width="1%"> : </td>
                            <td>{{ $datas->usia }} bulan</td>
                        </tr>
                        <tr>
                            <td width="35%">Berat Badan</td>
                            <td width="1%"> : </td>
                            <td>{{ $datas->berat_badan }} kg</td>
                        </tr>
                        <tr>
                            <td width="35%">Tinggi Badan</td>
                            <td width="1%"> : </td>
                            <td>{{ $datas->tinggi_badan }} cm</td>
                        </tr>
                        <tr>
                            <td width="35%">Tanggal Lahir </td>
                            <td width="1%"> : </td>
                            <td>{{ date('d M Y', strtotime($datas->tgl_lahir)) }}</td>
                        </tr>
                        <tr>
                            <td width="35%">Tanggal Masuk Yayasan Sayap Ibu </td>
                            <td width="1%"> : </td>
                            <td>{{ date('d M Y', strtotime($datas->tgl_masuk_ysi)) }}</td>
                        </tr>
                        <tr>
                            <td width="35%">Jenis Kelamin </td>
                            <td width="1%"> : </td>
                            <td>{{ $datas->jk }}</td>
                        </tr>
                        <tr>
                            <td width="35%">Diagnosa </td>
                            <td width="1%"> : </td>
                            <td>
                                @foreach($datas->diagnosa as $item)
                                <span>{{ $item->nama_diagnosa }}</span>, <br />
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td width="35%">Kesehatan </td>
                            <td width="1%"> : </td>
                            <td>{{ $datas->kesehatan }}</td>
                        </tr>
                        <tr>
                            <td width="35%">Pendidikan </td>
                            <td width="1%"> : </td>
                            <td>{{ $datas->pendidikan }}</td>
                        </tr>
                    </table>
                    <br>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-10">
                            <button type="submit" onclick="window.location='{{ route("anak.index")}}'" class="btn btn-secondary">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection