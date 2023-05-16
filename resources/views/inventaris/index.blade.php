@extends('layouts.main')

@section('container')

{{-- Start Container --}}
<div class="container">

{{-- Start Notifikasi Success --}}
@if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button href="#" class="close" data-dismiss="alert" aria-label="close">&times;</button>
    {{ session('success') }}
  </div>
@endif
{{-- End Notifikasi Success --}}

{{-- Start Tombol Tambah --}}
@if(auth()->user()->departemen == "Steering Commite" || auth()->user()->departemen == "Kesekretariatan")
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Tambah">
 Tambah Barang
</button>
@endif
{{-- End Tombol Tanmbah --}}

{{-- Start Searching --}}
<div class="d-flex justify-content-end mb-4 mt-4">
  <form action="{{route('searchinv')}}" class="form-inline" method="GET">
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
{{-- End Searching --}}

{{-- Start Table Content --}}
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" style="width: 20%">Gambar Barang</th>
      <th scope="col" style="width: 20%">Nama Barang</th>
      <th scope="col" style="width: 50%">Deskripsi</th>
      <th scope="col" style="width: 10%">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($barang as $brg) : ?>
    <tr>
      <td><img class="shadow-lg p-1 rounded" src="{{ asset('storage/' . $brg->string_img )}}" alt="" width="100%"></td>
      <td><?= $brg->nama_barang ?></td>
      <td><?= $brg->deskripsi ?></td>
      <td>
        <button type="button" class="btn btn-success m-1" data-toggle="modal" data-target="#modalDetail<?=$brg->id?>">
          Detail
        </button>

        @if(auth()->user()->departemen == "Steering Commite" || auth()->user()->departemen == "Kesekretariatan")
        <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#modalEdit<?=$brg->id?>">
          Edit
        </button>

        <form action="{{ route('inventaris.destroy',$brg->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger m-1" onclick="return confirm_delete()">Hapus</button>
        </form>

        <script type="text/javascript">
          function confirm_delete() {
          return confirm('Anda yakin akan meenghapus data ini?');
          }
        </script>
        @endif
      </td>
    </tr>
  </tbody>
{{-- End Teble Content --}}

{{-- Start Modal Detail --}}
<div class="modal fade" id="modalDetail<?=$brg->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
    <div class="modal-body">
      <form>
        <div class="form-group">
          <label for="gambarDetail">Gambar Barang</label><br>
          <img class="shadow-lg p-1 rounded" src="{{ asset('storage/' . $brg->string_img )}}" alt="" width="100%">
        </div>
        <div class="form-group">
          <label for="kode_batangDetail">Kode Batang</label>
          <input disabled class="form-control" id="kode_batangDetail" value="{{$brg->kode_batang}}">
        </div>
        <div class="form-group">
          <label for="nama_barangDetail">Nama Barang</label>
          <input disabled class="form-control" id="nama_barangDetail" value="{{$brg->nama_barang}}">
        </div>
        <div class="form-group">
          <label for="jumlahDetail">Jumlah</label>
          <input disabled class="form-control" id="jumlahDetail" value="{{$brg->jumlah}}">
        </div>
        <div class="form-group">
          <label for="deskripsiDetail">Deskripsi</label>
          <textarea disabled class="form-control" id="deskripsiDetail">{{$brg->deskripsi}}</textarea>
        </div>
        <div class="form-group">
          <label for="tahunDetail">Tahun</label>
          <input disabled class="form-control" id="tahunDetail" value="{{$brg->tahun}}">
        </div>
      </form>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
{{-- End Modal Detail--}}

{{-- Modal Edit Jadwal --}}
<div class="modal fade" id="modalEdit<?=$brg->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('inventaris.update', $brg->id) }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
      <div class="modal-body">
        <div class="form-group">
          <label for="gambarDetail">Gambar Barang</label><br>
          <img class="shadow-lg p-1 rounded" src="{{ asset('storage/' . $brg->string_img )}}" alt="" width="100%">
        </div>
        <div class="form-group">
          <label for="kode_batangEdit">Kode Batang</label>
          <input class="form-control" id="kode_batangEdit" name="kode_batangEdit" value="{{$brg->kode_batang}}">
        </div>
        <div class="form-group">
          <label for="nama_barangEdit">Nama Barang</label>
          <input class="form-control" id="nama_barangEdit" name="nama_barangEdit" value="{{$brg->nama_barang}}">
        </div>
        <div class="form-group">
          <label for="jumlahEdit">Jumlah</label>
          <input class="form-control" id="jumlahEdit" name="jumlahEdit" value="{{$brg->jumlah}}">
        </div>
        <div class="form-group">
          <label for="deskripsiEdit">Deskripsi</label>
          <textarea class="form-control" id="deskripsiEdit" name="deskripsiEdit">{{$brg->deskripsi}}</textarea>
        </div>
        <div class="form-group">
          <label for="tahunEdit">Tahun</label>
          <input class="form-control" id="tahunEdit" name="tahunEdit" value="{{$brg->tahun}}">
        </div>
        <div class="mb-3">
          <label for="image">Pilih gambar</label>
          <input type="file" id="image" name="image" class="form-control-file">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
{{-- End Modal Edit --}}

  <?php endforeach; ?>
</table>

{{-- Start Link Paginate --}}
<div class="d-flex justify-content-end">
  {{$barang->links()}}
</div>
{{-- End Link Paginate --}}

</div>
{{-- End Container --}}

{{-- Start Modal Tambah Jadwal --}}
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <form action="{{ route('inventaris.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
          <label for="kode_batang">Kode Batang</label>
          <input required class="form-control" id="kode_batang" name="kode_batang">
        </div>
        <div class="form-group">
          <label for="nama_barang">Nama Barang</label>
          <input required class="form-control" id="nama_barang" name="nama_barang">
        </div>
        <div class="form-group">
          <label for="jumlah">Jumlah</label>
          <input required class="form-control" id="jumlah" name="jumlah">
        </div>
        <div class="form-group">
          <label for="deskripsi">Deskripsi</label>
          <textarea required class="form-control" id="deskripsi" name="deskripsi"></textarea>
        </div>
        <div class="form-group">
          <label for="tahun">Tahun</label>
          <input required class="form-control" id="tahun" name="tahun">
        </div>
        <div class="mb-3">
          <label for="image">Pilih gambar</label>
          <input required type="file" id="image" name="image" class="form-control-file">
        </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
      </div>
    </div>
  </form>
</div>
{{-- End Modal Tambah Jadwal --}}

{{-- Start Script --}}
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
{{-- End Scirt --}}

@endsection