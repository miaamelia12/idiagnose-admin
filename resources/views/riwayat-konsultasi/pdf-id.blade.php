<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Riwayat Konsultasi</title>
    <link href="{{asset('assets/template/vendors/style2.css')}}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="style.css" media="all" /> -->
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="{{ asset('assets/template/production/images/logo-ysi.jpeg') }}">
        </div>
        <h1>Laporan Riwayat Konsultasi</h1>
        <h3> Barito II No.55 Kebayoran Baru Jakarta Selatan 12130</h3>
        <h3> Email : admin@sayapibujakarta.org | Phone : 021-722 1763 | Fax : 021-722 1763</h3>
    </header>
    <main>
        <div id="details" class="clearfix">
            <div id="client">
                <h2 class="to">I. Identitas Anak</h2>
                <table>
                    <tr>
                        <td width="30%">Nama Anak </td>
                        <td width="1%"> : </td>
                        <td>{{ $all_data->nama }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Usia </td>
                        <td width="1%"> : </td>
                        <td>{{ $all_data->usia }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Berat Badan</td>
                        <td width="1%"> : </td>
                        <td>{{ $all_data->berat_badan }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Tinggi Badan</td>
                        <td width="1%"> : </td>
                        <td>{{ $all_data->tinggi_badan }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Tanggal Lahir</td>
                        <td width="1%"> : </td>
                        <td>{{ date('d M Y', strtotime($all_data->tgl_lahir)) }}</td>
                    </tr>
                </table>
            </div>
            <div>
                <h2 class="to">II. Jadwal Konsultasi</h2>
                <table>
                    <tr>
                        <td width="30%">Tanggal Konsultasi</td>
                        <td width="1%"> : </td>
                        <td>{{ date('d M Y', strtotime($all_data->tgl_konsultasi)) }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Konsultan</td>
                        <td width="1%"> : </td>
                        <td>{{ $all_data->nama_konsultan }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Spesialis</td>
                        <td width="1%"> : </td>
                        <td>{{ $all_data->spesialis }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Rumah Sakit</td>
                        <td width="1%"> : </td>
                        <td>{{ $all_data->rumah_sakit }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Pendamping</td>
                        <td width="1%"> : </td>
                        <td>{{ $all_data->nama_pendamping }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Status</td>
                        <td width="1%"> : </td>
                        <td>{{ $all_data->status }}</td>
                    </tr>
                </table>
            </div>
            <div>
                <h2 class="to">III. Problema dan Analisis Ahli</h2>
                <table>
                    <tr>
                        <td width="30%">Problema</td>
                        <td width="1%"> : </td>
                        <td>{{ $all_data->problema }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Analisis Ahli</td>
                        <td width="1%"> : </td>
                        <td>{{ $all_data->analisis_ahli }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
    <footer>
        Monika - Monitoring and Classification - Laporan Riwayat Konsultasi.
    </footer>
</body>

</html>