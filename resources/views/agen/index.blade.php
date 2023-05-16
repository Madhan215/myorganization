@extends('layouts.main')

@section('container')

<div class="container">

<div class="d-flex justify-content-end mb-4">
  <form action="{{route('search')}}" class="form-inline" method="GET">
  <div class="input-group">
    <input type="search" name="search" class="form-control" placeholder="Pencarian...">
    <div class="input-group-append">
      <button type="submit" class="btn btn-default">
        <i class="fas fa-search"></i>
      </button>
    </div>
  </div>
  </form>
  
</div>


<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" style="width: 66%">Nama</th>
      <th scope="col" style="width: 30%">NIM</th>
      {{-- <th scope="col">Jabatan</th> --}}
      <th scope="col" style="width: 4%">Informasi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($agens as $agen) : ?>
    <tr>
      <td><?= $agen->nama ?></td>
      <td><?= $agen->nim ?></td>
      <td><a href="{{ route('show',$agen->nim) }}"><button class="btn btn-block btn-primary">INFO</button></a></td>
    </tr>
  </tbody>
  <?php endforeach; ?>
</table>

<div class="d-flex justify-content-end">
  {{$agens->links()}}
</div>

</div>



@endsection