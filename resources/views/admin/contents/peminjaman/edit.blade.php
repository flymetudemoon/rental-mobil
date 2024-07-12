@extends('admin.main')

@section('content')
<div class="pagetitle">
    <h1>Edit Peminjaman</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/peminjaman">Peminjaman</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">
            <form action="/admin/peminjaman/update/{{ $peminjaman->id }}" method="POST" class="mt-3">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
                    <input type="text" name="nama_peminjam" id="nama_peminjam" class="form-control" value="{{ $peminjaman->nama_peminjam }}" required>
                </div>

                <div class="mb-3">
                    <label for="ktp_peminjam" class="form-label">KTP Peminjam</label>
                    <input type="text" name="ktp_peminjam" id="ktp_peminjam" class="form-control" value="{{ $peminjaman->ktp_peminjam }}" required>
                </div>

                <div class="mb-3">
                    <label for="keperluan_pinjam" class="form-label">Keperluan Pinjam</label>
                    <input type="text" name="keperluan_pinjam" id="keperluan_pinjam" class="form-control" value="{{ $peminjaman->keperluan_pinjam }}" required>
                </div>

                <div class="mb-3">
                    <label for="mulai" class="form-label">Mulai Pinjam</label>
                    <input type="date" name="mulai" id="mulai" class="form-control" value="{{ $peminjaman->mulai }}" required>
                </div>

                <div class="mb-3">
                    <label for="selesai" class="form-label">Selesai Pinjam</label>
                    <input type="date" name="selesai" id="selesai" class="form-control" value="{{ $peminjaman->selesai }}" required>
                </div>

                <div class="mb-3">
                    <label for="biaya" class="form-label">Biaya</label>
                    <input type="number" name="biaya" id="biaya" class="form-control" value="{{ $peminjaman->biaya }}" required>
                </div>

                <div class="mb-3">
                    <label for="armada_id" class="form-label">Armada</label>
                    <select name="armada_id" id="armada_id" class="form-select" required>
                        <option value="">Pilih Armada</option>
                        @foreach($armada as $a)
                            <option value="{{ $a->id }}" {{ $peminjaman->armada_id == $a->id ? 'selected' : '' }}>{{ $a->merk }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="komentar_peminjam" class="form-label">Komentar Peminjam</label>
                    <textarea name="komentar_peminjam" id="komentar_peminjam" class="form-control">{{ $peminjaman->komentar_peminjam }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="status_pinjam" class="form-label">Status Pinjam</label>
                    <input type="text" name="status_pinjam" id="status_pinjam" class="form-control" value="{{ $peminjaman->status_pinjam }}" required>
                </div>

                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
