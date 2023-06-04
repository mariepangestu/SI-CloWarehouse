@extends('layouts.app')
@section('title', 'Form Produksi')
@section('content')
    <form action="{{ route('produksi.store') }}" method="POST">
        {{-- token untuk biar engga error 401 --}}
        @csrf
        {{-- token untuk biar engga error 401 --}}
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Create Data Produksi</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_barang">Barang</label>
                            <select class="form-control @error('id_barang') is-invalid @enderror" 
                                name="id_barang" id="id_barang">
                                <option hidden>Pilih kategori</option>
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
                            <label for="id_biaya_produksi">Biaya Produksi</label>
                            <select class="form-control @error('id_biaya_produksi') is-invalid @enderror" 
                                name="id_biaya_produksi" id="id_biaya_produksi">
                                <option hidden>Pilih kategori</option>
                                <option disabled="disabled" default="true">Pilih Biaya Produksi</option>
                                @foreach ($biayaproduksi as $item)
                                    <option value="{{ $item->id_biaya_produksi }}"
                                        @if (old('id_biaya_produksi') == $item->id_biaya_produksi) selected @endif>{{ $item->total_biaya }}
                                    </option>
                                    {{-- <option value="{{ $item->id }}">{{ }}</option> --}}
                                @endforeach
                            </select>
                            @error('id_biaya_produksi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <br>
                            <label for="jumlah_produksi">Jumlah Produksi</label>
                            <input type="text" class="form-control @error('jumlah_produksi') is-invalid @enderror"
                                placeholder="Masukkan Nama Barang" id="jumlah_produksi" name="jumlah_produksi"
                                value="{{ old('jumlah_produksi') }}">
                            @error('jumlah_produksi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <br>
                            <label for="tgl_produksi">Tanggal Produksi</label>
                            <input type="date" class="form-control @error('tgl_produksi') is-invalid @enderror"
                                placeholder="Masukkan Tanggal Produksi" id="tgl_produksi" name="tgl_produksi"
                                value="{{ old('tgl_produksi') }}">
                            @error('tgl_produksi')
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
