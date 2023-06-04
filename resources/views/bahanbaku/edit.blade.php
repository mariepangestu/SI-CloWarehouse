@extends('layouts.app')
@section('content')
    <form action="{{ route('bahanbaku.update', $bahanbaku->id_bahanbaku) }}" method="POST">
        {{-- token untuk biar engga error 401 --}}
        @method('PUT')
        @csrf
        {{-- token untuk biar engga error 401 --}}
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Data Bahan Baku</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_bahan">Nama Bahan</label>
                            <input type="text" class="form-control" id="nama_bahan" name="nama_bahan"
                                value="{{ old('nama_bahan', $bahanbaku->nama_bahan) }}">
                            <label for="jumlah_bahan">Jumlah Bahan</label>
                            <input type="text" class="form-control" id="jumlah_bahan" name="jumlah_bahan"
                                value="{{ old('jumlah_bahan', $bahanbaku->jumlah_bahan) }}">
                            <label for="satuan_bahan">Satuan Bahan</label>
                            <select class="form-control" name="satuan_bahan" id="satuan_bahan"
                                value="{{ old('satuan_bahan', $bahanbaku->satuan_bahan) }}">
                                <option value="0">--- Pilih Satuan ---</option>
                                <option value="g" @if($bahanbaku->satuan_bahan == "g") selected @endif>gram</option>
                                <option value="kg" @if($bahanbaku->satuan_bahan == "kg") selected @endif>Kilogram</option>
                                <option value="kwintal" @if($bahanbaku->satuan_bahan == "kwintal") selected @endif>Kwintal</option>
                                <option value="ton" @if($bahanbaku->satuan_bahan == "ton") selected @endif>Ton</option>
                            </select>
                            <label for="harga_bahan">Harga Bahan</label>
                            <input type="text" class="form-control" id="harga_bahan" name="harga_bahan"
                                value="{{ old('harga_bahan', $bahanbaku->harga_bahan) }}">
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
