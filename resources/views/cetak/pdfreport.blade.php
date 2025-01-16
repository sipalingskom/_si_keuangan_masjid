<html>
    <head>
        <style>
            * {
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }
            .w-100 {
                width: 100%;
            }
            h1 {
                text-align: center;
                padding: 20px 0;
                font-size: 22px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            table, tr, th, td {
                border: 1px solid black;
                padding: 10px;
            }
            table tr th {
                background-color: #eaeaee;
            }
        </style>
    </head>

    <body>
        <div class="w-100">
            <h1>Laporan pemasukan dan pengeluaran {{ ucwords($cetak) }}</h1>
            <table>
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>WA</th>
                        <th>Kategori</th>
                        <th>Type</th>
                        <th>Jumlah</th>
                    </tr>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->wa }}</td>
                                @if ($cetak == 'infaq')
                                    <td>{{ $data->kategori }}</td>
                                @else
                                    <td>{{ $data->kategoriZakat ? $data->kategoriZakat->nama_zakat : '-' }}</td>
                                @endif
                                <td>{{ $data->type }}</td>
                                <td>Rp {{ number_format($data->jumlah, 0, 0, '.') }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th colspan="5">Total Pemasukan</th>
                            <td>Rp {{ number_format(array_sum($jumlahP1), 0, 0, '.') }}</td>
                        </tr>
                        <tr>
                            <th colspan="5">Total Pengeluaran</th>
                            <td>Rp {{ number_format(array_sum($jumlahP2), 0, 0, '.') }}</td>
                        </tr>
                    </tbody>
                </thead>
            </table>
        </div>
    </body>
</html>
