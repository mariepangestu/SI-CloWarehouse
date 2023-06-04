@extends('layouts.app')
{{-- @section('title', 'Data Kategori Barang Clo Warehouse') --}}
<!-- Page Heading -->
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        <div>
            <a href="{{ route('kategoribarang.create') }}" class="btn btn-success btn-sm">Create</a>
            <a href="{{ route('kategoribarang.report') }}" target="_blank"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Cetak Data</a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kategori Barang</h6>
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
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                        {{-- $kategoribarang diinisialisasi dicontroller --}}
                        @foreach ($kategori_barangs as $kategoribarang)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $kategoribarang->nama_kategori }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('kategoribarang.edit', $kategoribarang->id_kategori_barang) }}"
                                        class="btn btn-warning mr-2">Update</a>
                                    <form action="{{ route('kategoribarang.destroy', $kategoribarang->id_kategori_barang) }}" method="POST">
                                        {{-- cross site ruquest forgery memverifikasi bahwa pengguna yang membuat permintaan --}}
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Yakin Ingin Dihapus?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </thead>

                    <body>

                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
