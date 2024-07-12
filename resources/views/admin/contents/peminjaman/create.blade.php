@extends('admin.main')

@section('content')
<div class="pagetitle">
    <h1>Create Peminjaman</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/peminjaman">Peminjaman</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">
            <form action="/admin/peminjaman/store" method="POST" class="mt-3">
                @csrf
                <div class="mb-3">
                    <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
                    <input type="text" name="nama_peminjam" id="nama_peminjam" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="ktp_peminjam" class="form-label">KTP Peminjam</label>
                    <input type="text" name="ktp_peminjam" id="ktp_peminjam" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="keperluan_pinjam" class="form-label">Keperluan Pinjam</label>
                    <input type="text" name="keperluan_pinjam" id="keperluan_pinjam" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="mulai" class="form-label">Mulai Pinjam</label>
                    <input type="date" name="mulai" id="mulai" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="selesai" class="form-label">Selesai Pinjam</label>
                    <input type="date" name="selesai" id="selesai" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="biaya" class="form-label">Biaya</label>
                    <input type="number" name="biaya" id="biaya" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="armada_id" class="form-label">Armada</label>
                    <select name="armada_id" id="armada_id" class="form-select" required>
                        <option value="">Pilih Armada</option>
                        @foreach($armada as $a)
                            <option value="{{ $a->id }}">{{ $a->merk }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="komentar_peminjam" class="form-label">Komentar Peminjam</label>
                    <textarea name="komentar_peminjam" id="komentar_peminjam" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="status_pinjam" class="form-label">Status Pinjam</label>
                    <input type="text" name="status_pinjam" id="status_pinjam" class="form-control" required>
                </div>

                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
