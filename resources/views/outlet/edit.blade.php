@extends('layouts.app')
@section('content')
    <form action="{{ route('outlet.update', $outlet->id_outlet) }}" method="POST">
        {{-- token untuk biar engga error 401 --}}
        @method('PUT')
        @csrf
        {{-- token untuk biar engga error 401 --}}
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Data Outlet</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_pegawai">Pegawai Penerima</label>
                            <select class="form-control" name="id_pegawai" id="id_pegawai">
                                <option hidden>Pilih Pegawai/option>
                                <option disabled="disabled" default="true">Pilih Pegawai/option>
                                    @foreach ($pegawai as $id => $item)
                                <option value="{{ $item->id_pegawai }}"
                                    {{ $item->name_pegawai == $id ? 'selected' : '' }}>{{ $item->nama_pegawai }}
                                </option>
                                @endforeach
                            </select>
                            <label for="id_barang">Nama Barang</label>
                            <select class="form-control" name="id_barang" id="id_barang">
                                <option hidden>Pilih Barang</option>
                                <option disabled="disabled" default="true">Pilih Barang</option>
                                @foreach ($barang as $id => $item)
                                    <option value="{{ $item->id_barang }}"
                                        {{ $item->name_barang == $id ? 'selected' : '' }}>{{ $item->nama_barang }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="nama_outlet">Nama Outlet</label>
                            <input type="text" class="form-control" id="nama_outlet" name="nama_outlet"
                                value="{{ old('nama_outlet', $outlet->nama_outlet) }}">
                            <label for="lokasi_outlet">Lokasi Outlet</label>
                            <input type="text" class="form-control" id="lokasi_outlet" name="lokasi_outlet"
                                value="{{ old('lokasi_outlet', $outlet->lokasi_outlet) }}">
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
