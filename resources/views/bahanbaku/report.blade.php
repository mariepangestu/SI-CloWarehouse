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
    <title>Cetak Data Bahan Baku</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Bahan Baku</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width:95%;">
            <tr>
                <th align="center">No</th>
                <th align="center">Nama Bahan</th>
                <th align="center">Jumlah Bahan</th>
                <th align="center">Satuan</th>
                <th align="center">Harga</th>
            </tr>
            @foreach ($bahan_bakus as $bahanbaku)
                <tr>
                    <td align="center">{{ $loop->index + 1 }}</td>
                    <td align="center">{{ $bahanbaku->nama_bahan }}</td>
                    <td align="center">{{ $bahanbaku->jumlah_bahan }}</td>
                    <td align="center">{{ $bahanbaku->satuan_bahan }}</td>
                    <td align="center">{{ $bahanbaku->harga_bahan }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
