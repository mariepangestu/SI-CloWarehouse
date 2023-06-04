@extends('layouts.app')
{{-- @section('title', 'Data Pegawai Clo Warehouse') --}}
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
    <div>
        <a href="{{ route('pegawai.create') }}" class="btn btn-success btn-sm">Create</a>
        <a href="{{ route('pegawai.report') }}" target="_blank"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Cetak Data</a>
    </div>
</div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pegawai Outlet</h6>
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
                            <th>Nama Pegawai</th>
                            <th>Umur</th>
                            <th>Jenis Kelamin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawais as $pegawai)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $pegawai->nama_pegawai }}</td>
                                <td>{{ $pegawai->umur }}</td>
                                <td>{{ $pegawai->jenis_kelamin }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('pegawai.edit', $pegawai->id_pegawai) }}"
                                        class="btn btn-warning mr-2">Update</a>
                                    <form action="{{ route('pegawai.destroy', $pegawai->id_pegawai) }}" method="POST">
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
