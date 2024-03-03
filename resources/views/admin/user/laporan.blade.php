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
            .laporan th {
                background-color: #766a6a;
            }

        </style>
    </head>

    <body>
        <div>
            <h2>Laporan User</h2>
            <p></p>
            <table border="1">
                <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nama Lengkap</th>
                      <th>Username</th>
                      <th>Role</th>
                      <th>Jenis Kelamin</th>
                      <th>Email</th>
                    </tr>
                  </thead>                  
                  <tbody>
                    @foreach ($users as $u)
                        <tr>
                          <td class="text-truncate">{{ $u->id }}</td>
                          <td class="text-truncate">{{ $u->nama_lengkap }}</td>
                          <td class="text-truncate">{{ $u->username }}</td>
                          <td class="text-truncate">{{ $u->role }}</td>
                          <td class="text-truncate">{{ $u->jenis_kelamin }}</td>
                          <td class="text-truncate">{{ $u->email }}</td>
                        </tr>
                        @endforeach
                  </tbody>
            </table>
        </div>
    </body>
</html>