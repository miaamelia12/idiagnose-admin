@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{asset('assets/template/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')}}" rel="stylesheet">
@stop

@extends('layout.backend-dashboard.app')

@section('title','Monika - Admin')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Jadwal Konsultasi</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <form method="POST" id="validate_form" action="{{route('jadwal-konsultasi.update', $datas->id)}}" enctype="multipart/form-data">
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

                            <div class="item form-group{{ $errors->has('anak_id') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="anak_id">Nama Anak <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="anak_id" class="form-control select1" id="anak_id" required autofocus>
                                        <option></option>
                                        @foreach ($anak as $an)
                                        <option value="{{ $an->id }}" {{$datas->anak_id === $an->id ? "selected" : ""}}>{{ $an->nama }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('anak_id'))
                                    <span class="red">
                                        <strong>{{ $errors->first('anak_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group{{ $errors->has('tgl_konsultasi') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Konsultasi <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div class="form-group">
                                        <div class='input-group date' id='myDatepicker2'>
                                            <input type='text' class="form-control" name="tgl_konsultasi" placeholder="dd-mm-yyyy" required autofocus value="{{ date('d M Y', strtotime($datas->tgl_konsultasi)) }}" />
                                            <span class="input-group-addon">
                                                <span class="fa fa-calendar" style="margin-top: 5px;"></span>
                                            </span>
                                        </div>
                                    </div>
                                    @if ($errors->has('tgl_konsultasi'))
                                    <span class="red">
                                        <strong>{{ $errors->first('tgl_konsultasi') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group{{ $errors->has('problema') ? ' has-error' : '' }}">
                                <label for="problema" class="col-form-label col-md-3 col-sm-3 label-align">Problema <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="problema" id="problema" class="form-control" type="text" name="problema" required autofocus value="{{ $datas->problema }}">
                                    @if ($errors->has('problema'))
                                    <span class="red">
                                        <strong>{{ $errors->first('problema') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group{{ $errors->has('konsultan_id') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="konsultan_id">Konsultan <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="konsultan_id" class="form-control select1" id="konsultan_id" required autofocus>
                                        <option></option>
                                        @foreach ($konsultan as $k)
                                        <option value="{{ $k->id }}" {{$datas->konsultan_id === $k->id ? "selected" : ""}}>{{ $k->nama_konsultan }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('konsultan_id'))
                                    <span class="red">
                                        <strong>{{ $errors->first('konsultan_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group{{ $errors->has('pendamping') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="pendamping">Pendamping <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="pendamping[]" class="form-control pendamping" id="pendamping" multiple="multiple" required autofocus>
                                        @foreach ($pendamping as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_pendamping }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('pendamping'))
                                    <span class="red">
                                        <strong>{{ $errors->first('pendamping') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group{{ $errors->has('analisis_ahli') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="analisis_ahli">Analisis Ahli</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <textarea style="height: 150px;" class="resizable_textarea form-control" name="analisis_ahli" id="analisis_ahli" autofocus><?php echo $datas['analisis_ahli'] ?></textarea>
                                    @if ($errors->has('analisis_ahli'))
                                    <span class="red">
                                        <strong>{{ $errors->first('analisis_ahli') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="status">Status <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="status" class="form-control select1" id="status" required>
                                        <option></option>
                                        <option value="Menunggu" @if($datas->status == 'Menunggu') selected @endif>Menunggu</option>
                                        <option value="Selesai" @if($datas->status == 'Selesai') selected @endif>Selesai</option>
                                    </select>
                                    @if ($errors->has('status'))
                                    <span class="red">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href="{{route('jadwal-konsultasi.index')}}"><button class="btn btn-danger" type="button">Batal</button></a>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script src="{{asset('assets/template/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>

@php
$pendamping_ids = [];
@endphp

@foreach ($datas->pendamping as $pendampings)
@php
array_push($pendamping_ids, $pendampings->id);
@endphp
@endforeach

<script type="text/javascript">
    $(document).ready(function() {
        // Select Multiple
        $('.pendamping').select2();
        data = [];
        data = <?php echo json_encode($pendamping_ids); ?>;
        $('.pendamping').val(data);
        $('.pendamping').trigger('change');

        $('.select1').select2({
            placeholder: "--- Pilih ---",
            allowClear: true
        });

        $('#myDatepicker2').datetimepicker({
            format: 'DD MMM YYYY'
        });
    });
</script>
@stop

@endsection