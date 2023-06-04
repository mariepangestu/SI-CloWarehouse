@extends('layouts.app')
@section('title', 'Form Stok Barang')
@section('content')
    <form action="{{ route('stokbarang.store') }}" method="POST">
        {{-- token untuk biar engga error 401 --}}
        @csrf
        {{-- token untuk biar engga error 401 --}}
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Create Data Stok Barang</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_barang">Barang</label>
                            <select class="form-control @error('id_barang') is-invalid @enderror" 
                                name="id_barang" id="id_barang">
                                <option hidden>Pilih Barang</option>
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
                            <label for="Jumlah_stok">Jumlah Stok</label>
                            <input type="text" class="form-control @error('Jumlah_stok') is-invalid @enderror"
                                placeholder="Masukkan Jumlah Stok" id="Jumlah_stok" name="Jumlah_stok"
                                value="{{ old('Jumlah_stok') }}">
                            @error('Jumlah_stok')
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
