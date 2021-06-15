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
    <!-- <div class="page-title">
        <div class="title_left">
            <h4>Riwayat Prediksi Status Pertumbuhan</h4>
        </div>
    </div> -->

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="x_content">
                    <div class="row">
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                            <div class="tile-stats">
                                <h3>Accuracy</h3>
                                <div class="count">179</div>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                            <div class="tile-stats">
                                <h3>Precision</h3>
                                <div class="count">179</div>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                            <div class="tile-stats">
                                <h3>Recall</h3>
                                <div class="count">179</div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Riwayat Prediksi Status Pertumbuhan</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box table-responsive">
                                                <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Anak</th>
                                                            <th>Tanggal Prediksi</th>
                                                            <th>Usia (bulan)</th>
                                                            <th>Berat Badan</th>
                                                            <th>Tinggi Badan</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($datas as $data)
                                                        <tr>
                                                            <td>{{ $data->nama_anak }}</td>
                                                            <td>{{ date('d-m-Y', strtotime($data->created_at)) }}</td>
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