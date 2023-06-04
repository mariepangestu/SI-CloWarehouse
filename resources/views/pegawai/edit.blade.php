@extends('layouts.app')
@section('content')
    <form action="{{ route('pegawai.update', $pegawai->id_pegawai) }}" method="POST">
        {{-- token untuk biar engga error 401 --}}
        @method('PUT')
        @csrf
        {{-- token untuk biar engga error 401 --}}
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Data Pegawai</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_pegawai">Nama Pegawai</label>
                            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai"
                                value="{{ old('nama_pegawai', $pegawai->nama_pegawai) }}">
                            <br>
                            <label for="umur">Usia</label>
                            <input type="text" class="form-control" id="umur" name="umur"
                                value="{{ old('umur', $pegawai->umur) }}">
                            <br>
                            <label for="jenis_kelamin">jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin"
                                value="{{ old('jenis_kelamin', $pegawai->jenis_kelamin) }}">
                                <option value="0">--- Pilih Jenis Kelamin ---</option>
                                <option value="Perempuan"  @if($pegawai->jenis_kelamin == "Perempuan") selected @endif>Perempuan</option>
                                <option value="Laki-Laki" @if($pegawai->jenis_kelamin == "Laki-Laki") selected @endif>Laki-laki</option>
                            </select>
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
