<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $data['active'] = 'home';
        return view('profil.index',$data);
    }
    public function profil()
    {
        $data['active'] = 'profil';
        return view('profil.profil',$data);
    }
    public function departemenfm()
    {
        $data['active'] = 'departemen';
        return view('profil.departemenfm',$data);
    }
    public function prestasi()
    {
        $data['active'] = 'prestasi';
        return view('profil.prestasi',$data);
    }
    public function news()
    {
        $data['active'] = 'news';
        return view('profil.news',$data);
    }
    public function event()
    {
        $data['active'] = 'event';
        return view('profil.event',$data);
    }
}
