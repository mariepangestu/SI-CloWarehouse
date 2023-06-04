@extends('layouts.app')
{{-- @section('title', 'Data Biaya Produksi Clo Warehouse') --}}
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        <div>
            <a href="{{ route('biayaproduksi.create') }}" class="btn btn-success btn-sm">Create</a>
            <a href="{{ route('biayaproduksi.report') }}" target="_blank"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Cetak Data</a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Biaya Produksi</h6>
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
                            <th>Nama Bahan Baku</th>
                            <th>Harga Bahan Baku</th>
                            <th>Nama Tenaga Kerja</th>
                            <th>Gaji Tenaga Kerja</th>
                            <th>Total Biaya Produksi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($biayaproduksis as $biayaproduksi)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $biayaproduksi->bahan_baku['nama_bahan']  }}</td>
                                    <td>{{ $biayaproduksi->bahan_baku['harga_bahan']  }}</td>
                                    <td>{{ $biayaproduksi->tenaga_kerja['nama_tenaga_kerja']  }}</td>
                                    <td>{{ $biayaproduksi->tenaga_kerja['gaji_tenaga_kerja']  }}</td>
                                    <td>{{ $biayaproduksi->total_biaya }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('biayaproduksi.edit', $biayaproduksi->id_biaya_produksi) }}"
                                            class="btn btn-warning mr-2">Update</a>
                                        <form action="{{ route('biayaproduksi.destroy', $biayaproduksi->id_biaya_produksi) }}"
                                            method="POST">
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
