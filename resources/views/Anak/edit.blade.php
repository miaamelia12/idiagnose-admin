@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@extends('layout.backend-dashboard.app')

@section('title','Monika - Admin')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Data Anak</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <form method="POST" id="validate_form" action="{{route('anak.update', $datas->id)}}" enctype="multipart/form-data">
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama">Nama Lengkap <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="nama" type="text" id="nama" required="required" class="form-control" value="{{ $datas->nama }}" autofocus>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="usia" class="col-form-label col-md-3 col-sm-3 label-align">Usia (bulan) <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="usia" id="usia" class="form-control" type="number" required="required" value="{{ $datas->usia }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="tgl_lahir" id="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="{{ $datas->tgl_lahir }}">
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Masuk Yayasan Sayap Ibu <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="tgl_masuk_ysi" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="{{ $datas->tgl_masuk_ysi }}">
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin *:</label>
                                <p class="col-md-6 col-sm-6 ">
                                    Laki-laki:
                                    <input type="radio" class="flat" name="jk" id="genderM" value="Laki-laki" {{ $datas->jk == 'Laki-laki' ? 'checked' : '' }} /> Perempuan:
                                    <input type="radio" class="flat" name="jk" id="genderF" value="Perempuan" {{ $datas->jk == 'Perempuan' ?  'checked' : '' }} />
                                </p>
                            </div>
                            <div class="item form-group">
                                <label for="IQ" class="col-form-label col-md-3 col-sm-3 label-align">IQ</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="IQ" id="IQ" class="form-control" type="number" name="IQ" value="{{ $datas->IQ }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="pendidikan">Pendidikan
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="pendidikan" name="pendidikan" class="form-control" value="{{ $datas->pendidikan }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="diagnosa">Diagnosa</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="diagnosa[]" class="form-control diagnosa" id="diagnosa" multiple="multiple">
                                        @foreach ($diagnosa as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_diagnosa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kesehatan">Kesehatan <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="kesehatan" name="kesehatan" required="required" class="form-control" value="{{ $datas->kesehatan }}">
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

@php
$diagnosa_ids = [];
@endphp

@foreach ($datas->diagnosa as $diagnose)
@php
array_push($diagnosa_ids, $diagnose->id);
@endphp
@endforeach

<script type="text/javascript">
    $(document).ready(function() {
        // Select Multiple
        $('.diagnosa').select2();
        data = [];
        data = <?php echo json_encode($diagnosa_ids); ?>;
        $('.diagnosa').val(data);
        $('.diagnosa').trigger('change');
    });
</script>
@stop

@endsection