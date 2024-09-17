<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DesaCon extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $data['kecamatan'] = Kecamatan::orderBy('name', 'asc')->get();
        $data['kelurahan'] = Kelurahan::orderBy('name', 'asc')->get();
        $data['desa'] = Desa::orderBy('name', 'asc')->get();
        return view('desa', $data);
    }

    public function fillkec($id)
    {
        $kelurahan = Kelurahan::where('id_kecamatan', $id)->get();
        return response()->json($kelurahan);
    }

    public function alltps()
    {
        $desa = Desa::orderBy('name', 'asc')->get();
        return response()->json($desa);
    }

    public function fillkel($id)
    {
        try {
            // Ambil semua data kelurahan
            $desa = Desa::where('id_kelurahan', $id)->get();
            return response()->json($desa);
        } catch (\Exception $e) {
            // Log error jika terjadi kesalahan
            Log::error($e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan'], 500);
        }
    }

    public function allkel() {
        $kelurahan = Kelurahan::all();
        return response()->json($kelurahan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255|unique:desa,name', // Cek duplikasi nama
        ]);

        // Menyimpan data ke dalam tabel kecamatan menggunakan create()
        Desa::create([
            'id_kelurahan' => $request->kel,
            'name' => $request->name,
        ]);

        // Redirect atau response setelah berhasil menyimpan data
        return redirect()->back()->with('success', 'TPS berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:desa,name', // Cek duplikasi nama
        ]);
        // Update data item
        $item = Desa::find($id);
        $item->update([
            'id_kelurahan' => $request->kel,
            'name' => $request->name,
        ]); 

        // Redirect kembali ke halaman list item
        return redirect()->route('desa')->with('success', 'TPS berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Desa::find($id);
        $item->delete();

        return redirect()->route('desa')->with('success', 'TPS berhasil dihapus');
    }
}
