@extends('layouts.app')
@section('title','Form Kategori Barang')
@section('content')
<form action="{{ Route('kategoribarang.store') }}" method="POST">
    {{-- token untuk biar engga error 401 --}}
    @csrf
    {{-- token untuk biar engga error 401 --}} 
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create Data Kategori Barang</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" placeholder="Masukkan Nama Kategori" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}">
                        @error('nama_kategori')
                        <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>

        </div>
    </div>
</form>
@endsection