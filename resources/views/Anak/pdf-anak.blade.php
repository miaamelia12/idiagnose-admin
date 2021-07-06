<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Data Anak</title>
    <link href="{{asset('assets/template/vendors/style.css')}}" rel="stylesheet">
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
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tgl Lahir</th>
                    <th>Tgl Masuk YSI</th>
                    <th>IQ</th>
                    <th>Jenis Kelamin</th>
                    <th>Pendidikan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_data as $datas)
                <tr>
                    <td>{{ $datas->nama }}</td>
                    <td>{{ date('d M Y', strtotime($datas->tgl_lahir)) }}</td>
                    <td>{{ date('d M Y', strtotime($datas->tgl_masuk_ysi)) }}</td>
                    <td>
                        {{ $datas->IQ }}
                    </td>
                    <td>
                        <!-- @if($datas->jk == "Laki-laki")
                        <span>L</span>
                        @elseif($datas->jk == "Perempuan")
                        <span>P</span>
                        @endif -->
                        {{ $datas->jk }}
                    </td>
                    <td>{{ $datas->pendidikan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
    <footer>
        Monika - Monitoring and Classification - Laporan Data Anak.
    </footer>
</body>

</html>