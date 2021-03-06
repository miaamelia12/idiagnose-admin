@extends('layout.backend-dashboard.app')

@section('title','Monika - Admin')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Tambah Data Pendamping</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <form method="POST" id="validate_form" action="{{route('pendamping.store')}}" enctype="multipart/form-data">
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

                            <div class="item form-group{{ $errors->has('nama_pendamping') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_pendamping">Nama Pendamping <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="nama_pendamping" type="text" id="nama_pendamping" value="{{ old('nama_pendamping') }}" required class="form-control" autofocus>
                                    @if ($errors->has('nama_pendamping'))
                                    <span class="red">
                                        <strong>{{ $errors->first('nama_pendamping') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group{{ $errors->has('jabatan') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="jabatan">Jabatan <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="jabatan" type="text" id="jabatan" required="required" value="{{ old('jabatan') }}" class="form-control" autofocus>
                                    @if ($errors->has('jabatan'))
                                    <span class="red">
                                        <strong>{{ $errors->first('jabatan') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group{{ $errors->has('profil') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="profil">Profil</label>
                                <div class="col-md-6">
                                    <img width="200" height="200" />
                                    <input type="file" class="uploads" style="margin-top: 20px;" name="profil">
                                    @if ($errors->has('profil'))
                                    <span class="red">
                                        <strong>{{ $errors->first('profil') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href="{{route('pendamping.index')}}"><button class="btn btn-danger" type="button">Batal</button></a>
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
<script type="text/javascript">
    $(document).ready(function() {
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function() {
            $(".uploads").change(readURL)
            $("#f").submit(function() {
                // do ajax submit or just classic form submit
                //  alert("fake subminting")
                return false
            })
        })
    });
</script>
@stop

@endsection