@extends('layouts.app')
@section('content')
    <form action="{{ route('tenagakerja.update', $tenaga_kerja->id_tenaga_kerja) }}" method="POST">
        {{-- token untuk biar engga error 401 --}}
        @method('PUT')
        @csrf
        {{-- token untuk biar engga error 401 --}}
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Data Tenaga Kerja</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_tenaga_kerja">Nama Tenaga Kerja</label>
                            <input type="text" class="form-control" id="nama_tenaga_kerja" name="nama_tenaga_kerja"
                                value="{{ old('nama_tenaga_kerja', $tenaga_kerja->nama_tenaga_kerja) }}">
                            <br>
                            <label for="jenis_kelamin">jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin"
                                value="{{ old('jenis_kelamin', $tenaga_kerja->jenis_kelamin) }}">
                                <option value="0">--- Pilih Jenis Kelamin ---</option>
                                <option value="Perempuan"  @if($tenaga_kerja->jenis_kelamin == "Perempuan") selected @endif>Perempuan</option>
                                <option value="Laki-Laki" @if($tenaga_kerja->jenis_kelamin == "Laki-Laki") selected @endif>Laki-laki</option>
                            </select>
                            <br>
                            <label for="usia">Usia</label>
                            <input type="text" class="form-control" id="usia" name="usia"
                                value="{{ old('usia', $tenaga_kerja->usia) }}">
                                <br>
                            <label for="gaji_tenaga_kerja">Gaji Tenaga Kerja</label>
                            <input type="text" class="form-control" id="gaji_tenaga_kerja" name="gaji_tenaga_kerja"
                                value="{{ old('gaji_tenaga_kerja', $tenaga_kerja->gaji_tenaga_kerja) }}">
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
