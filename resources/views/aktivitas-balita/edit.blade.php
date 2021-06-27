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
            <h3>Edit Jadwal Aktivitas Balita</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <form method="POST" id="validate_form" action="{{route('aktivitas-balita.update', $datas->id)}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Edit Data</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                            <div class="item form-group{{ $errors->has('kegiatan') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kegiatan">Kegiatan <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="kegiatan" type="text" id="kegiatan" required class="form-control" autofocus value="{{ $datas->kegiatan }}">
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
                                            <input type='text' class="form-control" name="jam_mulai" value="{{ date('H:i', strtotime($datas->jam_mulai)) }}" required autofocus />
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Jam Selesai <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div class="form-group">
                                        <div class='input-group date' id='myDatepicker4'>
                                            <input type='text' class="form-control" name="jam_selesai" value="{{ date('H:i', strtotime($datas->jam_selesai)) }}" required autofocus />
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
                                    <input name="keterangan" type="text" id="keterangan" class="form-control" value="{{ $datas->keterangan }}" autofocus>
                                    @if ($errors->has('keterangan'))
                                    <span class="red">
                                        <strong>{{ $errors->first('keterangan') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="kategori_aktivitas" type="text" id="kategori_aktivitas" class="form-control" value="Balita" hidden>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href="{{route('aktivitas-balita.index')}}"><button class="btn btn-danger" type="button">Batal</button></a>
                                    <button type="submit" class="btn btn-success">Update</button>
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