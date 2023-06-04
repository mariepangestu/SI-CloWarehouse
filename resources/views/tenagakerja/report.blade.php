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
    <title>Cetak Data Tenaga Kerja Clo Warehouse</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Tenaga Kerja Clo Warehouse</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width:95%;">
            <tr>
                <th align="center">No</th>
                <th align="center">Nama</th>
                <th align="center">Jenis Kelamin</th>
                <th align="center">Usia</th>
                <th align="center">Gaji Tenaga Kerja</th>
            </tr>
            @foreach ($tenaga_kerjas as $tenagakerja)
                <tr>
                    <td align="center">{{ $loop->index + 1 }}</td>
                    <td align="center">{{ $tenagakerja->nama_tenaga_kerja }}</td>
                    <td align="center">{{ $tenagakerja->jenis_kelamin }}</td>
                    <td align="center">{{ $tenagakerja->usia }}</td>
                    <td align="center">{{ $tenagakerja->gaji_tenaga_kerja }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
