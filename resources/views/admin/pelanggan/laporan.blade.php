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
                        <th>ID</th>
                        <th>Nama Pelanggan</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggan as $plg)
                        <tr>
                            <td>{{ $plg->id }}</td>
                            <td>{{ $plg->nama_pelanggan }}</td>
                            <td>{{ $plg->alamat }}</td>
                            <td>{{ $plg->nomor_telepon }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>