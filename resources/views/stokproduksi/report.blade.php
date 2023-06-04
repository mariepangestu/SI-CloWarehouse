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
    <title>Cetak Data Stok Produksi Clo Warehouse</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Stok Produksi Clo Warehouse</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width:95%;">
            <tr>
                <th align="center">No</th>
                <th align="center">Nama Barang</th>
                <th align="center">Nama Gudang</th>
                <th align="center">Jumlah Stok</th>
            </tr>
            @foreach ($stokproduksis as $stokproduksi)
                <tr>
                    <td align="center">{{ $loop->index + 1 }}</td>
                    <td align="center">{{ $stokproduksi->barang['nama_barang'] }}</td>
                    <td align="center">{{ $stokproduksi->gudang['nama_gudang'] }}</td>
                    <td align="center">{{ $stokproduksi->jumlah_stok }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
