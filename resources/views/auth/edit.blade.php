@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@extends('layout.backend-dashboard.app')

@section('title','Monika - Admin')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Data User</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <form method="POST" id="validate_form" action="{{route('user.update', $datas->id)}}" enctype="multipart/form-data">
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="profil">Profil</label>
                                <div class="col-md-6">
                                    @if($datas->profil)
                                    <img src="{{url('images/user/'. $datas->profil)}}" alt="image" class="product" width="200" height="200" />
                                    @else
                                    <img src="{{asset('assets/template/production/images/user.png')}}" alt="image" class="product" width="200" height="200" />
                                    @endif
                                    <input type="file" class="uploads" style="margin-top: 20px;" name="profil">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Nama <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="name" type="text" id="name" required="required" class="form-control" autofocus value="{{ $datas->name }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Username
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="username" type="text" id="username" required="required" class="form-control" readonly="" value="{{ $datas->username }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="email" type="text" id="email" required="required" class="form-control" readonly="" value="{{ $datas->email }}">
                                </div>
                            </div>
                            <div class="item form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="level">Level <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="level" class="form-control select1" id="level" required>
                                        <option></option>
                                        <option value="Admin" @if($datas->level == 'Admin') selected @endif>Admin</option>
                                        <option value="Perawat" @if($datas->level == 'Perawat') selected @endif>Perawat</option>
                                    </select>
                                    @if ($errors->has('level'))
                                    <span class="red">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="password" type="password" id="password" onkeyup='check();' required class="form-control" autofocus>
                                    @if ($errors->has('password'))
                                    <span class="red">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="password-confirm">Konfirmasi Password <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="password_confirmation" type="password" id="confirm_password" onkeyup='check();' required class="form-control" autofocus>
                                    <strong><span id='message'></span></strong>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href="{{route('user.index')}}"><button class="btn btn-danger" type="button">Batal</button></a>
                                    <button id="submit" type="submit" class="btn btn-success">Update</button>
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

<script type="text/javascript">
    $(document).ready(function() {
        // Select Multiple
        $('.select1').select2({
            placeholder: "--- Pilih Level ---",
            allowClear: true
        });
    });

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

    var check = function() {
        if (document.getElementById('password').value ==
            document.getElementById('confirm_password').value) {
            document.getElementById('submit').disabled = false;
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'matching';
        } else {
            document.getElementById('submit').disabled = true;
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'not matching';
        }
    }
</script>
@stop

@endsection