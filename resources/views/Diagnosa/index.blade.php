@extends('layout.backend-dashboard.app')

@section('title','Monika - Admin')

@section('content')

@include('sweetalert::alert')
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
                        <div class="panel" style="background-color: #F2F5F7;">
                            <input type="hidden" class="serdelete_val_id" value="{{ $data->id }}">
                            <p style="display:none;">{{ $data->id }}</p>
                            <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo{{ $data->id }}" aria-expanded="false" aria-controls="collapseTwo">
                                <h4 class="panel-title col-md-11">{{$data->nama_diagnosa}}
                                </h4>
                            </a>
                            <a href="{{route('diagnosa.edit', $data->id)}}">
                                <i class="fa fa-pencil-square-o " style="margin-left: 30px;"></i>
                            </a>
                            <a class="servicedeletebtn">
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
@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.servicedeletebtn').click(function(e) {
            e.preventDefault();

            var delete_id = $(this).closest(".panel").find('.serdelete_val_id').val();

            swal({
                    title: "Apakah Anda Yakin?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var data = {
                            "_token": $('input[name="csrf-token"]').val(),
                            "id": delete_id,
                        };
                        $.ajax({
                            type: "DELETE",
                            url: '/diagnosa-delete/' + delete_id,
                            data: data,
                            success: function(response) {
                                swal(response.status, {
                                        icon: "success",
                                    })
                                    .then((result) => {
                                        location.reload();
                                    });
                            }
                        });
                    }
                });
        });

    });
</script>
@stop

@endsection