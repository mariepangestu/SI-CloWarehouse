@extends('layouts.app')
@section('title','Form Pegawai')
@section('content')
<form action="{{ route('pegawai.store') }}" method="POST">
    @csrf 
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create Data Pegawai</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_pegawai">Nama Pegawai</label>
                        <input type="text" class="form-control @error('nama_pegawai') is-invalid @enderror" placeholder="Masukkan Nama pegawai" id="nama_pegawai" name="nama_pegawai" value="{{ old('nama_pegawai') }}">
                        @error('nama_pegawai')
                        <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                        <br>
                        <label for="umur">Umur</label>
                        <input type="text" class="form-control @error('umur') is-invalid @enderror" placeholder="Masukkan umur" id="umur" name="umur" value="{{ old('umur') }}">
                        @error('umur')
                        <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                        <br>
                        <div class="form-group  @error('jenis_kelamin') is-invalid @enderror">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                    <option value="0">--- Pilih Jenis Kelamin ---</option>
                                    <option value="Perempuan">Perempuan</option>
                                    <option value="Laki-Laki">Laki-laki</option>
                                </select>
                        </div>
                        @error('jenis_kelamin')
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