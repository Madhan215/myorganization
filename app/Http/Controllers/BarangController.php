<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventaris = DB::table('inventaris')->orderBy('kode_batang','ASC')->paginate(10);
        $data['title'] = "Inventaris";
        $data['sub'] = 'UKM FKIP MENGAJAR ULM';
        return view('inventaris.index',$data,['barang' => $inventaris] );
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
        //dd($request);
        $kodeInput = $request->input('kode_batang');
        $namaInput = $request->input('nama_barang');
        $jumlahInput = $request->input('jumlah');
        $deskripsiInput = $request->input('deskripsi');
        $tahunInput = $request->input('tahun');

        if($request->hasFile('image'))
        {
            $validatData['image'] = $request->file('image')->store('images/products');
        }

        $query = DB::table('inventaris')->insert([
            'kode_batang' => $kodeInput,
            'nama_barang' => $namaInput,
            'jumlah' => $jumlahInput,
            'deskripsi' => $deskripsiInput,
            'tahun' => $tahunInput,
            'string_img' => $validatData['image'],
        ]);

        if ($query) {
            return redirect()->route('inventaris.index')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('inventaris.index')->with('failed', 'Data Gagal Ditambahkan');
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
        dd($request);
        $kodeInput = $request->input('kode_batangEdit');
        $namaInput = $request->input('nama_barangEdit');
        $jumlahInput = $request->input('jumlahEdit');
        $deskripsiInput = $request->input('deskripsiEdit');
        $tahunInput = $request->input('tahunEdit');

        $query = DB::table('inventaris')->where('id', $id)->update([
            'kode_batang' => $kodeInput,
            'nama_barang' => $namaInput,
            'jumlah' => $jumlahInput,
            'deskripsi' => $deskripsiInput,
            'tahun' => $tahunInput,
        ]);

        if($request->hasFile('image'))
        {
            $item = DB::table('inventaris')->where('id', $id)->first();
            Storage::delete($item->string_img);

            $validatData['image'] = $request->file('image')->store('images/products');
            $query_foto = DB::table('inventaris')->where('id', $id)->update([
            'string_img' => $validatData['image'],
        ]);
        }

        if ($query) {
            return redirect()->route('inventaris.index')->with('success', 'Data Berhasil Diupdate');
        } else {
            return redirect()->route('inventaris.index')->with('failed', 'Data Gagal Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = DB::table('inventaris')->where('id', $id)->first();
        Storage::delete($item->string_img);
        $query = DB::table('inventaris')->where('id', $id)->delete();
        if ($query) {
            return redirect()->route('inventaris.index')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('inventaris.index')->with('failed', 'Data Gagal Dihapus');
        }
    }

    public function search(Request $request)
    {
        $data['title'] = "Inventaris";
        $data['sub'] = "Pencarian";
        
        if($request->has('search')){
            $inventaris = DB::table('inventaris')->where('nama_barang', 'LIKE', '%'.$request->search.'%')->orderBy('nama_barang','ASC')->paginate();
        }
        else{
            $inventaris = DB::table('inventaris')->orderBy('nama_barang','ASC')->get();
        }
        
        return view('inventaris.index',$data,['barang' => $inventaris]);
    }
}
