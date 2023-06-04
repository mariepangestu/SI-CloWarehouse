@extends('layouts.app')
@section('title', 'Form Barang')
@section('content')
    <form action="{{ route('barang.store') }}" method="POST">
        {{-- token untuk biar engga error 401 --}}
        @csrf
        {{-- token untuk biar engga error 401 --}}
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Create Data Barang</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_kategori_barang">Kategori Barang</label>
                            <select class="form-control @error('id_kategori_barang') is-invalid @enderror" 
                                name="id_kategori_barang" id="id_kategori_barang">
                                <option hidden>Pilih kategori</option>
                                <option disabled="disabled" default="true">Pilih kategori</option>
                                @foreach ($kategori_barang as $item)
                                    <option value="{{ $item->id_kategori_barang }}"
                                        @if (old('id_kategori_barang') == $item->id_kategori_barang) selected @endif>{{ $item->nama_kategori }}
                                    </option>
                                    {{-- <option value="{{ $item->id }}">{{ }}</option> --}}
                                @endforeach
                            </select>
                            @error('id_kategori_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                                placeholder="Masukkan Nama Barang" id="nama_barang" name="nama_barang"
                                value="{{ old('nama_barang') }}">
                            @error('nama_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="harga_barang">Harga Barang</label>
                            <input type="text" class="form-control @error('harga_barang') is-invalid @enderror"
                                placeholder="Masukkan Harga Barang" id="harga_barang" name="harga_barang"
                                value="{{ old('harga_barang') }}">
                            @error('harga_barang')
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
