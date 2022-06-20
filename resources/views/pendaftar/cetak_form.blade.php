@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ $title }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

               <img src='{{ asset("images/$pendaftar->url_foto") }}' class='img-thumbnail' alt='User Image'>
                    <table class="table table-sm">
                      <tbody>
                        <tr>
                          <td class="table-info" width="200px">Nama Lengkap</td>
                          <td>{{ $pendaftar->nama }}</td>
                        </tr>
                        <tr>
                          <td class="table-info">NISN</td>
                          <td>{{ $pendaftar->nisn }}</td>
                        </tr>
                        <tr>
                          <td class="table-info">TTL</td>
                          <td>{{ $pendaftar->tempat_lahir }}, {{ $biodata->tanggal_lahir }}</td>
                        </tr>
                        <tr>
                          <td class="table-info">Email</td>
                          <td>{{ $biodata->email }}</td>
                        </tr>  
                        <tr>
                          <td class="table-info" width="200px">Alamat</td>
                          <td>{{ $pendaftar->alamat }}</td>
                        </tr>
                        <tr>
                          <td class="table-info">No. Telp/Handphone</td>
                          <td>{{ $pendaftar->telp }}</td>
                        </tr>
                        <tr>
                          <td class="table-info">Agama</td>
                          <td>{{ $pendaftar->agama }}</td>
                        </tr>
                        <tr>
                          <td class="table-info">Asal Sekolah</td>
                          <td>{{ $biodata->asalSekolah }}</td>
                        </tr>
                        <tr>
                          <td class="table-info" width="200px">Jurusan</td>
                          <td>{{ $pendaftar->jurusan }}</td>
                        </tr>               
                      </tbody>

                      <br><br><br><br>

                      <tbody>
                        <tr>
                          <td class="table-info" width="200px">Nama Ayah</td>
                          <td>{{ $pendaftar->nama_ayah }}</td>
                        </tr>
                        <tr>
                          <td class="table-info">Pekerjaan Ayah</td>
                          <td>{{ $pendaftar->pekerjaan_ayah }}</td>
                        </tr>
                        <tr>
                          <td class="table-info">Riwayat Pendidikan Ayah</td>
                          <td>{{ $pendaftar->pendidikan_ayah }}</td>
                        </tr> <tr>
                          <td class="table-info" width="200px">Nama Ibu</td>
                          <td>{{ $pendaftar->nama_ibu }}</td>
                        </tr>
                        <tr>
                          <td class="table-info">Pekerjaan Ibu</td>
                          <td>{{ $pendaftar->pekerjaan_ibu }}</td>
                        </tr>
                        <tr>
                          <td class="table-info">Riwayat Pendidikan Ibu</td>
                          <td>{{ $pendaftar->pendidikan_ibu }}</td>
                        </tr>
                      </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection