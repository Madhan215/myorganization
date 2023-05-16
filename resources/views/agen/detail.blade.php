@extends('layouts.main')

@section('container')

<div class="container">

  <div class="jumbotron">

  <h5 align="right">
    <i class="bi bi-star"> PoinFM</i>
    : {{$poin}}
  </h5>

 
  
  <div class="d-flex justify-content-center"> 
    <h1 class="display-4"><img src="{{ asset('storage/' . $foto )}}" alt=" " class="rounded-circle" width="150"></h1>
  </div>
  

  <h2 align="center" class="m2-4"><?= $nama ?></h2>
  <h3 align="center" class="mb-4">N.A.{{$nomor_anggota}}/UKMFM/{{$tahun}}</h3>
  

  <table class="table">
    <tr>
      <td>NIM</td>
      <td> : </td>
      <td>{{$nim}}</td>
    </tr>
    <tr>
      <td>Program Studi</td>
      <td> : </td>
      <td>{{$prodi}}</td>
    </tr>
    <tr>
      <td>Tingkat Agen</td>
      <td> : </td>
      <td>{{$status_agen}}</td>
    </tr>
    <tr>
      <td>Departemen</td>
      <td> : </td>
      <td>{{$departemen}}</td>
    </tr>
    <tr>
      <td>Jabatan</td>
      <td> : </td>
      <td>{{$jabatan}}</td>
    </tr>
    <tr>
      <td>Tempat, Tanggal Lahir</td>
      <td> : </td>
      <td>{{$tempat_lahir}}, {{$tanggal_lahir}}</td>
    </tr>
    <tr>
      <td>Email</td>
      <td> : </td>
      <td>{{$email}}</td>
    </tr>
    <tr>
      <td>Nomor HP</td>
      <td> : </td>
      <td>{{$no_wa}}</td>
    </tr>
  </table>
  </div>

</div>

@endsection