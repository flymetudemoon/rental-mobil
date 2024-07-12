@extends('admin.main')

@section('content')
<div class="pagetitle">
    <h1>Create Pembayaran</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="">Pembayaran</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">
            <form action="/admin/pembayaran/store" method="POST" class="mt-3">
                @csrf
                <div class="mb-2">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control">
                </div>

                <div class="mb-2">
                    <label for="jumlah_bayar" class="form-label">Jumlah Bayar</label>
                    <input type="number" step="0.01" name="jumlah_bayar" id="jumlah_bayar" class="form-control">
                </div>

                <div class="mb-2">
                    <label for="peminjaman_id" class="form-label">Peminjaman</label>
                    <select name="peminjaman_id" id="peminjaman_id" class="form-select">
                        <option value="">Pilih Peminjaman</option>
                        @foreach($peminjaman as $pinjam)
                            <option value="{{ $pinjam->id }}">{{ $pinjam->nama_peminjam }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
