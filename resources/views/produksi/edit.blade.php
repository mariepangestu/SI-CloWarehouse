@extends('layouts.app')
@section('content')
    <form action="{{ route('produksi.update', $produksi->id_produksi) }}" method="POST">
        {{-- token untuk biar engga error 401 --}}
        @method('PUT')
        @csrf
        {{-- token untuk biar engga error 401 --}}
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Data Produksi</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_barang">Barang</label>
                            <select class="form-control" name="id_barang" id="id_barang">
                                <option hidden>Pilih kategori</option>
                                <option disabled="disabled" default="true">Pilih Barang</option>
                                @foreach ($barang as $id => $item)
                                    <option value="{{ $item->id_barang }}"
                                        {{ $item->name_barang == $id ? 'selected' : '' }}>{{ $item->nama_barang }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="id_biaya_produksi">Total Biaya Produksi</label>
                            <select class="form-control" name="id_biaya_produksi" id="id_biaya_produksi">
                                <option hidden>Pilih Total Biaya</option>
                                <option disabled="disabled" default="true">Pilih Total Biaya</option>
                                @foreach ($biayaproduksi as $id => $item)
                                    <option value="{{ $item->id_biaya_produksi }}"
                                        {{ $item->total_biaya == $id ? 'selected' : '' }}>{{ $item->total_biaya }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="jumlah_produksi">Jumlah Produksi</label>
                            <input type="text" class="form-control" id="jumlah_produksi" name="jumlah_produksi"
                                value="{{ old('jumlah_produksi', $produksi->jumlah_produksi) }}">
                            <label for="tgl_produksi">Tanggal Produksi</label>
                            <input type="date" class="form-control" id="tgl_produksi" name="tgl_produksi"
                                value="{{ old('tgl_produksi', $produksi->tgl_produksi) }}">
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
