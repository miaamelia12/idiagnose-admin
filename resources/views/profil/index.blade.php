@extends('layout.backend-dashboard.app')

@section('title','Monika - Admin')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Profil {{ Auth::user()->name }}</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <br />
                    <label style="color: #000000;" for="gambar">Foto Profil :</label>
                    <br />

                    @if(Auth::user()->gambar == '')
                    <img src="{{asset('assets/template/production/images/user.png')}}" alt="image" class="product" width="200" height="200" />
                    @else
                    <img src="{{url('images/user/'. Auth::user()->gambar)}}" alt="image" class="product" width="200" height="200" />
                    @endif
                    <br /> <br />

                    <table class="table table-stripped" width="100%">
                        <tr>
                            <td width="35%">Nama </td>
                            <td width="1%"> : </td>
                            <td>{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <td width="35%">Username</td>
                            <td width="1%"> : </td>
                            <td>{{ Auth::user()->username }}</td>
                        </tr>
                        <tr>
                            <td width="35%">Email</td>
                            <td width="1%"> : </td>
                            <td>{{ Auth::user()->email }}</td>
                        </tr>
                        <tr>
                            <td width="35%">Level</td>
                            <td width="1%"> : </td>
                            <td>{{ Auth::user()->level }}</td>
                        </tr>
                    </table>
                    <br>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-10">
                            <a class="btn btn-success" href="{{route('profil.edit')}}">Edit Profil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection