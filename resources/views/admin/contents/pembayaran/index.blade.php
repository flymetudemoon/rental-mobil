@extends('admin.main')

@section('content')
<div class="pagetitle">
    <h1>Pembayaran</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Pembayaran</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">
            <a href="/admin/pembayaran/create" class="btn btn-primary my-4">+ Pembayaran</a>
            <table class="table mt-2">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jumlah Bayar</th>
                    <th>Peminjaman</th>
                    @if (Auth::user()->role == 'buyyer')
                    <th>Action</th>   
                    @endif
                    
                </tr>

                @foreach($pembayaran as $bayar)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $bayar->tanggal }}</td>
                    <td>{{ $bayar->jumlah_bayar }}</td>
                    <td>{{ $bayar->peminjaman->nama_peminjam }}</td>
                    @if (Auth::user()->role == 'buyyer')
                    <td class="d-flex">
                        <a href="/admin/pembayaran/edit/{{ $bayar->id }}" class="btn btn-warning me-2">Edit</a>
                        <form action="/admin/pembayaran/delete/{{ $bayar->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah Anda Yakin')">Hapus</button>
                        </form>
                    </td>
                    @endif
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</section>
@endsection
