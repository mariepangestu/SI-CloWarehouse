@extends('layouts.app')
{{-- @section('title', 'Data Bahan Baku Clo Warehouse') --}}
<!-- Page Heading -->
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        <div>
            <a href="{{ route('bahanbaku.create') }}" class="btn btn-success btn-sm">Create</a>
            <a href="{{ route('bahanbaku.report') }}" target="_blank"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Cetak Data</a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Bahan Baku Produksi</h6>
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
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bahan_bakus as $bahanbaku)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $bahanbaku->nama_bahan }}</td>
                                    <td>{{ $bahanbaku->jumlah_bahan }}</td>
                                    <td>{{ $bahanbaku->satuan_bahan }}</td>
                                    <td>{{ $bahanbaku->harga_bahan }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('bahanbaku.edit', $bahanbaku->id_bahanbaku) }}"
                                            class="btn btn-warning mr-2">Update</a>
                                        <form action="{{ route('bahanbaku.destroy', $bahanbaku->id_bahanbaku) }}"
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
