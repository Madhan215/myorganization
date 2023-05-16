<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class AgenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $data['title'] = "Dashboard";
        $data['sub'] = "Rumah FM";
        $data['today'] = date('m-d');
        $agens = DB::table('users')->orderBy('nama','ASC')->get();
        
        return view('dashboard.index',$data,['agens' => $agens] );
    }
    
    public function agen(): View
    {
        $agens = DB::table('users')->orderBy('nama','ASC')->paginate(10);
        $data['title'] = "Agen FM";
        $data['sub'] = 'UKM FKIP MENGAJAR ULM';
        return view('agen.index',$data,['agens' => $agens] );
    }

    public function presensi()
    {
        $data['title'] = "Presensi";
        $data['sub'] = 'UKM FKIP MENGAJAR ULM';
        return view('agen.presensi',$data);
    }

    public function profil(){
        $data['title'] = "Profil Saya";
        $data['sub'] = auth()->user()->nama;
        $data['nim'] = auth()->user()->nim;
        $data['nama'] = auth()->user()->nama;
        $data['nomor_anggota'] = auth()->user()->nomor_anggota;
        $data['departemen'] = auth()->user()->departemen;
        $data['jabatan'] = auth()->user()->jabatan;
        $data['tempat_lahir'] = auth()->user()->tempat_lahir;
        $data['tanggal_lahir'] = auth()->user()->tanggal_lahir;
        $data['email'] = auth()->user()->email;
        $data['no_wa'] = auth()->user()->no_wa;
        $data['prodi'] = auth()->user()->prodi;
        $data['status_agen'] = auth()->user()->status_agen;
        $data['tahun'] = auth()->user()->tahun;
        $data['angkatan'] = auth()->user()->angkatan;
        $data['poin'] = auth()->user()->poin;
        $data['foto'] = auth()->user()->foto;
        return view('auth.profil',$data);
    }

    public function edit_pass(Request $request, string $id){
        $query = DB::table('users')->where('nim', $id)->update([
            'password' => Hash::make($request->get('password'))
        ]);
        if ($query) {
            return redirect()->route('profil')->with('success', 'Password Berhasil Diupdate');
        } else {
            return redirect()->route('profil')->with('failed', 'Password Gagal Diupdate');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   //$id = '2110131210003';
        $data['agen'] = DB::table('users')->where('nim', $id)->first();
        $data['title'] = 'Profil Agen FM';
        $agen = $data['agen'];
        $data['nim'] = $agen->nim;
        $data['nama'] =  $agen->nama;
        $data['nomor_anggota'] = $agen->nomor_anggota;
        $data['departemen'] = $agen->departemen;
        $data['jabatan'] = $agen->jabatan;
        $data['tempat_lahir'] = $agen->tempat_lahir;
        $data['tanggal_lahir'] = $agen->tanggal_lahir;
        $data['email'] = $agen->email;
        $data['no_wa'] = $agen->no_wa;
        $data['prodi'] = $agen->prodi;
        $data['status_agen'] = $agen->status_agen;
        $data['tahun'] = $agen->tahun;
        $data['angkatan'] = $agen->angkatan;
        $data['poin'] = $agen->poin;
        $data['foto'] = $agen->foto;
        $data['sub'] = $data['agen']->nama;
        return view('agen.detail', $data);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $namaEdit = $request->input('namaEdit');
        $prodi = $request->input('prodi');
        $tempatlahirEdit = $request->input('tempatlahirEdit');
        $tanggallahirEdit = $request->input('tanggallahirEdit');
        $emailEdit = $request->input('emailEdit');
        $nowaEdit = $request->input('nowaEdit');

        if($request->hasFile('image'))
        {
            $item = DB::table('users')->where('nim', $id)->first();
            Storage::delete($item->foto);

            $validatData['image'] = $request->file('image')->store('images/agen');
            $query_foto = DB::table('users')->where('nim', $id)->update([
            'foto' => $validatData['image'],
        ]);
        }

        $query = DB::table('users')->where('nim', $id)->update([
            'nama' => $namaEdit,
            'prodi' => $prodi,
            'tempat_lahir' => $tempatlahirEdit,
            'tanggal_lahir' => $tanggallahirEdit,
            'email' => $emailEdit,
            'no_wa' => $nowaEdit,
        ]);

        if ($query || $query_foto) {
            return redirect()->route('profil')->with('success', 'Data Berhasil Diupdate');
        } else {
            return redirect()->route('profil')->with('failed', 'Data Gagal Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request)
    {
        //dd($request);
        $data['title'] = "Agen FM";
        $data['sub'] = "Pencarian";
        
        if($request->has('search')){
            // $agen = Agen::where('nama', 'LIKE','%'.$request->search.'%')->get();
            $agens = DB::table('users')->where('nama', 'LIKE', '%'.$request->search.'%')->orderBy('nama','ASC')->paginate(100);
        }
        else{
            $agens = DB::table('users')->orderBy('nama','ASC')->paginate(10);
        }
        
        return view('agen.index',$data,['agens' => $agens]);
    }
}
