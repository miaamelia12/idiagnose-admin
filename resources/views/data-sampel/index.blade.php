@section('css')
<!-- Datatables -->

<link href="{{asset('assets/template/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/template/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/template/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/template/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/template/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
@stop

@extends('layout.backend-dashboard.app')

@section('title','Monika - Admin')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Data Sampel</h3>
        </div>
        <div class="title_right">
            <form action="{{route('import.file')}}" method="post" class="form-inline col-md-8 pull-right" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="file" class="form-control" name="file" required="">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-success" style="height: 38px; margin-left: -2px;">Import</button>
                    </span>
                </div>
            </form>
            <div class="col-md-4 form-group row pull-right top_search">
                <a href="{{route('data-sampel.create')}}"><button type="button" class="btn btn-primary" style="margin-left: 46px;"><i class="fa fa-plus"></i> Tambah Data</button></a>
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
                            <div class="card-box table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Usia (bulan)</th>
                                            <th>Berat Badan</th>
                                            <th>Tinggi Badan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($datas as $data)
                                        <tr>
                                            <td>{{ $data->nama_anak }}</td>
                                            <td>{{ $data->usia }}</td>
                                            <td>{{ $data->berat_badan }}</td>
                                            <td>{{ $data->tinggi_badan }}</td>
                                            <td>
                                                @if($data->status == "Normal")
                                                <span class="badge badge-success">{{ $data->status }}</span>
                                                @elseif($data->status == "Pendek")
                                                <span class="badge badge-warning">{{ $data->status }}</span>
                                                @elseif($data->status == "Sangat Pendek")
                                                <span class="badge badge-danger">{{ $data->status }}</span>
                                                @endif
                                            </td>
                                            <!-- <td>{{ $data->status }}</td> -->
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{route('data-sampel.edit', $data->id)}}">Edit</a>
                                                        <a class="dropdown-item" href="{{route('hapusdata', $data->id)}}">Hapus</a>
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
</div>
@section('js')
<!-- Datatables -->
<script src="{{asset('assets/template/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/template/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/template/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/template/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/template/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/template/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/template/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('assets/template/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('assets/template/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/template/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{asset('assets/template/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
<script src="{{asset('assets/template/vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{asset('assets/template/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/template/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
@show

@endsection