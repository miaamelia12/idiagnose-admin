@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@extends('layout.backend-dashboard.app')

@section('title','Monika - Admin')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Prediksi Status Pertumbuhan Anak</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <form method="POST" id="validate_form" action="{{route('prediksi-stunting.store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left">

                            <div class="form-group row ">
                                <label class="control-label col-md-2 col-sm-1" for="anak_id">Nama Anak</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="anak_id" class="form-control col-md-8 select1" id="anak_id">
                                        <option></option>
                                        @foreach ($anak as $an)
                                        <option value="{{ $an->id }}">{{ $an->nama }}</option>
                                        @endforeach
                                    </select>
                                    <input name="nama_anak" id="nama_anak" class="form-control col-md-8" type="hidden">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="usia" class="control-label col-md-2 col-sm-1">Usia</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="usia" id="umur" class="form-control col-md-8" type="number" disabled>
                                    <input name="usia" id="usia" class="form-control col-md-8" type="hidden">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="berat_badan" class="control-label col-md-2 col-sm-1">Berat Badan</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="berat_badan" id="bb" class="form-control col-md-8" type="text" disabled>
                                    <input name="berat_badan" id="berat_badan" class="form-control col-md-8" type="hidden">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="tinggi_badan" class="control-label col-md-2 col-sm-1">Tinggi Badan</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="tinggi_badan" id="tb" class="form-control col-md-8" type="text" disabled>
                                    <input name="tinggi_badan" id="tinggi_badan" class="form-control col-md-8" type="hidden">
                                    <!-- <a href="{{route('hasil-pemeriksaan.index')}}" class="btn btn-success" style="margin-left: 30px;">Submit</a> -->
                                    <button type="submit" class="btn btn-success" style="margin-left: 30px;">Submit</button>
                                </div>
                            </div>

                            <!-- <div class="form-group row ">
                                <label class="control-label col-md-2 col-sm-1" for="nama_anak">Nama Anak <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="nama_anak" type="text" id="nama_anak" required="required" class="form-control col-md-8" autofocus>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="usia" class="control-label col-md-2 col-sm-1">Usia (bulan) <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="usia" id="usia" class="form-control col-md-8" type="number" min="0" max="60" required="required">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="berat_badan" class="control-label col-md-2 col-sm-1">Berat Badan <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="berat_badan" id="berat_badan" class="form-control col-md-8" type="text" required="required">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="tinggi_badan" class="control-label col-md-2 col-sm-1">Tinggi Badan <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="tinggi_badan" id="tinggi_badan" class="form-control col-md-8" type="text" required="required">
                                    <button type="submit" class="btn btn-success" style="margin-left: 30px;">Submit</button>
                                </div>
                            </div> -->
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
        $('.select1').select2({
            placeholder: "--- Pilih ---",
            allowClear: true
        });

        $(document).on('change', '#anak_id', function() {
            var id = $(this).val();
            var url = '{{ route("getDetails", ":id") }}';
            url = url.replace(':id', id);
            $.ajax({
                type: 'get',
                url: url,
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    $('#nama_anak').val(response.nama);
                    $('#usia').val(response.usia);
                    $('#berat_badan').val(response.berat_badan);
                    $('#tinggi_badan').val(response.tinggi_badan);

                    $('#umur').val(response.usia);
                    $('#bb').val(response.berat_badan);
                    $('#tb').val(response.tinggi_badan);
                }
            });
        });
    });
</script>
@stop
@endsection