@extends('layouts.main')

@section('container')

{{-- Start Container --}}
<div class="container">

{{-- Penentu Bulan --}}
<?php 
function ini_bulan($ke){
	$bulan = array (
		'01' => 'Januari',
		'02' => 'Februari',
		'03' => 'Maret',
		'04' => 'April',
		'05' => 'Mei',
		'06' => 'Juni',
		'07' => 'Juli',
		'08' => 'Agustus',
		'09' => 'September',
		'10' => 'Oktober',
		'11' => 'November',
		'12' => 'Desember'
	);
 
	return $bulan[$ke];
}

?>

{{-- Penentu Hari --}}
<?php 
 
// function untuk menampilkan nama hari ini dalam bahasa indonesia
// di buat oleh malasngoding.com
 
function hari_ini($hari){
 
	switch($hari){
		case 'Sun':
			$hari_ini = "Minggu";
		break;
 
		case 'Mon':			
			$hari_ini = "Senin";
		break;
 
		case 'Tue':
			$hari_ini = "Selasa";
		break;
 
		case 'Wed':
			$hari_ini = "Rabu";
		break;
 
		case 'Thu':
			$hari_ini = "Kamis";
		break;
 
		case 'Fri':
			$hari_ini = "Jumat";
		break;
 
		case 'Sat':
			$hari_ini = "Sabtu";
		break;
		
		default:
			$hari_ini = "Tidak di ketahui";		
		break;
	}
 
	return $hari_ini;
 
}
?>

{{-- Start Notifikasi Success --}}
@if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button href="#" class="close" data-dismiss="alert" aria-label="close">&times;</button>
    {{ session('success') }}
  </div>
@endif
{{-- End Notifikasi Success --}}

{{-- Start Tombol Tambah --}}
@if(auth()->user()->departemen == "Steering Commite" || auth()->user()->jabatan == "Kepala Departemen" || auth()->user()->jabatan == "Sekretaris Bendahara")
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Tambah">
 Tambah Jadwal
</button>
@endif
{{-- End Tombol Tanmbah --}}

{{-- Start Searching --}}
<div class="d-flex justify-content-end mb-4 mt-4">
  <form action="{{route('searchagd')}}" class="form-inline" method="GET">
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
      <th scope="col" style="width: 30%">Jadwal</th>
      <th scope="col" style="width: 40%">Deskripsi</th>
      <th scope="col" style="width: 20%">Waktu</th>
      <th scope="col" style="width: 10%">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($agenda as $agd) : ?>
    {{-- Formating Tanggal ke Indonesia --}}
    <?php $date = $agd->waktu; $hari =  date('D', strtotime($date));$tanggal  =  date('d', strtotime($date));$bulan = date('m',strtotime($date)); $tahun = date('Y',strtotime($date)); $jam  = date('H:i:s', strtotime($date));?>
    <tr>
      <td><?= $agd->nama ?></td>
      <td><?= $agd->deskripsi ?></td>
      <td><?= hari_ini($hari). ', '.  $tanggal . ' ' . ini_bulan($bulan) . ' ' . $tahun . '<br>' . $jam?></td>
      <td>
        <button type="button" class="btn btn-success m-1" data-toggle="modal" data-target="#modalDetail<?=$agd->id?>">
          Detail
        </button>

        @if(auth()->user()->departemen == "Steering Commite" || auth()->user()->jabatan == "Kepala Departemen" || auth()->user()->jabatan == "Sekretaris Bendahara")
        <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#modalEdit<?=$agd->id?>">
          Edit
        </button>

        <form action="{{ route('agenda.destroy',$agd->id) }}" method="POST" class="d-inline">
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

{{-- Start Modal Edit --}}
<div class="modal fade" id="modalDetail<?=$agd->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
          <label for="namaDetail">Jadwal</label>
          <input disabled class="form-control" id="namaDetail" value="{{$agd->nama}}">
        </div>
        <div class="form-group">
          <label for="deskripsidetail">Deskripsi</label>
          <textarea disabled type="text" class="form-control" id="deskripsidetail">{{$agd->deskripsi}}</textarea>
        </div>
        <div class="form-group">
          <label for="waktu">Waktu</label>
          <input disabled type="text" class="form-control" id="waktu" value="{{$agd->waktu}}">
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
<div class="modal fade" id="modalEdit<?=$agd->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('agenda.update', $agd->id) }}" method="POST">
        @method('put')
        @csrf
      <div class="modal-body">
        <div class="mb-3">
          <label for="namaEdit" class="form-label">Jadwal</label>
          <input type="text" class="form-control" name="namaEdit" id="namaEdit" value="{{$agd->nama}}">
        </div>
        <div class="mb-3">
          <label for="deskripsiEdit" class="form-label">Deskripsi</label>
          <input type="text" class="form-control" id="deskripsiEdit" name="deskripsiEdit" value="{{$agd->deskripsi}}">
        </div>
        <div class="mb-3">
          <label for="waktuEdit" class="form-label">Waktu</label>
          <input step="any" type="datetime-local" class="form-control" id="waktuEdit" name="waktuEdit" value="{{$agd->waktu}}">
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
  {{$agenda->links()}}
</div>
{{-- End Link Paginate --}}

</div>
{{-- End Container --}}

{{-- Start Modal Tambah Jadwal --}}
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <form action="{{ route('agenda.store') }}" method="POST" enctype="multipart/form-data">
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
          <div class="mb-3">
            <label for="nama" class="form-label">Jadwal</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
          </div>
          <div class="mb-3">
            <label for="waktu" class="form-label">waktu</label>
            <input type="datetime-local" class="form-control" id="waktu" name="waktu" required>
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