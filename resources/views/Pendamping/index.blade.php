@extends('layout.backend-dashboard.app')

@section('title','Monika - Admin')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Data Pendamping Konsultasi</h3>
        </div>
        <div class="title_right">
            <div class="col-md-4 form-group row pull-right top_search">
                <a href="{{route('pendamping.create')}}"><button type="button" class="btn btn-primary" style="margin-left: 46px;"><i class="fa fa-plus"></i> Tambah Data</button></a>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="x_content">
                    <div class="row">
                        @foreach($datas as $data)
                        <div class="col-md-3   widget widget_tally_box">
                            <div class="x_panel" style="height: 350px;">
                                <a href="{{route('pendamping.edit', $data->id)}}"><i class="fa fa-pencil"></i></a>
                                <div class="pull-right top_search">
                                    <a href="{{route('hapuspendamping', $data->id)}}"><i class="fa fa-close"></i></a>
                                </div>
                                <div class="x_content">
                                    @if($data->profil)
                                    <img src="{{url('images/pendamping/'. $data->profil)}}" alt="..." class="img-circle profile_img" />
                                    @else
                                    <img src="{{asset('assets/template/production/images/user.png')}}" alt="..." class="img-circle profile_img">
                                    @endif
                                    <h3 class="name">{{$data->nama_pendamping}}</h3>
                                    <h6>
                                        <p>
                                            {{$data->jabatan}}
                                        </p>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection