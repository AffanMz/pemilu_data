<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;


class KecamatanCon extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['kecamatan'] = Kecamatan::orderBy('name', 'asc')->get();
        return view('kecamatan', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255|unique:kecamatan,name', // Cek duplikasi nama
        ]);

        // Menyimpan data ke dalam tabel kecamatan menggunakan create()
        Kecamatan::create([
            'name' => $request->name,
        ]);

        // Redirect atau response setelah berhasil menyimpan data
        return redirect()->back()->with('success', 'Kecamatan berhasil ditambahkan.');
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
            'name' => 'required|string|max:255|unique:kecamatan,name', // Cek duplikasi nama
        ]);
        // Update data item
        $item = Kecamatan::find($id);
        $item->update([
            'name' => $request->name,
        ]);

        // Redirect kembali ke halaman list item
        return redirect()->route('kecamatan')->with('success', 'Kecamatan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Kecamatan::find($id);
        $item->delete();

        return redirect()->route('kecamatan')->with('success', 'Kecamatan berhasil dihapus');
    }
}
