@extends('layouts.app')
@section('content')
    <form action="{{ route('barang.update', $barang->id_barang) }}" method="POST">
        {{-- token untuk biar engga error 401 --}}
        @method('PUT')
        @csrf
        {{-- token untuk biar engga error 401 --}}
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Data Barang</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_kategori_barang">Kategori Barang</label>
                            <select class="form-control" name="id_kategori_barang" id="id_kategori_barang">
                                <option hidden>Pilih kategori</option>
                                <option disabled="disabled" default="true">Pilih kategori</option>
                                @foreach ($kategori_barang as $id => $item)
                                    <option value="{{ $item->id_kategori_barang }}"
                                        {{ $item->name_kategori == $id ? 'selected' : '' }}>{{ $item->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                value="{{ old('nama_barang', $barang->nama_barang) }}">
                            <label for="harga_barang">Harga Barang</label>
                            <input type="text" class="form-control" id="harga_barang" name="harga_barang"
                                value="{{ old('harga_barang', $barang->harga_barang) }}">
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
