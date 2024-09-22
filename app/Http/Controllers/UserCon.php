<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\User;
use App\Models\Logdata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserCon extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function allkec() {
        $kecamatan = Kecamatan::orderBy('name', 'asc')->get();
        return response()->json($kecamatan);
    }
    
    public function index()
    {
        if (Auth::user()->status == 'admin') {
            $data['user'] = User::all();
            $data['kecamatan'] = Kecamatan::orderBy('name', 'asc')->get();
            return view('user', $data);
        }

        $kec_user = Auth::user()->id_tugas;
        if (Auth::user()->status == 'editor') {
            $data['user'] = User::where([['status =', 'viewer'],['id_tugas =', $kec_user]])->get();
            return view('user', $data);
        }

        return redirect()->route('penduduk');
    }

    public function logdata()
    {
        if (Auth::user()->status == 'admin') {
            $data['log'] = Logdata::all();
            return view('logdata', $data);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:users,name', // Cek duplikasi nama
        ]);

        if ($request->status == 'editor') {
            User::create([
                'name' => $request->name,
                'status' => $request->status,
                'id_tugas' => $request->kec,
                'email' => $request->name . 'xample@gmail.com',
                'password' => Hash::make($request->pw),
            ]);
        } else {
            User::create([
                'name' => $request->name,
                'status' => $request->status,
                'id_tugas' => $request->kel,
                'email' => $request->name . 'xample@gmail.com',
                'password' => Hash::make($request->pw),
            ]);
        }

        $iduser = Auth::user()->id;
        
        // Menyimpan data ke dalam tabel User menggunakan create()


        Logdata::create([
            'id_user' => $iduser,
            'aktivitas' => 'Menambahkan Data User '. $request->name . ' Status : '. $request->status ,
        ]);

        // Redirect atau response setelah berhasil menyimpan data
        return redirect()->back()->with('success', 'User berhasil ditambahkan.');
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
        $item = User::find($id);

        if ($request->name == $item->name) {
            if ($item->status == 'admin') {
                if ($request->pw) {
                    $item->update([
                        'name' => $request->name,
                        'status' => $item->status,
                        'id_tugas' => $item->id_tugas,
                        'password' => Hash::make($request->pw),
                    ]);
                } else {
                    $item->update([
                        'name' => $request->name,
                        'status' => $item->status,
                        'id_tugas' => $item->id_tugas,
                    ]);
                }
    
                $id_user = Auth::user()->id;
    
                Logdata::create([
                    'id_user' => $id_user,
                    'aktivitas' => 'Mengupdate Data User '. $request->name . ' Status : '. $request->status ,
                ]);
    
                // Redirect kembali ke halaman list item
                return redirect()->route('user')->with('success', 'User berhasil diupdate');
            }
    
            if ($request->status == 'editor') {
                if ($request->pw) {
                    $item->update([
                        'name' => $request->name,
                        'status' => $request->status,
                        'id_tugas' => $request->kec,
                        'password' => Hash::make($request->pw),
    
                    ]);
                } else {
                    $item->update([
                        'name' => $request->name,
                        'status' => $request->status,
                        'id_tugas' => $request->kec,
                    ]);
                }
            } else {
                if ($request->pw) {
                    $item->update([
                        'name' => $request->name,
                        'status' => $request->status,
                        'id_tugas' => $request->kel,
                        'password' => Hash::make($request->pw),
                    ]);
                } else {
                    $item->update([
                        'name' => $request->name,
                        'status' => $request->status,
                        'id_tugas' => $request->kel,
                    ]);
                }
            }
        } else {
            $request->validate([
                'name' => 'required|string|unique:users,name', // Cek duplikasi nama
            ]);

            if ($item->status == 'admin') {
                if ($request->pw) {
                    $item->update([
                        'name' => $request->name,
                        'status' => $item->status,
                        'id_tugas' => $item->id_tugas,
                        'password' => Hash::make($request->pw),
                    ]);
                } else {
                    $item->update([
                        'name' => $request->name,
                        'status' => $item->status,
                        'id_tugas' => $item->id_tugas,
                    ]);
                }
    
                $id_user = Auth::user()->id;
    
                Logdata::create([
                    'id_user' => $id_user,
                    'aktivitas' => 'Mengupdate Data User '. $request->name . ' Status : '. $request->status ,
                ]);
    
                // Redirect kembali ke halaman list item
                return redirect()->route('user')->with('success', 'User berhasil diupdate');
            }
    
            if ($request->status == 'editor') {
                if ($request->pw) {
                    $item->update([
                        'name' => $request->name,
                        'status' => $request->status,
                        'id_tugas' => $request->kec,
                        'password' => Hash::make($request->pw),
    
                    ]);
                } else {
                    $item->update([
                        'name' => $request->name,
                        'status' => $request->status,
                        'id_tugas' => $request->kec,
                    ]);
                }
            } else {
                if ($request->pw) {
                    $item->update([
                        'name' => $request->name,
                        'status' => $request->status,
                        'id_tugas' => $request->kel,
                        'password' => Hash::make($request->pw),
                    ]);
                } else {
                    $item->update([
                        'name' => $request->name,
                        'status' => $request->status,
                        'id_tugas' => $request->kel,
                    ]);
                }
            }
        }

        $id_user = Auth::user()->id;

        Logdata::create([
            'id_user' => $id_user,
            'aktivitas' => 'Mengupdate Data User '. $request->name . ' Status : '. $request->status ,
        ]);

        // Redirect kembali ke halaman list item
        return redirect()->route('user')->with('success', 'User berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = User::find($id);
        $item->delete();

        $id_user = Auth::user()->id;

        Logdata::create([
            'id_user' => $id_user,
            'aktivitas' => 'Menghapus Data User'. $item->name . ' Status : '. $item->status ,
        ]);

        return redirect()->route('user')->with('success', 'User berhasil dihapus');
    }
}
