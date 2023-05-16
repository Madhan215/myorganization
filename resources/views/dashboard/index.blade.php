
@extends('layouts.main')

@section('container')

<div class="container">

  <?php foreach ($agens as $agen) : ?>
  @if($today == date('m-d', strtotime($agen->tanggal_lahir)) )
  <div class="card" style="width: 18rem;">
  <img src="{{ asset('storage/' . $agen->foto )}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><b>Happy Birthday</b></h5>
    <p class="card-text">Selamat ulang tahun kak <?= $agen->nama ?>, semoga panjang umur dan disehatkan badan serta harapan dan impiannya lekas terwujud.</p>
    <a href="https://wa.me/<?= $agen->no_wa ?>?text=Ucapkan%20Sesuatu" class="btn btn-primary">Ucapkan Selamat</a>
  </div>
</div>
  @endif
  <?php endforeach; ?>
  

</div>

@endsection