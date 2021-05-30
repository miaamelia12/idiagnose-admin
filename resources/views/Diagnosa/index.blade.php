@section('css')
<style>
    .panel {
        background-color:
            #F2F5F7;


    }
</style>
@stop

@extends('layout.backend-dashboard.app')

@section('title','Monika - Admin')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Daftar Diagnosa</h3>
        </div>
        <div class="title_right">
            <div class="col-md-4 form-group row pull-right top_search">
                <a href="{{route('diagnosa.create')}}"><button type="button" class="btn btn-primary" style="margin-left: 46px;"><i class="fa fa-plus"></i> Tambah Data</button></a>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <!-- start accordion -->
                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                        @foreach($datas as $data)
                        <div class="panel">
                            <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo{{ $data->id }}" aria-expanded="false" aria-controls="collapseTwo">
                                <h4 class="panel-title col-md-11">{{$data->nama_diagnosa}}
                                </h4>
                            </a>
                            <a href="{{route('diagnosa.edit', $data->id)}}">
                                <i class="fa fa-pencil-square-o " style="margin-left: 30px;"></i>
                            </a>
                            <a href="{{route('hapusdiagnosa', $data->id)}}">
                                <i class="fa fa-trash-o " style="margin-left: 10px; margin-bottom: 10px;"></i>
                            </a>
                            <div id="collapseTwo{{ $data->id }}" class=" collapse " role=" tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body" style="margin: 10px 30px 10px 26px;">
                                    <p><strong>{{$data->nama_lain}}</strong></p>
                                    {{$data->deskripsi}}
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