@extends('admin.main')

@section('content')
<div class="pagetitle">
    <h1>Armada</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin.dashboard">Home</a></li>
            <li class="breadcrumb-item active">Armada</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">
            <a href="/admin/armada/create" class="btn btn-primary my-4">+ Armada</a>
            <table class="table mt-2">
                <tr>
                    <th>No</th>
                    <th>Merk</th>
                    <th>Nomor Polisi</th>
                    <th>Tahun Beli</th>
                    <th>Deskripsi</th>
                    <th>Jenis Kendaraan</th>
                    <th>Kapasitas Kursi</th>
                    <th>Rating</th>
                    <th>Action</th>
                </tr>

                @foreach($armada as $arm)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $arm->merk}}</td>
                    <td>{{ $arm->nopol }}</td>
                    <td>{{ $arm->thn_beli }}</td>
                    <td>{{ $arm->deskripsi }}</td>
                    <td>{{ $arm->jenisKendaraan->nama }}</td>
                    <td>{{ $arm->kapasitas_kursi }}</td>
                    <td>{{ $arm->rating }}</td>
                    <td class="d-flex">
                        <a href="/admin/armada/edit/{{ ($arm->id) }}" class="btn btn-warning me-2">Edit</a>
                        <form action="/admin/armada/delete/{{ ($arm->id) }}"method="POST">
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
