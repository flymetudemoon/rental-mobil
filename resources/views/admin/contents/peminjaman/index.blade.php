@extends('admin.main')

@section('content')
<div class="pagetitle">
    <h1>Daftar Peminjaman</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active">Peminjaman</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">
            <a href="/admin/peminjaman/create" class="btn btn-primary my-4">+ Tambah Peminjaman</a>
            <table class="table mt-2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peminjam</th>
                        <th>KTP Peminjam</th>
                        <th>Keperluan Pinjam</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Biaya</th>
                        <th>Armada</th>
                        <th>Status Pinjam</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peminjaman as $peminjam)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $peminjam->nama_peminjam }}</td>
                        <td>{{ $peminjam->ktp_peminjam }}</td>
                        <td>{{ $peminjam->keperluan_pinjam }}</td>
                        <td>{{ $peminjam->mulai }}</td>
                        <td>{{ $peminjam->selesai }}</td>
                        <td>{{ $peminjam->biaya }}</td>
                        <td>{{ $peminjam->armada->merk ?? '-' }}</td>
                        <td>{{ $peminjam->status_pinjam }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="/admin/peminjaman/edit/{{ $peminjam->id }}" class="btn btn-warning me-2">Edit</a>
                                <form action="/admin/peminjaman/delete/{{ $peminjam->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah Anda Yakin')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
