@extends('layout.backend-dashboard.app')

@section('title','Monika - Admin')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>@section('subtitle','Daftar Konsultasi')</h3>
    </div>
</div>
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Anak</th>
                                    <th>Tgl Lahir</th>
                                    <th>Konsultan</th>
                                    <th>Problema</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>2011/04/25</td>
                                    <td>Dr. Bedah RSCM (Dr. Cipta)</td>
                                    <td>Perut terlihat membuncit karena tidak memiliki otot perut</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Detail</a>
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>2011/04/25</td>
                                    <td>Dr. Bedah RSCM (Dr. Cipta)</td>
                                    <td>Perut terlihat membuncit karena tidak memiliki otot perut</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Detail</a>
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ashton Cox</td>
                                    <td>2011/04/25</td>
                                    <td>Dr. Bedah RSCM (Dr. Cipta)</td>
                                    <td>Perut terlihat membuncit karena tidak memiliki otot perut</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Detail</a>
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection