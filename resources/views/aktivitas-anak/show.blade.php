@extends('layout.backend-dashboard.app')

@section('title','Monika - Admin')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Detail Aktivitas Anak-anak</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <br />
                    <table class="table table-stripped" width="100%">
                        <tr>
                            <td width="35%">Kegiataan </td>
                            <td width="1%"> : </td>
                            <td>{{ $datas->kegiatan }}</td>
                        </tr>
                        <tr>
                            <td width="35%">Waktu</td>
                            <td width="1%"> : </td>
                            <td>
                                @if($datas->jam_selesai == "00:00:00")
                                {{ $datas->jam_mulai }}
                                @elseif(empty($datas->jam_selesai))
                                {{ $datas->jam_mulai }}
                                @else
                                {{ $datas->jam_mulai }} - {{ $datas->jam_selesai }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td width="35%">Keterangan</td>
                            <td width="1%"> : </td>
                            <td>{{ $datas->keterangan }}</td>
                        </tr>
                    </table>
                    <br>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-10">
                            <button type="submit" onclick="window.location='{{ route("aktivitas-anak.index")}}'" class="btn btn-secondary">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection