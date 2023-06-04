<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.static {
            position: relative;
            border: 1px solid;
        }
    </style>
    <title>Cetak Data Produksi Clo Warehouse</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Produksi Clo Warehouse</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width:95%;">
            <tr>
                <th align="center">No</th>
                <th align="center">Nama Barang</th>
                <th align="center">Total Biaya Produksi</th>
                <th align="center">Jumlah Produksi</th>
                <th align="center">Tanggal Produksi</th>
            </tr>
            @foreach ($produksis as $produksi)
                <tr>
                    <td align="center">{{ $loop->index + 1 }}</td>
                    <td align="center">{{ $produksi->barang['nama_barang'] }}</td>
                    <td align="center">{{ $produksi->biayaproduksi['total_biaya'] }}</td>
                    <td align="center">{{ $produksi->jumlah_produksi }}</td>
                    <td align="center">{{ $produksi->tgl_produksi }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
