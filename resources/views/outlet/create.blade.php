@extends('layouts.app')
@section('title', 'Form Outlet')
@section('content')
    <form action="{{ route('outlet.store') }}" method="POST">
        {{-- token untuk biar engga error 401 --}}
        @csrf
        {{-- token untuk biar engga error 401 --}}
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Create Data Outlet</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_pegawai">Pegawai</label>
                            <select class="form-control @error('id_pegawai') is-invalid @enderror" 
                                name="id_pegawai" id="id_pegawai">
                                <option hidden>Pilih Karyawan Penerima</option>
                                <option disabled="disabled" default="true">Pilih Pegawai</option>
                                @foreach ($pegawai as $item)
                                    <option value="{{ $item->id_pegawai }}"
                                        @if (old('id_pegawai') == $item->id_pegawai) selected @endif>{{ $item->nama_pegawai }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_pegawai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="id_barang">Barang</label>
                            <select class="form-control @error('id_barang') is-invalid @enderror" 
                                name="id_barang" id="id_barang">
                                <option hidden>Pilih Barang</option>
                                <option disabled="disabled" default="true">Pilih Barang</option>
                                @foreach ($barang as $item)
                                    <option value="{{ $item->id_barang }}"
                                        @if (old('id_barang') == $item->id_barang) selected @endif>{{ $item->nama_barang }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="nama_outlet">Nama outlet</label>
                            <input type="text" class="form-control @error('nama_outlet') is-invalid @enderror"
                                placeholder="Masukkan Nama Outlet" id="nama_outlet" name="nama_outlet"
                                value="{{ old('nama_outlet') }}">
                            @error('nama_outlet')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="lokasi_outlet">Lokasi Outlet</label>
                            <input type="text" class="form-control @error('lokasi_outlet') is-invalid @enderror"
                                placeholder="Masukkan Lokasi Outlet" id="lokasi_outlet" name="lokasi_outlet"
                                value="{{ old('lokasi_outlet') }}">
                            @error('lokasi_outlet')
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
