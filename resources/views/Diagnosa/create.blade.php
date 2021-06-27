@extends('layout.backend-dashboard.app')

@section('title','Monika - Admin')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Tambah Data Diagnosa</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <form method="POST" id="validate_form" action="{{route('diagnosa.store')}}" enctype="multipart/form-data">
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

                            <div class="item form-group{{ $errors->has('nama_diagnosa') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_diagnosa">Nama Diagnosa <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="nama_diagnosa" type="text" id="nama_diagnosa" value="{{ old('nama_diagnosa') }}" required class="form-control" autofocus>
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
                                    <input name="nama_lain" type="text" id="nama_lain" class="form-control" value="{{ old('nama_lain') }}">
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
                                    <textarea style="height: 150px;" class="resizable_textarea form-control" name="deskripsi" id="deskripsi" value="{{ old('deskripsi') }}" required autofocus></textarea>
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

@endsection