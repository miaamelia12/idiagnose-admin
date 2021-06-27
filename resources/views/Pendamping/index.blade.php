@extends('layout.backend-dashboard.app')

@section('title','Monika - Admin')

@section('content')

@include('sweetalert::alert')
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
                                <input type="hidden" class="serdelete_val_id" value="{{ $data->id }}">
                                <p style="display:none;">{{ $data->id }}</p>
                                <a href="{{route('pendamping.edit', $data->id)}}"><i class="fa fa-pencil"></i></a>
                                <div class="pull-right top_search">
                                    <a class="servicedeletebtn"><i class="fa fa-close"></i></a>
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

            var delete_id = $(this).closest(".x_panel").find('.serdelete_val_id').val();

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
                            url: '/pendamping-delete/' + delete_id,
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