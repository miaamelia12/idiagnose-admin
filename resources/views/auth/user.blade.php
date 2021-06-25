@extends('layout.backend-dashboard.app')

@section('title','Monika - Admin')

@section('content')

@include('sweetalert::alert')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Data User</h3>
        </div>
        <div class="title_right">
            <div class="col-md-4 form-group row pull-right top_search">
                <a href="{{route('user.create')}}"><button type="button" class="btn btn-primary" style="margin-left: 46px;"><i class="fa fa-plus"></i> Tambah Data</button></a>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="table" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($datas as $data)
                                        @if($data->id != Auth::user()->id)
                                        <tr>
                                            <input type="hidden" class="serdelete_val_id" value="{{ $data->id }}">
                                            <td style="display:none;">{{ $data->id }}</td>
                                            <td>
                                                @if($data->gambar)
                                                <img src="{{url('images/user/'. $data->gambar)}}" alt="image" class="avatar" style="margin-right: 10px; width: 50px; height: 50px; border-radius: 50%;" />
                                                @else
                                                <img src="{{asset('assets/template/production/images/user.png')}}" alt="image" class="avatar" style="margin-right: 10px; width: 50px; height: 50px; border-radius: 50%;" />
                                                @endif

                                                <div style="margin-top: 15px;">
                                                    {{$data->name}}
                                                </div>
                                            </td>
                                            <td>
                                                <div style="margin-top: 15px;">
                                                    <a href="{{route('user.show', $data->id)}}">
                                                        {{$data->username}}
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="margin-top: 15px;">
                                                    {{$data->email}}
                                                </div>
                                            </td>
                                            <td>
                                                <div style="margin-top: 15px;">
                                                    {{$data->created_at}}
                                                </div>
                                            </td>
                                            <td>
                                                <a class="btn btn-success" href="{{route('user.edit', $data->id)}}"><i class="fa fa-pencil-square-o"></i></a>
                                                <button class="btn btn-danger servicedeletebtn" type="button"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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

            var delete_id = $(this).closest("tr").find('.serdelete_val_id').val();

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
                            url: '/user-delete/' + delete_id,
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