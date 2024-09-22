<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Logdata;
use App\Models\Penduduk;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use App\Exports\PendudukExport;
use App\Exports\PendudukExportKec;
use App\Exports\PendudukExportKel;
use App\Exports\PendudukExportTps;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PendudukCon extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function export()
    {
        $export = new PendudukExport();
        $fileName = $export->export();
        
        // Mengunduh file
        return response()->download(public_path($fileName))->deleteFileAfterSend(true);
    }
    public function exportkec($kec)
    {
        $export = new PendudukExportKec($kec);
        $fileName = $export->export($kec);
        
        // Mengunduh file
        return response()->download(public_path($fileName))->deleteFileAfterSend(true);
    }
    public function exportkel($kec, $kel)
    {
        $export = new PendudukExportKel();
        $fileName = $export->export($kel);
        
        // Mengunduh file
        return response()->download(public_path($fileName))->deleteFileAfterSend(true);
    }
    public function exporttps($kec, $kel, $tps)
    {
        $export = new PendudukExportTps($tps);
        $fileName = $export->export($tps);
        
        // Mengunduh file
        return response()->download(public_path($fileName))->deleteFileAfterSend(true);
    }

    public function index()
    {
        $data['kecamatan'] = Kecamatan::orderBy('name', 'asc')->get();
        $data['kelurahan'] = Kelurahan::orderBy('name', 'asc')->get();
        $data['desa'] = Desa::orderBy('name', 'asc')->get();
        $data['penduduk'] = Penduduk::orderBy('name', 'asc')->get();
        return view('penduduk', $data);
    }

    public function index_viewer()
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
            'nik' => 'required|numeric|digits:16|unique:penduduk,nik', // Cek duplikasi nama
        ], [
            'nik.unique' => 'NIK '. $request->nik .' Sudah Terdaftar',
            'nik.numeric' => 'NIK '. $request->nik .' NIK Hanya Berisi Angka',
            'nik.digits' => 'NIK '. $request->nik .' Panjang NIK  Harus 16 Digit',
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

        $iduser = Auth::user()->id;

        Logdata::create([
            'id_user' => $iduser,
            'aktivitas' => 'Menambahkan Data Penduduk '. $request->name . '',
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

            $iduser = Auth::user()->id;

            Logdata::create([
                'id_user' => $iduser,
                'aktivitas' => 'Mengupdate Data Penduduk '. $request->name . '',
            ]);
    
            // Redirect kembali ke halaman list item
            return redirect()->route('penduduk')->with('success', 'Penduduk berhasil diupdate');
        }

        // Validasi data input
        $request->validate([
            'nik' => 'required|numeric|digits:16|unique:penduduk,nik', // Cek duplikasi nama
        ], [
            'nik.unique' => 'NIK '. $request->nik .' Sudah Terdaftar',
            'nik.numeric' => 'NIK '. $request->nik .' NIK Hanya Berisi Angka',
            'nik.digits' => 'NIK '. $request->nik .' Panjang NIK  Harus 16 Digit',
        ]);

        $item->update([
            'id_tps' => $request->tps,
            'nik' => $request->nik,
            'name' => $request->name,
            'alamat' => $request->alamat,
            'tl' => $request->tl,
            'jk' => $request->jk,
        ]);

        $iduser = Auth::user()->id;

        Logdata::create([
            'id_user' => $iduser,
            'aktivitas' => 'Mengupdate Data Penduduk '. $request->name . '',
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

        $iduser = Auth::user()->id;

        Logdata::create([
            'id_user' => $iduser,
            'aktivitas' => 'Menghapus Data Penduduk '. $item->name . '',
        ]);

        return redirect()->route('penduduk')->with('success', 'Penduduk berhasil dihapus');
    }
}
