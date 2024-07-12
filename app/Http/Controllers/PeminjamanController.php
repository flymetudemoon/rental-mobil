<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjam = Peminjaman::with('armada')->get();

        return view('admin.contents.peminjaman.index', [
            'peminjaman' => $peminjam,
        ]);
    }

    public function create()
    {
        $armada = Armada::all();

        return view('admin.contents.peminjaman.create', [
            'armada' => $armada,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'ktp_peminjam' => 'required|string|max:20',
            'keperluan_pinjam' => 'required|string|max:100',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after_or_equal:mulai',
            'biaya' => 'required|numeric|min:0',
            'armada_id' => 'required|exists:armada,id',
            'komentar_peminjam' => 'nullable|string|max:100',
            'status_pinjam' => 'required|string|max:20',
        ]);

        Peminjaman::create([
            'nama_peminjam' => $request->nama_peminjam,
            'ktp_peminjam' => $request->ktp_peminjam,
            'keperluan_pinjam' => $request->keperluan_pinjam,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'biaya' => $request->biaya,
            'armada_id' => $request->armada_id,
            'komentar_peminjam' => $request->komentar_peminjam,
            'status_pinjam' => $request->status_pinjam,
        ]);

        return redirect('admin/peminjaman')->with('success', 'Data peminjaman berhasil ditambahkan.');
}
public function edit($id)
{
    // Mengambil data peminjaman berdasarkan ID
    $peminjaman = Peminjaman::findOrFail($id);

    // Mengambil data armada untuk dropdown
    $armada = Armada::all();

    // Mengirim data ke view untuk ditampilkan dalam form edit
    return view('admin.contents.peminjaman.edit', compact('peminjaman', 'armada'));
}

public function update(Request $request, $id)
{
    // Validasi data yang dikirim dari form edit
    $request->validate([
        'nama_peminjam' => 'required|string|max:255',
        'ktp_peminjam' => 'required|string|max:20',
        'keperluan_pinjam' => 'required|string|max:100',
        'mulai' => 'required|date',
        'selesai' => 'required|date',
        'biaya' => 'required|numeric',
        'armada_id' => 'required|exists:armada,id',
        'komentar_peminjam' => 'nullable|string|max:100',
        'status_pinjam' => 'required|string|max:20',
    ]);

    // Ambil data peminjaman berdasarkan ID
    $peminjaman = Peminjaman::findOrFail($id);

    // Update data peminjaman dengan data baru dari request
    $peminjaman->update([
        'nama_peminjam' => $request->nama_peminjam,
        'ktp_peminjam' => $request->ktp_peminjam,
        'keperluan_pinjam' => $request->keperluan_pinjam,
        'mulai' => $request->mulai,
        'selesai' => $request->selesai,
        'biaya' => $request->biaya,
        'armada_id' => $request->armada_id,
        'komentar_peminjam' => $request->komentar_peminjam,
        'status_pinjam' => $request->status_pinjam,
    ]);

    // Redirect kembali ke halaman peminjaman dengan pesan sukses
    return redirect('/admin/peminjaman')->with('success', 'Peminjaman berhasil diperbarui.');
}
public function destroy($id)
{
    // Mengambil data peminjaman berdasarkan ID
    $peminjaman = Peminjaman::findOrFail($id);

    // Hapus data peminjaman
    $peminjaman->delete();

    // Redirect kembali ke halaman peminjaman dengan pesan sukses
    return redirect('/admin/peminjaman')->with('success', 'Peminjaman berhasil dihapus.');
}
}

