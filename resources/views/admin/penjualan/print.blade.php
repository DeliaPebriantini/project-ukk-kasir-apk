{{-- <!DOCTYPE html>
<html>
<head>
    <title>litiShoes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>litiShoes</h1>
    <table>
        <thead>
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Jumlah</th>
              <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detailpenjualan as $dp)
                <tr>
                    <td align="center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $dp->nama_produk }}</td>
                    <td align="center">{{ $dp->jumlah_produk }}</td>
                    <td class="text-center">{{ $dp->subtotal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> --}}


<!DOCTYPE html>
<html>
<head>
	<title>struk</title>
	<style>
    h2 {
      text-align: center;
    }
    .t{
      text-align: center;
    }
    .p{
      text-align: center;
    }
		table {
			width: 100%;
			border-collapse: collapse;
		}
		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
	</style>
</head>
<body>
	<h2>litiShoes</h2>
  <p class="p">Jl. Karamat No 2, Cigintung, Cisitu, Sumedang</p>
  <p class="p">===========================</p>
  <table>
    <tr>
      <td>Id Penjualan</td>
      <td>: {{ $penjualan->id }}</td>
    </tr>
    <tr>
      <td>Waktu</td>
      <td>: {{ $penjualan->tanggal_penjualan }}</td>
    </tr>
    <tr>
      <td>Kasir</td>
      <td>: {{ $penjualan->nama_kasir }}</td>
    </tr>
    <tr>
      <td>Pelanggan</td>
      <td>: {{ $penjualan->nama_pelanggan }}</td>
    </tr>
  </table>

  {{-- <p class="p">===========================</p> --}}

  <table class="table table-hover">
    <thead class="table-light">
      <tr>
        <th class="text-truncate text-center">No</th>
        <th class="text-truncate text-center">Nama Produk</th>
        <th class="text-truncate text-center">QTY</th>
        <th class="text-truncate text-center">Subtotal</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($detailpenjualan as $dp)
        <tr>
          <td class="text-truncate text-center">{{ $loop->iteration }}</td>
          <td class="text-truncate">{{ $dp->nama_produk }}</td>
          <td class="text-truncate text-center">{{ $dp->jumlah_produk }}</td>
          <td class="text-truncate">{{ format_rupiah($dp->subtotal) }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{-- <p class="p">===========================</p> --}}

  <table>
    <thead>
      <tr class="total">
        <th colspan="2"></th>
        <th colspan="2">Total</th>
        <th colspan="2">: {{ format_rupiah($penjualan->total_harga) }}</th>
      </tr>
      <tr class="total">
        <th colspan="2"></th>
        <th colspan="2">Bayar</th>
        <th colspan="2">: {{ format_rupiah($penjualan->bayar) }}</th>
      </tr>
      <tr class="total">
        <th colspan="2"></th>
        <th colspan="2">Kembalian</th>
        <th colspan="2">: {{ format_rupiah($penjualan->kembali) }}</th>
      </tr>
    </thead>
  </table>

  <p class="p">===========================</p>

  <table>
    <tr >
        <td class="t"><b>Terimakasih Telah Berbelanja </b></td>
    </tr>
</table>
</body>
</html>