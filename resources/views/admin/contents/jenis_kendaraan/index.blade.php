@extends('admin.main')

@section('content')
<div class="pagetitle">
    <h1>Jenis Kendaraan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Jenis Kendaraan</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">
            <a href="/admin/jenis_kendaraan/create" class="btn btn-primary my-4">+ Jenis Kendaraan</a>
            <table class="table mt-2">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Action</th>
                </tr>

                @foreach($jenis_kendaraan as $jenis)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $jenis->nama }}</td>
                    <td class="d-flex">
                        <a href="/admin/jenis_kendaraan/edit/{{ $jenis->id }}" class="btn btn-warning me-2">Edit</a>
                        <form action="/admin/jenis_kendaraan/delete/{{ $jenis->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah Anda Yakin')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</section>
@endsection
