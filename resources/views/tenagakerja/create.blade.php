@extends('layouts.app')
@section('title','Form Tenaga Kerja')
@section('content')
<form action="{{ route('tenagakerja.store') }}" method="POST">
    @csrf 
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create Data Pegawai</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_tenaga_kerja">Nama Tenaga Kerja</label>
                        <input type="text" class="form-control @error('nama_tenaga_kerja') is-invalid @enderror" placeholder="Masukkan Nama Tenaga Kerja" id="nama_tenaga_kerja" name="nama_tenaga_kerja" value="{{ old('nama_tenaga_kerja') }}">
                        @error('nama_tenaga_kerja')
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
                        <br>
                        <label for="usia">Usia</label>
                        <input type="text" class="form-control @error('usia') is-invalid @enderror" placeholder="Masukkan usia" id="usia" name="usia" value="{{ old('usia') }}">
                        @error('usia')
                        <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                        <br>
                        <label for="gaji_tenaga_kerja">Gaji</label>
                        <input type="text" class="form-control @error('gaji_tenaga_kerja') is-invalid @enderror" placeholder="Masukkan Gaji Tenaga Kerja" id="gaji_tenaga_kerja" name="gaji_tenaga_kerja" value="{{ old('gaji_tenaga_kerja') }}">
                        @error('gaji_tenaga_kerja')
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