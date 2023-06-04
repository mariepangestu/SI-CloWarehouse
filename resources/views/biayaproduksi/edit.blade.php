@extends('layouts.app')
@section('content')
    <form action="{{ route('biayaproduksi.update', $biayaproduksi->id_biaya_produksi) }}" method="POST">
        {{-- token untuk biar engga error 401 --}}
        @method('PUT')
        @csrf
        {{-- token untuk biar engga error 401 --}}
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Data Biaya Produksi</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_bahanbaku">Nama bahan</label>
                            <select class="form-control" name="id_bahanbaku" id="id_bahanbaku">
                                <option hidden>Pilih Bahan Baku</option>
                                <option disabled="disabled" default="true">Pilih Bahan Baku</option>
                                @foreach ($bahanbaku as $id => $item)
                                    <option value="{{ $item->id_bahanbaku }}"
                                        {{ $item->name_bahan == $id ? 'selected' : '' }}>{{ $item->nama_bahan }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="id_bahanbaku">Nama bahan</label>
                            <select class="form-control" name="id_bahanbaku" id="id_bahanbaku">
                                <option hidden>Pilih Harga Bahan Baku</option>
                                <option disabled="disabled" default="true">Pilih Harga</option>
                                @foreach ($bahanbaku as $id => $item)
                                    <option value="{{ $item->id_bahanbaku }}"
                                        {{ $item->harge_bahan == $id ? 'selected' : '' }}>{{ $item->harga_bahan }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="id_tenaga_kerja">Nama Tenaga Kerja</label>
                            <select class="form-control" name="id_tenaga_kerja" id="id_tenaga_kerja">
                                <option hidden>Pilih Tenaga Kerja</option>
                                <option disabled="disabled" default="true">Pilih Tenaga Kerja</option>
                                @foreach ($tenagakerja as $id => $item)
                                    <option value="{{ $item->id_tenaga_kerja }}"
                                        {{ $item->name_tenaga_kerja == $id ? 'selected' : '' }}>
                                        {{ $item->nama_tenaga_kerja }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="id_tenaga_kerja">Gaji Tenaga Kerja</label>
                            <select class="form-control" name="id_tenaga_kerja" id="id_tenaga_kerja">
                                <option hidden>Pilih Gaji</option>
                                <option disabled="disabled" default="true">Pilih Gaji</option>
                                @foreach ($tenagakerja as $id => $item)
                                    <option value="{{ $item->id_tenaga_kerja }}"
                                        {{ $item->gaje_tenaga_kerja == $id ? 'selected' : '' }}>
                                        {{ $item->gaji_tenaga_kerja }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="total_biaya">Total Biaya Poduksi</label>
                            <input type="text" class="form-control" id="total_biaya" name="total_biaya"
                                value="{{ old('total_biaya', $biayaproduksi->total_biaya) }}">
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
