@extends('admin.main')

@section('content')
<div class="pagetitle">
    <h1>Edit Pembayaran</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/pembayaran">Pembayaran</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">
            <form action="/admin/pembayaran/update/{{ $pembayaran->id }}" method="POST" class="mt-3">
                @csrf
                @method('PUT')
                <div class="mb-2">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $pembayaran->tanggal }}">
                </div>

                <div class="mb-2">
                    <label for="jumlah_bayar" class="form-label">Jumlah Bayar</label>
                    <input type="number" step="0.01" name="jumlah_bayar" id="jumlah_bayar" class="form-control" value="{{ $pembayaran->jumlah_bayar }}">
                </div>

                <div class="mb-2">
                    <label for="peminjaman_id" class="form-label">Peminjaman</label>
                    <select name="peminjaman_id" id="peminjaman_id" class="form-select">
                        <option value="">Pilih Peminjaman</option>
                        @foreach($peminjaman as $pinjam)
                            <option value="{{ $pinjam->id }}" {{ $pinjam->id == $pembayaran->peminjaman_id ? 'selected' : '' }}>{{ $pinjam->nama_peminjam }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
