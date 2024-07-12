@extends('admin.main')

@section('content')
<div class="pagetitle">
    <h1>Edit Armada</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/armada">Armada</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">
            <form action="/admin/armada/update/{{ $armada->id }}" method="POST" class="mt-3">
                @csrf
                @method('PUT')
                <div class="mb-2">
                    <label for="merk" class="form-label">Merk</label>
                    <input type="text" name="merk" id="merk" class="form-control" value="{{ $armada->merk ?? '' }}">
                </div>

                <div class="mb-2">
                    <label for="nopol" class="form-label">Nomor Polisi</label>
                    <input type="text" name="nopol" id="nopol" class="form-control" value="{{ $armada->nopol ?? '' }}">
                </div>

                <div class="mb-2">
                    <label for="thn_beli" class="form-label">Tahun Beli</label>
                    <input type="text" name="thn_beli" id="thn_beli" class="form-control" value="{{ $armada->thn_beli ?? '' }}">
                </div>

                <div class="mb-2">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control">{{ $armada->deskripsi ?? '' }}</textarea>
                </div>

                <div class="mb-2">
                    <label for="jenis_kendaraan_id" class="form-label">Jenis Kendaraan</label>
                    <select name="jenis_kendaraan_id" id="jenis_kendaraan_id" class="form-select">
                        <option value="">Pilih Jenis Kendaraan</option>
                        @foreach($jenis_kendaraan as $jenis)
                            <option value="{{ $jenis->id }}" {{ $jenis->id == $armada->jenis_kendaraan_id ? 'selected' : '' }}>{{ $jenis->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-2">
                    <label for="kapasitas_kursi" class="form-label">Kapasitas Kursi</label>
                    <input type="number" name="kapasitas_kursi" id="kapasitas_kursi" class="form-control" value="{{ $armada->kapasitas_kursi ?? '' }}">
                </div>

                <div class="mb-2">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="number" step="0.1" name="rating" id="rating" class="form-control" value="{{ $armada->rating ?? '' }}">
                </div>

                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
