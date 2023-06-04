@extends('layouts.app')
@section('title', 'Form Biaya Produksi')
@section('content')
    <form action="{{ route('biayaproduksi.store') }}" method="POST">
        {{-- token untuk biar engga error 401 --}}
        @csrf
        {{-- token untuk biar engga error 401 --}}
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Create Data Biaya Produksi</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_bahanbaku">Nama Bahan</label>
                            <select class="form-control @error('id_bahanbaku') is-invalid @enderror" name="id_bahanbaku"
                                id="id_bahanbaku">
                                <option hidden>Pilih Bahan Baku</option>
                                <option disabled="disabled" default="true">Pilih Bahan Baku</option>
                                @foreach ($bahanbaku as $item)
                                    <option value="{{ $item->id_bahanbaku }}"
                                        @if (old('id_bahanbaku') == $item->id_bahanbaku) selected @endif>
                                        {{ $item->nama_bahan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_bahanbaku')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="id_bahanbaku">Harga Bahan</label>
                            <select class="form-control @error('id_bahanbaku') is-invalid @enderror" name="id_bahanbaku"
                                id="id_bahanbaku">
                                <option hidden>Pilih Harga Bahan</option>
                                <option disabled="disabled" default="true">Pilih Harga bahan</option>
                                @foreach ($bahanbaku as $item)
                                    <option value="{{ $item->id_bahanbaku }}"
                                        @if (old('id_bahanbaku') == $item->id_bahanbaku) selected @endif>
                                        {{ $item->harga_bahan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_bahanbaku')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="id_tenaga_kerja">Tenaga Kerja</label>
                            <select class="form-control @error('id_tenaga_kerja') is-invalid @enderror" name="id_tenaga_kerja"
                                id="id_tenaga_kerja">
                                <option hidden>Pilih Nama Tenaga Kerja</option>
                                <option disabled="disabled" default="true">Pilih Nama</option>
                                @foreach ($tenagakerja as $item)
                                    <option value="{{ $item->id_tenaga_kerja }}"
                                        @if (old('id_tenaga_kerja') == $item->id_tenaga_kerja) selected @endif>
                                        {{ $item->nama_tenaga_kerja}}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_tenaga_kerja')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="id_tenaga_kerja">Tenaga Kerja</label>
                            <select class="form-control @error('id_tenaga_kerja') is-invalid @enderror" name="id_tenaga_kerja"
                                id="id_tenaga_kerja">
                                <option hidden>Pilih Gaji Tenaga Kerja</option>
                                <option disabled="disabled" default="true">Pilih Gaji</option>
                                @foreach ($tenagakerja as $item)
                                    <option value="{{ $item->id_tenaga_kerja }}"
                                        @if (old('id_tenaga_kerja') == $item->id_tenaga_kerja) selected @endif>
                                        {{ $item->gaji_tenaga_kerja}}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_tenaga_kerja')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="total_biaya">Total Biaya</label>
                            <input type="text" class="form-control @error('total_biaya') is-invalid @enderror"
                                placeholder="Masukkan Total Biaya" id="total_biaya" name="total_biaya"
                                value="{{ old('total_biaya') }}">
                            @error('total_biaya')
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
