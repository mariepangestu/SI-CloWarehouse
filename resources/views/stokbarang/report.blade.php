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
    <title>Cetak Data Stok Barang Clo Warehouse</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Stok Barang Clo Warehouse</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width:95%;">
            <tr>
                <th align="center">No</th>
                <th align="center">Nama Barang</th>
                <th align="center">Jumlah Stok(pcs)</th>
            </tr>
            @foreach ($stok_barangs as $stokbarang)
            <tr>
                <td align="center">{{ $loop->index + 1 }}</td>
                <td align="center">{{ $stokbarang->barang['nama_barang'] }}</td>
                <td align="center">{{ $stokbarang->Jumlah_stok }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
