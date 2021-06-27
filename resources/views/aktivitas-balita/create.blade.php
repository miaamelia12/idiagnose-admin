@section('css')
<!-- bootstrap-datetimepicker -->
<link href="{{asset('assets/template/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')}}" rel="stylesheet">
@stop

@extends('layout.backend-dashboard.app')

@section('title','Monika - Admin')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Tambah Jadwal Aktivitas Balita</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <form method="POST" id="validate_form" action="{{route('aktivitas-balita.store')}}" enctype="multipart/form-data">
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

                            <div class="item form-group{{ $errors->has('kegiatan') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kegiatan">Kegiatan <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="kegiatan" type="text" id="kegiatan" value="{{ old('kegiatan') }}" required class="form-control" autofocus>
                                    @if ($errors->has('kegiatan'))
                                    <span class="red">
                                        <strong>{{ $errors->first('kegiatan') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group{{ $errors->has('jam_mulai') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Jam Mulai <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div class="form-group">
                                        <div class='input-group date' id='myDatepicker3'>
                                            <input type='text' class="form-control" name="jam_mulai" value="{{ old('jam_mulai') }}" required autofocus />
                                            <span class="input-group-addon">
                                                <span class="fa fa-clock-o" style="margin-top: 5px;"></span>
                                            </span>
                                        </div>
                                    </div>
                                    @if ($errors->has('jam_mulai'))
                                    <span class="red">
                                        <strong>{{ $errors->first('jam_mulai') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group{{ $errors->has('jam_selesai') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Jam Selesai</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div class="form-group">
                                        <div class='input-group date' id='myDatepicker4'>
                                            <input type='text' class="form-control" name="jam_selesai" value="{{ old('jam_selesai') }}" autofocus />
                                            <span class="input-group-addon">
                                                <span class="fa fa-clock-o" style="margin-top: 5px;"></span>
                                            </span>
                                        </div>
                                    </div>
                                    @if ($errors->has('jam_selesai'))
                                    <span class="red">
                                        <strong>{{ $errors->first('jam_selesai') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="keterangan">Keterangan</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="keterangan" type="text" id="keterangan" value="{{ old('keterangan') }}" class="form-control" autofocus>
                                    @if ($errors->has('keterangan'))
                                    <span class="red">
                                        <strong>{{ $errors->first('keterangan') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="kategori_aktivitas" type="hidden" id="kategori_aktivitas" class="form-control" value="Balita">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href="{{route('aktivitas-balita.index')}}"><button class="btn btn-danger" type="button">Batal</button></a>
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
<!-- bootstrap-datetimepicker -->
<script src="{{asset('assets/template/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>

<script type="text/javascript">
    $('#myDatepicker3').datetimepicker({
        format: 'HH:mm'
    });

    $('#myDatepicker4').datetimepicker({
        format: 'HH:mm'
    });
</script>
@stop

@endsection