@extends('admin.main')

@section('content')
<div class="pagetitle">
    <h1>Edit Jenis Kendaraan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/jenis_kendaraan">Jenis Kendaraan</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">
            <form action="/admin/jenis_kendaraan/update/{{ $jenis_kendaraan->id }}" method="POST" class="mt-3">
                @csrf
                @method('PUT')
                <div class="mb-2">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ $jenis_kendaraan->nama ?? '' }}">
                </div>

                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
