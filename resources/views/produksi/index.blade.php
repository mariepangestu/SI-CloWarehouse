@extends('layouts.app')
{{-- @section('title', 'Data Produksi Clo Warehouse') --}}
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        <div>
            <a href="{{ route('produksi.create') }}" class="btn btn-success btn-sm">Create</a>
            <a href="{{ route('produksi.report') }}" target="_blank"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Cetak Data</a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Produksi</h6>
        </div>
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert" id="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Total Biaya Produksi</th>
                            <th>Jumlah Produksi</th>
                            <th>Tanggal Produksi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produksis as $produksi)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $produksi->barang['nama_barang'] }}</td>
                                <td>{{ $produksi->biayaproduksi['total_biaya'] }}</td>
                                <td>{{ $produksi->jumlah_produksi }}</td>
                                <td>{{ $produksi->tgl_produksi }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('produksi.edit', $produksi->id_produksi) }}"
                                        class="btn btn-warning mr-2">Update</a>
                                    <form action="{{ route('produksi.destroy', $produksi->id_produksi) }}" method="POST">
                                        {{-- cross site ruquest forgery memverifikasi bahwa pengguna yang membuat permintaan --}}
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Yakin Ingin Dihapus?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
