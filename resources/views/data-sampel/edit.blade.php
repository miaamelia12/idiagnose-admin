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
            <h3>Edit Data Sampel</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <form method="POST" id="validate_form" action="{{route('data-sampel.update', $datas->id)}}" enctype="multipart/form-data">
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_anak">Nama Anak <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="nama_anak" type="text" id="nama_anak" required="required" class="form-control" value="{{ $datas->nama_anak }}" autofocus>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="usia" class="col-form-label col-md-3 col-sm-3 label-align">Usia (bulan) <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="usia" id="usia" class="form-control" type="number" required="required" value="{{ $datas->usia }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="berat_badan" class="col-form-label col-md-3 col-sm-3 label-align">Berat Badan <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="berat_badan" id="berat_badan" class="form-control" type="text" required="required" value="{{ $datas->berat_badan }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="tinggi_badan" class="col-form-label col-md-3 col-sm-3 label-align">Tinggi Badan <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="tinggi_badan" id="tinggi_badan" class="form-control" type="text" required="required" value="{{ $datas->tinggi_badan }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="status">Status <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="status" class="form-control select1" id="status" required="required">
                                        <option value="Normal" {{$datas->status === "Normal" ? "selected" : ""}}>Normal</option>
                                        <option value="Pendek" {{$datas->status === "Pendek" ? "selected" : ""}}>Pendek</option>
                                        <option value="Sangat Pendek" {{$datas->status === "Sangat Pendek" ? "selected" : ""}}>Sangat Pendek</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href="{{route('data-sampel.index')}}"><button class="btn btn-danger" type="button">Batal</button></a>
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
@stop
@endsection