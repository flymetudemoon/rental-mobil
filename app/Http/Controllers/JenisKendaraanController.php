<?php

namespace App\Http\Controllers;

use App\Models\JenisKendaraan;
use Illuminate\Http\Request;

class JenisKendaraanController extends Controller
{
    // //method untuk menampilkan data student
    public function index()
    {
        //tarik data courses dari db
        $jenis_kendaraan = JenisKendaraan::all();

        //panggil view dan kirim data students
        return view('admin.contents.jenis_kendaraan.index', [
            'jenis_kendaraan' => $jenis_kendaraan,
        ]);
    }
    public function create()
    {
        return view('admin.contents.jenis_kendaraan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        JenisKendaraan::create([
            'nama' => $request->nama,
        ]);

        return redirect('admin/jenis_kendaraan')->with('success', 'Jenis Kendaraan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jenis_kendaraan = JenisKendaraan::findOrFail($id);
        return view('admin.contents.jenis_kendaraan.edit', compact('jenis_kendaraan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $jenis_kendaraan = JenisKendaraan::findOrFail($id);
        $jenis_kendaraan->nama = $request->nama;
        $jenis_kendaraan->save();

        return redirect('admin/jenis_kendaraan')->with('success', 'Jenis Kendaraan berhasil diupdate.');
    }

    public function destroy($id)
    {
        $jenis_kendaraan = JenisKendaraan::findOrFail($id);
        $jenis_kendaraan->delete();

        return redirect('admin/jenis_kendaraan')->with('success', 'Jenis Kendaraan berhasil dihapus.');
    }
}
