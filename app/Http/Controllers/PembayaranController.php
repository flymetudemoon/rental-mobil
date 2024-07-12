<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with('peminjaman')->get();

        return view('admin.contents.pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        $peminjaman = Peminjaman::all();

        return view('admin.contents.pembayaran.create', compact('peminjaman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah_bayar' => 'required|numeric',
            'peminjaman_id' => 'required|exists:peminjaman,id',
        ]);

        Pembayaran::create($request->all());

        return redirect('admin/pembayaran')->with('success', 'Pembayaran berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $peminjaman = Peminjaman::all();

        return view('admin.contents.pembayaran.edit', compact('pembayaran', 'peminjaman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah_bayar' => 'required|numeric',
            'peminjaman_id' => 'required|exists:peminjaman,id',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update($request->all());

        return redirect('admin/pembayaran')->with('success', 'Pembayaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();

        return redirect('admin/pembayaran')->with('success', 'Pembayaran berhasil dihapus.');
    }
}

