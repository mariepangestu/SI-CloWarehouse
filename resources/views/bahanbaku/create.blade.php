@extends('layouts.app')
@section('title', 'Form Bahan Baku')
@section('content')
    <form action="{{ route('bahanbaku.store') }}" method="POST">
        {{-- token untuk biar engga error 401 --}}
        @csrf
        {{-- token untuk biar engga error 401 --}}
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Create Data Bahan Baku</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_bahan">Nama Bahan</label>
                            <input type="text" class="form-control @error('nama_bahan') is-invalid @enderror"
                                placeholder="Masukkan Nama Bahan" id="nama_bahan" name="nama_bahan"
                                value="{{ old('nama_bahan') }}">
                            @error('nama_bahan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="jumlah_bahan">Jumlah Bahan</label>
                            <input type="text" class="form-control @error('jumlah_bahan') is-invalid @enderror"
                                placeholder="Masukkan Jumlah Bahan" id="jumlah_bahan" name="jumlah_bahan"
                                value="{{ old('jumlah_bahan') }}">
                            @error('jumlah_bahan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group  @error('satuan_bahan') is-invalid @enderror">
                                <label for="satuan_bahan">Satuan Bahan</label>
                                    <select class="form-control" name="satuan_bahan" id="satuan_bahan">
                                        <option value="0">--- Pilih Satuan ---</option>
                                        <option value="g">gram</option>
                                        <option value="kg">Kilogram</option>
                                        <option value="kwintal">Kwintal</option>
                                        <option value="ton">Ton</option>
                                    </select>
                            </div>
                            @error('satuan_bahan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="harga_bahan">harga Bahan</label>
                            <input type="text" class="form-control @error('harga_bahan') is-invalid @enderror"
                                placeholder="Masukkan Harga Bahan" id="harga_bahan" name="harga_bahan"
                                value="{{ old('harga_bahan') }}">
                            @error('harga_bahan')
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
