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

@include('sweetalert::alert')
<!-- top tiles -->
<div class="row">
    <div class="col-md-12">
        <div class="">
            <div class="x_content">
                <div class="row">
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-child"></i>
                            </div>
                            <div class="count">{{ $anak->count() }}</div>

                            <h3>Anak</h3>
                            <p>Total Seluruh Anak YSI</p>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-stethoscope"></i>
                            </div>
                            <div class="count">{{ $diagnosa->count() }}</div>

                            <h3>Diagnosa</h3>
                            <p>Total Diagnosa Anak</p>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-clipboard"></i>
                            </div>
                            <div class="count">{{ $konsultasi->count() }}</div>

                            <h3>Konsultasi</h3>
                            <p>Total Jadwal Konsultasi</p>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-users"></i>
                            </div>
                            <div class="count">{{ $pendamping->count() }}</div>

                            <h3>Pendamping</h3>
                            <p>Total Pendamping Konsultasi</p>
                        </div>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Riwayat Prediksi Stunting</h2>
                                <div class="nav navbar-right panel_toolbox">
                                    <a href="{{route('export-riwayat-prediksi')}}"><button type="button" class="btn btn-dark"><i class="fa fa-download"></i> Unduh</button></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">
                                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Anak</th>
                                                        <th>Tanggal Prediksi</th>
                                                        <th>Usia (bulan)</th>
                                                        <th>Berat Badan (kg)</th>
                                                        <th>Tinggi Badan (cm)</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($datas as $data)
                                                    <tr>
                                                        <td>{{ $data->nama_anak }}</td>
                                                        <td>{{ date('d M Y', strtotime($data->created_at)) }}</td>
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