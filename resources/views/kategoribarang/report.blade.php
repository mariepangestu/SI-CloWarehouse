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
    <title>Cetak Data Kategori Barang</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Kategori Barang</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width:95%;">
            <tr>
                <th align="center">No</th>
                <th align="center">Nama Kategori Barang</th>
            </tr>
            @foreach ($kategori_barangs as $kategoribarang)
                <tr>
                    <td align="center">{{ $loop->index + 1 }}</td>
                    <td align="center">{{ $kategoribarang->nama_kategori }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
