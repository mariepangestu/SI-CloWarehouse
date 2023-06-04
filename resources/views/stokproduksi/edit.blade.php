@extends('layouts.app')
@section('content')
    <form action="{{ route('stokproduksi.update', $stokproduksis->id_barang) }}" method="POST">
        {{-- token untuk biar engga error 401 --}}
        @method('PUT')
        @csrf
        {{-- token untuk biar engga error 401 --}}
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Data Stok Produksi</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
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
                            <label for="id_gudang">Nama Gudang</label>
                            <select class="form-control" name="id_gudang" id="id_gudang">
                                <option hidden>Pilih Gudang</option>
                                <option disabled="disabled" default="true">Pilih Gudang</option>
                                @foreach ($gudang as $id => $item)
                                    <option value="{{ $item->id_gudang }}"
                                        {{ $item->name_gudang == $id ? 'selected' : '' }}>{{ $item->nama_gudang }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="jumlah_stok">Jumlah Stok</label>
                            <input type="text" class="form-control" id="jumlah_stok" name="jumlah_stok"
                                value="{{ old('jumlah_stok', $stokproduksis->jumlah_stok) }}">
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
