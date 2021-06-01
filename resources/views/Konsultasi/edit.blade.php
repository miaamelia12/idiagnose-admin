@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@extends('layout.backend-dashboard.app')

@section('title','Monika - Admin')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Daftar Konsultasi</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <form method="POST" id="validate_form" action="{{route('konsultasi.update', $datas->id)}}" enctype="multipart/form-data">
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

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="anak_id">Nama Anak</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="anak_id" class="form-control select1" id="anak_id">
                                        <option></option>
                                        @foreach ($anak as $an)
                                        <option value="{{ $an->id }}" {{$datas->anak_id === $an->id ? "selected" : ""}}>{{ $an->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Konsultasi <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="tgl_konsultasi" id="tgl_konsultasi" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="{{ $datas->tgl_konsultasi }}">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="problema" class="col-form-label col-md-3 col-sm-3 label-align">Problema</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="problema" id="problema" class="form-control" type="text" name="problema" value="{{ $datas->problema }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="konsultan_id">Konsultan</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="konsultan_id" class="form-control select1" id="konsultan_id">
                                        <option></option>
                                        @foreach ($konsultan as $k)
                                        <option value="{{ $k->id }}" {{$datas->konsultan_id === $k->id ? "selected" : ""}}>{{ $k->nama_konsultan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="pendamping">Pendamping</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="pendamping[]" class="form-control select" id="pendamping" multiple="multiple">
                                        @foreach ($pendamping as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_pendamping }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="analisis_ahli">Analisis Ahli</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="analisis_ahli" name="analisis_ahli" class="form-control" value="{{ $datas->analisis_ahli }}">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href="{{route('konsultasi.index')}}"><button class="btn btn-danger" type="button">Batal</button></a>
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

@php
$pendamping_ids = [];
@endphp

@foreach ($datas->pendamping as $pend)
@php
array_push($pendamping_ids, $pend->id);
@endphp
@endforeach

<script type="text/javascript">
    $(document).ready(function() {
        // Select Multiple
        $('.select').select2();
        data = [];
        data = <?php echo json_encode($pendamping_ids); ?>;
        $('.select').val(data);
        $('.select').trigger('change');

        $('.select1').select2({
            placeholder: "--- Pilih ---",
            allowClear: true
        });
    });
</script>
@stop

@endsection