<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agenda = DB::table('agenda')->orderBy('waktu','ASC')->paginate(10);
        $data['title'] = "Agenda";
        $data['sub'] = 'UKM FKIP MENGAJAR ULM';
        return view('agenda.index',$data,['agenda' => $agenda] );
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
        $nama = $request->input('nama');
        $deskripsi = $request->input('deskripsi');
        $waktu = $request->input('waktu');

        $query = DB::table('agenda')->insert([
            'nama' => $nama,
            'deskripsi' => $deskripsi,
            'waktu' => $waktu,
        ]);

        if ($query) {
            return redirect()->route('agenda.index')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('agenda.index')->with('failed', 'Data Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $deskripsiEdit = $request->input('deskripsiEdit');
        $waktuEdit = $request->input('waktuEdit');

        $query = DB::table('agenda')->where('id', $id)->update([
            'nama' => $namaEdit,
            'deskripsi' => $deskripsiEdit,
            'waktu' => $waktuEdit,
        ]);

        if ($query) {
            return redirect()->route('agenda.index')->with('success', 'Data Berhasil Diupdate');
        } else {
            return redirect()->route('agenda.index')->with('failed', 'Data Gagal Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $query = DB::table('agenda')->where('id', $id)->delete();
        if ($query) {
            return redirect()->route('agenda.index')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('agenda.index')->with('failed', 'Data Gagal Dihapus');
        }
    }

    public function search(Request $request)
    {
        $data['title'] = "Agenda";
        $data['sub'] = "Pencarian";
        
        if($request->has('search')){
            $agenda = DB::table('agenda')->where('nama', 'LIKE', '%'.$request->search.'%')->orderBy('nama','ASC')->paginate();
        }
        else{
            $agenda = DB::table('agenda')->orderBy('nama','ASC')->get();
        }
        
        return view('agenda.index',$data,['agenda' => $agenda]);
    }
}
