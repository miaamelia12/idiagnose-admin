@extends('layout.backend-dashboard.app')

@section('title','Monika - Admin')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Hasil Prediksi Stunting</h3>
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
                                {{ $get_hasil->nama_anak }}
                            </td>
                        </tr>
                        <tr>
                            <td width="35%">Usia</td>
                            <td width="1%"> : </td>
                            <td>
                                {{ $get_hasil->usia }} bulan
                            </td>
                        </tr>
                        <tr>
                            <td width="35%">Berat Badan</td>
                            <td width="1%"> : </td>
                            <td>
                                {{ $get_hasil->berat_badan }} kg
                            </td>
                        </tr>
                        <tr>
                            <td width="35%">Tinggi Badan</td>
                            <td width="1%"> : </td>
                            <td>
                                {{ $get_hasil->tinggi_badan }} cm
                            </td>
                        </tr>
                        <tr>
                            <td width="35%">Status</td>
                            <td width="1%"> : </td>
                            <td>
                                @if($get_hasil->status == "Normal")
                                <span class="badge badge-success">{{ $get_hasil->status }}</span>
                                @elseif($get_hasil->status == "Pendek")
                                <span class="badge badge-warning">{{ $get_hasil->status }}</span>
                                @elseif($get_hasil->status == "Sangat Pendek")
                                <span class="badge badge-danger">{{ $get_hasil->status }}</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection