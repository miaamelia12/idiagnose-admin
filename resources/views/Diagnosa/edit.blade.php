@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@extends('layout.backend-dashboard.app')

@section('title','Monika - Admin')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Tambah Data Anak</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <form method="POST" id="validate_form" action="{{route('diagnosa.update', $datas->id)}}" enctype="multipart/form-data">
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

                            <div class="item form-group{{ $errors->has('nama_diagnosa') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_diagnosa">Nama Diagnosa <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="nama_diagnosa" type="text" id="nama_diagnosa" required="required" class="form-control" value="{{ $datas->nama_diagnosa }}" autofocus>
                                    @if ($errors->has('nama_diagnosa'))
                                    <span class="red">
                                        <strong>{{ $errors->first('nama_diagnosa') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group{{ $errors->has('nama_lain') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_lain">Nama Lain
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="nama_lain" type="text" id="nama_lain" class="form-control" value="{{ $datas->nama_lain }}">
                                    @if ($errors->has('nama_lain'))
                                    <span class="red">
                                        <strong>{{ $errors->first('nama_lain') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="deskripsi">Deskripsi <span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <textarea style="height: 150px;" class="resizable_textarea form-control" name="deskripsi" id="deskripsi" required="required" autofocus><?php echo $datas['deskripsi'] ?></textarea>
                                    @if ($errors->has('deskripsi'))
                                    <span class="red">
                                        <strong>{{ $errors->first('deskripsi') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href="{{route('diagnosa.index')}}"><button class="btn btn-danger" type="button">Batal</button></a>
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