<style>
    .clearfix:after {
        content: "";
        display: table;
        clear: both;
    }

    a {
        color: #5D6975;
        text-decoration: underline;
    }

    body {
        position: relative;
        width: 18cm;
        height: 29.7cm;
        margin: 0 auto;
        color: #001028;
        background: #FFFFFF;
        font-family: Arial, sans-serif;
        font-size: 12px;
        font-family: Arial;
    }

    header {
        padding: 10px 0;
        margin-bottom: 30px;
    }

    #logo {
        text-align: center;
        margin-bottom: 10px;
    }

    #logo img {
        width: 90px;
    }

    h1 {
        border-top: 1px solid #5D6975;
        border-bottom: 1px solid #5D6975;
        color: #5D6975;
        font-size: 2.4em;
        line-height: 1.4em;
        font-weight: normal;
        text-align: center;
        margin: 0 0 20px 0;
        background: url(dimension.png);
    }

    #project {
        float: left;
    }

    #project span {
        color: #5D6975;
        text-align: left;
        width: 120px;
        margin-right: 10px;
        display: inline-block;
        font-size: 14px;
    }

    #company {
        float: right;
        text-align: right;
    }

    #project div,
    #company div {
        white-space: nowrap;
        font-size: 14px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
    }

    table tr:nth-child(2n-1) td {
        background: #F5F5F5;
    }

    table th,
    table td {
        text-align: center;
    }

    table th {
        padding: 5px 20px;
        color: #5D6975;
        border-bottom: 1px solid #C1CED9;
        white-space: nowrap;
        font-weight: normal;
    }

    table td {
        padding: 10px;
        text-align: center;
    }

    footer {
        color: #5D6975;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        border-top: 1px solid #C1CED9;
        padding: 8px 0;
        text-align: center;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Data Anak</title>
    <!-- <link rel="stylesheet" href="style.css" media="all" /> -->
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="{{ asset('assets/template/production/images/logo-ysi.jpeg') }}">
        </div>
        <h1>Laporan Data Anak</h1>

        <div id="project">
            <div><span>Tanggal Cetak:</span> {{ date('d M Y') }}</div>
        </div>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Usia (bulan)</th>
                    <th>Berat Badan (kg)</th>
                    <th>Tinggi Badan (cm)</th>
                    <th>Tgl Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Diagnosa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_data as $datas)
                <tr>
                    <td>{{ $datas->nama }}</td>
                    <td>{{ $datas->usia }}</td>
                    <td>{{ $datas->berat_badan }}</td>
                    <td>{{ $datas->tinggi_badan }}</td>
                    <td>{{ date('d M Y', strtotime($datas->tgl_lahir)) }}</td>
                    <td>
                        @if($datas->jk == "Laki-laki")
                        <span>L</span>
                        @elseif($datas->jk == "Perempuan")
                        <span>P</span>
                        @endif
                    </td>
                    <td>
                        {{ $datas->nama_diagnosa }}
                    </td>
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