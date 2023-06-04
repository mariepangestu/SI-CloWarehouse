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
    <title>Cetak Data Biaya</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Biaya Produksi</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width:95%;">
            <tr>
                <th align="center">No</th>
                <th align="center" >Nama Bahan Baku</th>
                <th align="center" >Harga Bahan Baku</th>
                <th align="center" >Nama Tenaga Kerja</th>
                <th align="center" >Gaji Tenaga Kerja</th>
                <th align="center" >Total Biaya Produksi</th>
            </tr>
            @foreach ($biayaproduksis as $biayaproduksi)
                <tr>
                    <td align="center" >{{ $loop->index + 1 }}</td>
                    <td align="center" >{{ $biayaproduksi->bahan_baku['nama_bahan'] }}</td>
                    <td align="center" >{{ $biayaproduksi->bahan_baku['harga_bahan'] }}</td>
                    <td align="center" >{{ $biayaproduksi->tenaga_kerja['nama_tenaga_kerja'] }}</td>
                    <td align="center" >{{ $biayaproduksi->tenaga_kerja['gaji_tenaga_kerja'] }}</td>
                    <td align="center" >{{ $biayaproduksi->total_biaya }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
