<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Data Anak</title>
    <link href="{{asset('assets/template/vendors/style2.css')}}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="style.css" media="all" /> -->
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="{{ asset('assets/template/production/images/logo-ysi.jpeg') }}">
        </div>
        <h1>Laporan Data Anak</h1>
        <h3> Barito II No.55 Kebayoran Baru Jakarta Selatan 12130</h3>
        <h3> Email : admin@sayapibujakarta.org | Phone : 021-722 1763 | Fax : 021-722 1763</h3>
    </header>
    <main>
        <div id="details" class="clearfix">
            <div id="client">
                <h2 class="to">I. Identitas Anak</h2>
                <table>
                    <tr>
                        <td width="30%">Nama Lengkap </td>
                        <td width="1%"> : </td>
                        <td>{{ $datas->nama }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Usia</td>
                        <td width="1%"> : </td>
                        <td>{{ $datas->usia }} bulan</td>
                    </tr>
                    <tr>
                        <td width="30%">Berat Badan</td>
                        <td width="1%"> : </td>
                        <td>{{ $datas->berat_badan }} kg</td>
                    </tr>
                    <tr>
                        <td width="30%">Tinggi Badan</td>
                        <td width="1%"> : </td>
                        <td>{{ $datas->tinggi_badan }} cm</td>
                    </tr>
                    <tr>
                        <td width="30%">Tanggal Lahir </td>
                        <td width="1%"> : </td>
                        <td>{{ date('d M Y', strtotime($datas->tgl_lahir)) }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Tanggal Masuk Yayasan Sayap Ibu </td>
                        <td width="1%"> : </td>
                        <td>{{ date('d M Y', strtotime($datas->tgl_masuk_ysi)) }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Jenis Kelamin </td>
                        <td width="1%"> : </td>
                        <td>{{ $datas->jk }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Pendidikan </td>
                        <td width="1%"> : </td>
                        <td>{{ $datas->pendidikan }}</td>
                    </tr>
                </table>
            </div>

            <h2 class="to">II. Analisis Kesehatan</h2>
            <table>
                <tr>
                    <td width="30%">Diagnosa </td>
                    <td width="1%"> : </td>
                    <td>
                        @foreach($datas->diagnosa as $item)
                        <span>{{ $item->nama_diagnosa }}</span>, <br />
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td width="30%">Kesehatan </td>
                    <td width="1%"> : </td>
                    <td>{{ $datas->kesehatan }}</td>
                </tr>
            </table>
        </div>
        </div>
    </main>
    <footer>
        Monika - Monitoring and Classification - Laporan Data Anak.
    </footer>
</body>

</html>