<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Riwayat Konsultasi</title>
    <link href="{{asset('assets/template/vendors/style.css')}}" rel="stylesheet">
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
        <table>
            <thead>
                <tr>
                    <th class="service">Nama Anak</th>
                    <th>Tgl Konsultasi</th>
                    <th>Problema</th>
                    <th>Konsultan</th>
                    <th>Spesialis</th>
                    <th>Rumah Sakit</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_data as $datas)
                <tr>
                    <td class="service">{{ $datas->nama }}</td>
                    <td class="desc">{{ date('d M Y', strtotime($datas->tgl_konsultasi)) }}</td>
                    <td class="unit">{{ $datas->problema }}</td>
                    <td class="qty">{{ $datas->nama_konsultan }}</td>
                    <td class="qty">{{ $datas->spesialis }}</td>
                    <td class="qty">{{ $datas->rumah_sakit }}</td>
                    <td class="qty">{{ $datas->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
    <footer>
        Monika - Monitoring and Classification - Laporan Riwayat Konsultasi.
    </footer>
</body>

</html>