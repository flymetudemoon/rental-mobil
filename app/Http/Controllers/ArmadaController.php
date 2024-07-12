<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\JenisKendaraan;
use Illuminate\Http\Request;

class ArmadaController extends Controller
{
       // //method untuk menampilkan data student
       public function index()
       {
           //tarik data courses dari db
           $armada = Armada::all();

   
           //panggil view dan kirim data students
           return view('admin.contents.armada.index', [
               'armada' => $armada,
           ]);
       }

       public function create()
       {
        $jenis_kendaraan = JenisKendaraan::all();

        return view('admin.contents.armada.create', [
            'jenis_kendaraan' => $jenis_kendaraan,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'merk' => 'required|string|max:255',
            'nopol' => 'required|string|max:255',
            'thn_beli' => 'required|numeric',
            'deskripsi' => 'required|string',
            'jenis_kendaraan_id' => 'required|exists:jenis_kendaraan,id',
            'kapasitas_kursi' => 'required|numeric|min:1',
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);

        Armada::create([
            'merk' => $request->merk,
            'nopol' => $request->nopol,
            'thn_beli' => $request->thn_beli,
            'deskripsi' => $request->deskripsi,
            'jenis_kendaraan_id' => $request->jenis_kendaraan_id,
            'kapasitas_kursi' => $request->kapasitas_kursi,
            'rating' => $request->rating,
        ]);

        return redirect('admin/armada')->with('success', 'Armada berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $armada = Armada::findOrFail($id);
        $jenis_kendaraan = JenisKendaraan::all();

        return view('admin.contents.armada.edit', [
            'armada' => $armada,
            'jenis_kendaraan' => $jenis_kendaraan,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'merk' => 'required|string|max:255',
            'nopol' => 'required|string|max:255',
            'thn_beli' => 'required|numeric',
            'deskripsi' => 'required|string',
            'jenis_kendaraan_id' => 'required|exists:jenis_kendaraan,id',
            'kapasitas_kursi' => 'required|numeric|min:1',
            'rating' => 'nullable|numeric',
        ]);

        $armada = Armada::findOrFail($id);
        $armada->update([
            'merk' => $request->merk,
            'nopol' => $request->nopol,
            'thn_beli' => $request->thn_beli,
            'deskripsi' => $request->deskripsi,
            'jenis_kendaraan_id' => $request->jenis_kendaraan_id,
            'kapasitas_kursi' => $request->kapasitas_kursi,
            'rating' => $request->rating,
        ]);

        return redirect('admin/armada')->with('success', 'Armada berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $armada = Armada::findOrFail($id);
        $armada->delete();

        return redirect('admin/armada')->with('success', 'Armada berhasil dihapus.');
    }
}



