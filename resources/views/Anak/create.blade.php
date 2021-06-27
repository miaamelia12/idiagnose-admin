@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{asset('assets/template/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')}}" rel="stylesheet">
@stop

@extends('layout.backend-dashboard.app')

@section('title','Monika - Admin')

@section('content')

@include('sweetalert::alert')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Tambah Data Anak</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <form method="POST" id="validate_form" action="{{route('anak.store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Tambah Data</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                            <div class="item form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama">Nama Lengkap <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="nama" type="text" id="nama" value="{{ old('nama') }}" required class="form-control" autofocus>
                                    @if ($errors->has('nama'))
                                    <span class="red">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <input name="usia" id="usia" value="{{ old('usia') }}" max="60" hidden>

                            <div class="item form-group{{ $errors->has('berat_badan') ? ' has-error' : '' }}">
                                <label for="berat_badan" class="col-form-label col-md-3 col-sm-3 label-align">Berat Badan <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="berat_badan" id="berat_badan" class="form-control" type="text" value="{{ old('berat_badan') }}" required="required" min="0">
                                    @if ($errors->has('berat_badan'))
                                    <span class="red">
                                        <strong>{{ $errors->first('berat_badan') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div style="padding-top: 10px;">
                                    kg
                                </div>
                            </div>
                            <div class="item form-group{{ $errors->has('tinggi_badan') ? ' has-error' : '' }}">
                                <label for="tinggi_badan" class="col-form-label col-md-3 col-sm-3 label-align">Tinggi Badan <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="tinggi_badan" id="tinggi_badan" class="form-control" type="text" value="{{ old('tinggi_badan') }}" required="required" min="0">
                                    @if ($errors->has('tinggi_badan'))
                                    <span class="red">
                                        <strong>{{ $errors->first('tinggi_badan') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div style="padding-top: 10px;">
                                    cm
                                </div>
                            </div>
                            <div class="item form-group{{ $errors->has('tgl_lahir') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div class="form-group">
                                        <div class='input-group date' id='myDatepicker2'>
                                            <input type='text' class="form-control" name="tgl_lahir" value="{{ old('tgl_lahir') }}" placeholder="dd-mm-yyyy" />
                                            <span class="input-group-addon">
                                                <span class="fa fa-calendar" style="margin-top: 5px;"></span>
                                            </span>
                                        </div>
                                    </div>
                                    @if ($errors->has('tgl_lahir'))
                                    <span class="red">
                                        <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group{{ $errors->has('tgl_masuk_ysi') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Masuk Yayasan Sayap Ibu <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div class='input-group date' id='myDatepicker3'>
                                        <input type='text' class="form-control" name="tgl_masuk_ysi" value="{{ old('tgl_masuk_ysi') }}" placeholder="dd-mm-yyyy" />
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar" style="margin-top: 5px;"></span>
                                        </span>
                                    </div>
                                    @if ($errors->has('tgl_masuk_ysi'))
                                    <span class="red">
                                        <strong>{{ $errors->first('tgl_masuk_ysi') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group{{ $errors->has('jk') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin :</label>
                                <p class="col-md-6 col-sm-6" style="padding-top: 10px;">
                                    Laki-laki:
                                    <input type="radio" class="flat" name="jk" id="genderM" value="Laki-laki" checked="" /> Perempuan:
                                    <input type="radio" class="flat" name="jk" id="genderF" value="Perempuan" />
                                </p>
                            </div>
                            <div class="item form-group{{ $errors->has('IQ') ? ' has-error' : '' }}">
                                <label for="IQ" class="col-form-label col-md-3 col-sm-3 label-align">IQ</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="IQ" id="IQ" class="form-control" type="number" min="0" value="{{ old('IQ') }}" name="IQ">
                                    @if ($errors->has('IQ'))
                                    <span class="red">
                                        <strong>{{ $errors->first('IQ') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group{{ $errors->has('pendidikan') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="pendidikan">Pendidikan <span class="required">*</span></label>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="pendidikan" name="pendidikan" value="{{ old('pendidikan') }}" class="form-control" required>
                                    @if ($errors->has('pendidikan'))
                                    <span class="red">
                                        <strong>{{ $errors->first('pendidikan') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group{{ $errors->has('diagnosa') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="diagnosa">Diagnosa</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="diagnosa[]" class="form-control diagnosa" id="diagnosa" multiple="multiple">
                                        @foreach ($diagnosa as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_diagnosa }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('diagnosa'))
                                    <span class="red">
                                        <strong>{{ $errors->first('diagnosa') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- <button type="button" class="btn btn-primary btnAdd" data-bs-toggle="modal" data-bs-target="#modal-default">
                                    Tambah Diagnosa
                                </button> -->
                                <!-- Adding Diagnosa Modal -->
                                <!-- <div class="modal fade" id="modalTambah">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Tambah Diagnosa Baru</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" id="add_name" name="add_name">
                                                <div class="modal-body">
                                                    {{ csrf_field() }}
                                                    <table id="dynamic_field" class="table">
                                                        <tr>
                                                            <th>
                                                                <label>Nama Diagnosa</label>
                                                            </th>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="nama-diagnosa" name="nama-diagnosa[]" class="form-control">
                                                            </td>
                                                            <td>
                                                                <button type="button" name="add" id="add" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="button" class="btn btn-primary btnBuat">Simpan</button>
                                                </div>
                                            </form>
                                        </div> -->
                                <!-- /.modal-content -->
                                <!-- </div> -->
                                <!-- /.modal-dialog -->
                                <!-- </div> -->
                                <!-- Adding Diagnosa Modal -->
                            </div>
                            <div class="item form-group{{ $errors->has('kesehatan') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kesehatan">Kesehatan <span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <textarea style="height: 150px;" class="resizable_textarea form-control" name="kesehatan" id="kesehatan" required="required" value="{{ old('kesehatan') }}" autofocus></textarea>
                                    @if ($errors->has('kesehatan'))
                                    <span class="red">
                                        <strong>{{ $errors->first('kesehatan') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href="{{route('anak.index')}}"><button class="btn btn-danger" type="button">Batal</button></a>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script src="{{asset('assets/template/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Select Multiple
        $('.diagnosa').select2();

        $('#myDatepicker2').datetimepicker({
            format: 'DD MMM YYYY'
        });

        $('#myDatepicker3').datetimepicker({
            format: 'DD MMM YYYY'
        });
        // Form Dynamic
        // var i = 1;

        // $('#add').click(function() {
        //     var nama_diagnosa = $("#nama-diagnosa").val();
        //     i++;
        //     $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added"><td><input type="text" id="nama-diagnosa" name="nama-diagnosa[]" class="form-control" value="' + nama_diagnosa + '" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove"><i class="fa fa-close"></i></button></td></tr>');
        // });

        // $(document).on('click', '.btn_remove', function() {
        //     var button_id = $(this).attr("id");
        //     $('#row' + button_id + '').remove();
        // });
    });
</script>
@stop

@endsection