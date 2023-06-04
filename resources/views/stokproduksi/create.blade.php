@extends('layouts.app')
@section('title', 'Form Stok Produksi')
@section('content')
    <form action="{{ route('stokproduksi.store') }}" method="POST">
        {{-- token untuk biar engga error 401 --}}
        @csrf
        {{-- token untuk biar engga error 401 --}}
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Create Data Stok Produksi</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_barang">Nama Barang</label>
                            <select class="form-control @error('id_barang') is-invalid @enderror" 
                                name="id_barang" id="id_barang">
                                <option hidden>Pilih barang</option>
                                <option disabled="disabled" default="true">Pilih Barang</option>
                                @foreach ($barang as $item)
                                    <option value="{{ $item->id_barang }}"
                                        @if (old('id_barang') == $item->id_barang) selected @endif>{{ $item->nama_barang }}
                                    </option>
                                    {{-- <option value="{{ $item->id }}">{{ }}</option> --}}
                                @endforeach
                            </select>
                            @error('id_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <br>
                            <label for="id_gudang">Nama gudang</label>
                            <select class="form-control @error('id_gudang') is-invalid @enderror" 
                                name="id_gudang" id="id_gudang">
                                <option hidden>Pilih gudang</option>
                                <option disabled="disabled" default="true">Pilih Gudang</option>
                                @foreach ($gudang as $item)
                                    <option value="{{ $item->id_gudang }}"
                                        @if (old('id_gudang') == $item->id_gudang) selected @endif>{{ $item->nama_gudang }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_gudang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <br>
                            <label for="jumlah_stok">Jumlah Stok</label>
                            <input type="text" class="form-control @error('jumlah_stok') is-invalid @enderror"
                                placeholder="Masukkan jumlah Stok" id="jumlah_stok" name="jumlah_stok"
                                value="{{ old('jumlah_stok') }}">
                            @error('jumlah_stok')
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
