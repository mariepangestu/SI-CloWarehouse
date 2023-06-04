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
    <title>Cetak Data Pegawai Clo Warehouse</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Pegawai Clo Warehouse</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width:95%;">
            <tr>
                <th align="center">No</th>
                <th  align="center" >Nama Pegawai</th>
                <th  align="center" >Umur</th>
                <th  align="center" >Jenis Kelamin</th>
            </tr>
            @foreach ($pegawais as $pegawai)
                <tr>
                    <td  align="center" >{{ $loop->index + 1 }}</td>
                    <td  align="center" >{{ $pegawai->nama_pegawai }}</td>
                    <td  align="center" >{{ $pegawai->umur }}</td>
                    <td  align="center" >{{ $pegawai->jenis_kelamin }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
