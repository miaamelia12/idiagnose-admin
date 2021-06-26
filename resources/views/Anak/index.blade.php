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
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Data Anak</h3>
        </div>
        <div class="title_right">
            <div class="col-md-4 form-group row pull-right top_search">
                <a href="{{route('anak.create')}}"><button type="button" class="btn btn-primary" style="margin-left: 46px;"><i class="fa fa-plus"></i> Tambah Data</button></a>
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
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="display:none;">Id</th>
                                            <th>Nama</th>
                                            <th>Tgl Lahir</th>
                                            <th>Tgl Masuk YSI</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Pendidikan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($datas as $data)
                                        <tr>
                                            <input type="hidden" class="serdelete_val_id" value="{{ $data->id }}">
                                            <td style="display:none;">{{ $data->id }}</td>
                                            <td>
                                                {{ $data->nama }}
                                            </td>
                                            <td>
                                                {{ date('d M Y', strtotime($data->tgl_lahir)) }}
                                            </td>
                                            <td>
                                                {{ date('d M Y', strtotime($data->tgl_masuk_ysi)) }}
                                            </td>
                                            <td>
                                                {{ $data->jk }}
                                            </td>
                                            <td>
                                                {{ $data->pendidikan }}
                                            </td>
                                            <td>
                                                <a class="btn btn-success" href="{{ route('anak.edit', $data->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                                                <button class="btn btn-danger deletebtn"><i class="fa fa-trash-o"></i></button>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#datatable').DataTable();

        $('#datatable').on('click', '.deletebtn', function(e) {
            e.preventDefault();

            var delete_id = $(this).closest("tr").find('.serdelete_val_id').val();

            swal({
                    title: "Apakah Anda Yakin?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var data = {
                            "_token": $('input[name="csrf-token"]').val(),
                            "id": delete_id,
                        };
                        $.ajax({
                            type: "DELETE",
                            url: '/anak-delete/' + delete_id,
                            data: data,
                            success: function(response) {
                                swal(response.status, {
                                        icon: "success",
                                    })
                                    .then((result) => {
                                        location.reload();
                                    });
                            }
                        });
                    }
                });
        });

    });
</script>

@stop

@endsection