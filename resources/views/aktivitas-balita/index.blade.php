@extends('layout.backend-dashboard.app')

@section('title','Monika - Admin')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Aktivitas Balita YSI Sehari-hari</h3>
        </div>
        <div class="title_right">
            <div class="col-md-4 form-group row pull-right top_search">
                <a href="{{route('aktivitas-balita.create')}}"><button type="button" class="btn btn-primary" style="margin-left: 46px;"><i class="fa fa-plus"></i> Tambah Data</button></a>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Waktu</th>
                                        <th>Kegiatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($datas as $i => $data)
                                    <tr>
                                        <td>
                                            {{ ++$i }}
                                        </td>
                                        <td>
                                            @if(empty($data->jam_selesai))
                                            {{ $data->jam_mulai }}
                                            @else
                                            {{ $data->jam_mulai }} - {{ $data->jam_selesai }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $data->kegiatan }}
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{route('anak.show', $data->id)}}">Detail</a>
                                                    <a class="dropdown-item" href="{{route('anak.edit', $data->id)}}">Edit</a>
                                                    <a class="dropdown-item" href="{{route('hapusanak', $data->id)}}">Hapus</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection