@extends('layouts.app')
@section('content')
<form action="{{ route('kategoribarang.update', $kategori_barang->id_kategori_barang) }}" method="POST">
    {{-- token untuk biar engga error 401 --}}
    @method('PUT')
    @csrf
    {{-- token untuk biar engga error 401 --}} 
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Kategori Barang</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" 
                        value="{{ old('nama_kategori', $kategori_barang->nama_kategori) }}">
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