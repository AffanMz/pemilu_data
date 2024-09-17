<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Penduduk;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use App\Exports\PendudukExport;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class PendudukCon extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function export()
    {
        return Excel::download(new PendudukExport, 'penduduk.xlsx');
    }

    public function index()
    {
        $data['kecamatan'] = Kecamatan::orderBy('name', 'asc')->get();
        $data['kelurahan'] = Kelurahan::orderBy('name', 'asc')->get();
        $data['desa'] = Desa::orderBy('name', 'asc')->get();
        $data['penduduk'] = Penduduk::orderBy('name', 'asc')->get();
        return view('penduduk', $data);
    }

    public function fillkec($id)
    {
        $kelurahan = Kelurahan::where('id_kecamatan', $id)->get();
        return response()->json($kelurahan);
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
    
    public function filltps($id)
    {
        try {
            // Ambil semua data kelurahan
            $penduduk = Penduduk::where('id_tps', $id)->get();
            return response()->json($penduduk);
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

    public function allpen() {
        $penduduk = Penduduk::all();
        return response()->json($penduduk);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nik' => 'required|string|max:13|unique:penduduk,nik', // Cek duplikasi nama
        ], [
            'nik.unique' => 'NIK '. $request->nik .' Sudah Terdaftar'
        ]);

        // Menyimpan data ke dalam tabel kecamatan menggunakan create()
        Penduduk::create([
            'id_tps' => $request->tps,
            'nik' => $request->nik,
            'name' => $request->name,
            'alamat' => $request->alamat,
            'tl' => $request->tl,
            'jk' => $request->jk,
        ]);

        // Redirect atau response setelah berhasil menyimpan data
        return redirect()->back()->with('success', 'Penduduk Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function search(string $id)
    {
        $penduduk = Penduduk::where('nik', 'LIKE', "%$id%")->get();

        return response()->json($penduduk);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $item = Penduduk::find($id);
        if ($item->nik == $request->nik) {
            $item->update([
                'id_tps' => $request->tps,
                'nik' => $request->nik,
                'name' => $request->name,
                'alamat' => $request->alamat,
                'tl' => $request->tl,
                'jk' => $request->jk,
            ]);
    
            // Redirect kembali ke halaman list item
            return redirect()->route('penduduk')->with('success', 'Penduduk berhasil diupdate');
        }

        // Validasi data input
        $request->validate([
            'nik' => 'required|string|max:13|unique:penduduk,nik', // Cek duplikasi nama
        ], [
            'nik.unique' => 'NIK '. $request->nik .' Sudah Terdaftar'
        ]);

        $item->update([
            'id_tps' => $request->tps,
            'nik' => $request->nik,
            'name' => $request->name,
            'alamat' => $request->alamat,
            'tl' => $request->tl,
            'jk' => $request->jk,
        ]);

        // Redirect kembali ke halaman list item
        return redirect()->route('penduduk')->with('success', 'Penduduk berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Penduduk::find($id);
        $item->delete();

        return redirect()->route('penduduk')->with('success', 'Penduduk berhasil dihapus');
    }
}
