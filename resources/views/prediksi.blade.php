<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Riwayat Prediksi</title>
    <link href="{{asset('assets/template/vendors/style.css')}}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="style.css" media="all" /> -->
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="{{ asset('assets/template/production/images/logo-ysi.jpeg') }}">
        </div>
        <h1>Laporan Data Prediksi Stunting</h1>
        <h3> Barito II No.55 Kebayoran Baru Jakarta Selatan 12130</h3>
        <h3> Email : admin@sayapibujakarta.org | Phone : 021-722 1763 | Fax : 021-722 1763</h3>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Nama Anak</th>
                    <th>Tanggal Prediksi</th>
                    <th>Usia (bulan)</th>
                    <th>Berat Badan (kg)</th>
                    <th>Tinggi Badan (cm)</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_data as $datas)
                <tr>
                    <td class="service">{{ $datas->nama_anak }}</td>
                    <td class="desc">{{ date('d M Y', strtotime($datas->created_at)) }}</td>
                    <td class="desc">{{ $datas->usia }}</td>
                    <td class="unit">{{ $datas->berat_badan }}</td>
                    <td class="qty">{{ $datas->tinggi_badan }}</td>
                    <td class="qty">{{ $datas->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
    <footer>
        Monika - Monitoring and Classification - Laporan Data Prediksi Stunting.
    </footer>
</body>

</html>