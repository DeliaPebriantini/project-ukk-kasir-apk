<html>
    <head>
        <style>
            body {
                margin: 0px;
            }

            body {
                font-family: Arial, sans-serif;
            }

            .invoice {
                /*border: 1px solid #ccc; */
                padding: 10px;
                max-width: 80px;
                margin: 0 auto;
            }

            h2 {
                text-align: center;
            }

            .garis {
                border-top: 0;
                border-style: solid;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th, td {
                padding: 10px;
                text-align: center;
            }

            .invoice th{

            }
            .total {
                font-weight: bold;
            }

            .footer {
                padding-top: 10px;
                text-align: center;
                margin-top: 10px;
                font-size: 10px;
                color: #666;
            }

            .kosong {
                opacity: 0;
            }
        </style>
    </head>

    <body>
        <div>
            <h2>Laporan Penjualan</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th align="center">Id</th>
                        <th align="center">Nama Kasir</th>
                        <th align="center">Nama Pelanggan</th>
                        <th align="center">Total Belanja</th>
                        <th align="center">Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penjualans as $p)
                        <tr>
                            <td class="text-truncate">{{ $p->id }}</td>
                            <td class="text-truncate">{{ $p->nama_kasir }}</td>
                            <td class="text-truncate">{{ $p->nama_pelanggan }}</td>
                            <td class="text-truncate">{{ format_rupiah($p->total_harga) }}</td>
                            <td class="text-truncate">{{ $p->tanggal_penjualan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>