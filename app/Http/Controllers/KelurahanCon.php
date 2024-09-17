<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KelurahanCon extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['kecamatan'] = Kecamatan::orderBy('name', 'asc')->get();
        $data['kelurahan'] = Kelurahan::orderBy('name', 'asc')->get();
        return view('kelurahan', $data);
    }

    public function fillkec($id)
    {
        $kelurahan = Kelurahan::where('id_kecamatan', $id)->orderBy('name', 'asc')->get();
        return response()->json($kelurahan);
    }

    public function allkel() {
        $kelurahan = Kelurahan::orderBy('name', 'asc')->get();
        return response()->json($kelurahan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255|unique:kelurahan,name', // Cek duplikasi nama
        ]);

        // Menyimpan data ke dalam tabel kecamatan menggunakan create()
        Kelurahan::create([
            'id_kecamatan' => $request->kec,
            'name' => $request->name,
        ]);

        // Redirect atau response setelah berhasil menyimpan data
        return redirect()->back()->with('success', 'Kelurahan berhasil ditambahkan.');
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
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255|unique:kelurahan,name', // Cek duplikasi nama
        ]);

        // Update data item
        $item = Kelurahan::find($id);
        $item->update([
            'id_kecamatan' => $request->kec,
            'name' => $request->name,
        ]);

        // Redirect kembali ke halaman list item
        return redirect()->route('kelurahan')->with('success', 'Kelurahan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Kelurahan::find($id);
        $item->delete();

        return redirect()->route('kelurahan')->with('success', 'Kelurahan berhasil dihapus');
    }
}
