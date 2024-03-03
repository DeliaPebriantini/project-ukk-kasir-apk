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
                color: #766a6a;
            }

            .kosong {
                opacity: 0;
            }

            .laporan th {
                background-color: #766a6a;
            }
        </style>
    </head>
    <body>
        <div>
            <h2>Laporan Pelanggan</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th  align="center">ID</th>
                        <th  align="center">Nama Pelanggan</th>
                        <th  align="center">Alamat</th>
                        <th  align="center">Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggan as $plg)
                        <tr>
                            <td class="text-truncate">{{ $plg->id }}</td>
                            <td class="text-truncate">{{ $plg->nama_pelanggan }}</td>
                            <td class="text-truncate">{{ $plg->alamat }}</td>
                            <td class="text-truncate">{{ $plg->nomor_telepon }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>