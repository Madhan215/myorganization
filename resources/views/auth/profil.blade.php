@extends('layouts.main')

@section('container')

<div class="container">
   @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button href="#" class="close" data-dismiss="alert" aria-label="close">&times;</button>
        {{ session('success') }}
    </div>
  @endif
<div class="jumbotron">

  <h5 align="right">
    <i class="bi bi-star"> PoinFM</i>
    : {{$poin}}
  </h5>

 
  
  <div class="d-flex justify-content-center"> 
    <h1 class="display-4"><img src="{{ asset('storage/' . $foto )}}" alt=" " class="rounded-circle" width="150"></h1>
  </div>
  

  <h2 align="center" class="m2-4"><?= $nama ?></h2>
  <h3 align="center" class="mb-4">N.A.{{$nomor_anggota}}/UKMFM/{{$angkatan}}/{{$tahun}}</h3>
  

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

  <div class="d-flex justify-content-end">
    <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#modalEdit">
    Edit Profil
    </button>
    <button type="button" class="btn btn-success m-2" data-toggle="modal" data-target="#editPass" disabled>
    Ubah Password
    </button>

    {{-- MODAL EDIT PROFIL --}}
  <div class="modal fade" id="editPass" tabindex="-1" role="dialog" aria-labelledby="editPassword" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPassword">Ubah Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('editPass', $nim) }}" method="POST">
                    @method('get')
                    @csrf
            <div class="modal-body">
                    <div class="mb-3">
                      <label for="userEdit" class="form-label">NIM</label>
                      <input type="text" class="form-control" name="userEdit" id="userEdit" value="{{$nim}}" disabled>  
                    </div>
                    <div class="mb-3">
                      <label for="passwordEdit" class="form-label">Password Baru</label>
                      <input type="text" class="form-control" name="passwordEdit" id="passwordEdit">  
                    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
            </div>
        </div>
        </div>
{{-- END MODAL EDIT PROFIL --}}

  </div>
</div>
</div>

{{-- MODAL EDIT PROFIL --}}
 <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('agen.update', $nim) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
            <div class="modal-body">
                    <div class="mb-3">
                      <label for="namaEdit" class="form-label">Nama</label>
                      <input required type="text" class="form-control" name="namaEdit" id="namaEdit" value="{{$nama}}">  
                    </div>
                    <div class="mb-3">
                      <label for="nimEdit" class="form-label">NIM</label>
                      <input disabled type="text" class="form-control" name="nimEdit" id="nimEdit" value="{{$nim}}">  
                    </div>
                    <div class="mb-3">
                      <label for="prodiEdit" class="form-label">Program Studi</label> 
                        <select required name="prodi" class="form-select form-select-sm form-control" aria-label=".form-select-sm example">
                          <option selected>{{$prodi}}</option>
                          <option value="Bimbingan dan Konseling">Bimbingan dan Konseling</option>
                          <option value="Pendidikan Bahasa Indonesia">Pendidikan Bahasa Indonesia</option>
                          <option value="Pendidikan Bahasa Inggris">Pendidikan Bahasa Inggris</option>
                          <option value="Pendidikan Biologi">Pendidikan Biologi</option>
                          <option value="Pendidikan Ekonomi">Pendidikan Ekonomi</option>
                          <option value="Pendidikan Fisika">Pendidikan Fisika</option>
                          <option value="Pendidikan Geografi">Pendidikan Geografi</option>
                          <option value="Pendidikan Guru PAUD">Pendidikan Guru PAUD</option>
                          <option value="Pendidikan Guru SD">Pendidikan Guru SD</option>
                          <option value="Pendidikan IPA">Pendidikan IPA</option>
                          <option value="Pendidikan IPS">Pendidikan IPS</option>
                          <option value="Pendidikan Jasmani">Pendidikan Jasmani</option>
                          <option value="Pendidikan Kewarganegaraan">Pendidikan Kewarganegaraan</option>
                          <option value="Pendidikan Khusus">Pendidikan Khusus</option>
                          <option value="Pendidikan Kimia">Pendidikan Kimia</option>
                          <option value="Pendidikan Komputer">Pendidikan Komputer</option>
                          <option value="Pendidikan Matematika">Pendidikan Matematika</option>
                          <option value="Pendidikan Sejarah">Pendidikan Sejarah</option>
                          <option value="Pendidikan Seni Pertunjukan">Pendidikan Seni Pertunjukan</option>
                          <option value="Pendidikan Sosiologi">Pendidikan Sosiologi</option>
                          <option value="Teknologi Pendidikan">Teknologi Pendidikan</option>
                        </select> 
                    </div>
                    <div class="mb-3">
                      <label for="tempatlahirEdit" class="form-label">Tempat Lahir</label>
                      <input required type="text" class="form-control" name="tempatlahirEdit" id="tempatlahirEdit" value="{{$tempat_lahir}}">  
                    </div>
                    <div class="mb-3">
                      <label for="tanggallahirEdit" class="form-label">Tanggal Lahir</label>
                      <input required type="date" class="form-control" name="tanggallahirEdit" id="tanggallahirEdit" value="{{$tanggal_lahir}}">  
                    </div>
                    <div class="mb-3">
                      <label for="emailEdit" class="form-label">Email</label>
                      <input required type="email" class="form-control" name="emailEdit" id="emailEdit" value="{{$email}}">  
                    </div>
                    <div class="mb-3">
                      <label for="nowaEdit" class="form-label">Nomor HP</label>
                      <input required type="text" class="form-control" name="nowaEdit" id="nowaEdit" value="{{$no_wa}}">  
                    </div>
                    <div class="mb-3">
                      <label for="image" class="form-label">Foto Profil</label>
                      <input type="file" class="form-control-file" name="image" id="image" value="{{$foto}}">  
                    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
            </div>
        </div>
        </div>
{{-- END MODAL EDIT PROFIL --}}



@endsection