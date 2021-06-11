@extends('layout.backend-dashboard.app')

@section('title','Monika - Admin')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Hasil Prediksi Status Pertumbuhan</h3>
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
                                {{ $get_hasil->usia }}
                            </td>
                        </tr>
                        <tr>
                            <td width="35%">Berat Badan</td>
                            <td width="1%"> : </td>
                            <td>
                                {{ $get_hasil->berat_badan }}
                            </td>
                        </tr>
                        <tr>
                            <td width="35%">Tinggi Badan</td>
                            <td width="1%"> : </td>
                            <td>
                                {{ $get_hasil->tinggi_badan }}
                            </td>
                        </tr>
                        <tr>
                            <td width="35%">Status Pertumbuhan </td>
                            <td width="1%"> : </td>
                            <td>
                                <span class="badge badge-warning">{{ $get_hasil->status }}</span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection