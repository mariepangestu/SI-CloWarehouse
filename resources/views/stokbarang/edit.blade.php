@extends('layouts.app')
@section('content')
    <form action="{{ route('stokbarang.update', $stok_barang->id_stok_barang) }}" method="POST">
        {{-- token untuk biar engga error 401 --}}
        @method('PUT')
        @csrf
        {{-- token untuk biar engga error 401 --}}
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Data Stok Barang</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_barang">Barang</label>
                            <select class="form-control " 
                                name="id_barang" id="id_barang">
                                <option hidden>Pilih Barang</option>
                                <option disabled="disabled" default="true">Pilih Barang</option>
                                @foreach ($barang as $id => $item)
                                    <option value="{{ $item->id_barang }}" {{ ($item->name_barang == $id) ? 'selected' : '' }}>{{ $item->nama_barang }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="Jumlah_stok">Jumlah Stok</label>
                            <input type="text" class="form-control" id="Jumlah_stok" name="Jumlah_stok"
                                value="{{ old('Jumlah_stok', $stok_barang->Jumlah_stok) }}">
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
