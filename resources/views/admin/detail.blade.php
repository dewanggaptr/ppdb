@extends('admin.layout')
<br><br>
<br><br>
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Biodata Pengguna
            </div>
            <div class="card-body">
                @if($user)
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" align="center"><img width="120px" src="{{asset('storage/'.$user->url_foto)}}"></li>
                        <li class="list-group-item"><b>Nama Lengkap </b>: {{ $user->nama }}</li>
                        <li class="list-group-item"><b>NISN </b>: {{ $user->nisn }}</li>
                        <li class="list-group-item"><b>TTL </b>: {{ $user->tempat_lahir }}, {{ $user->tanggal_lahir }}</li>
                        <li class="list-group-item"><b>Jenis Kelamin </b>: {{ $user->jenisKel }}</li>
                        <li class="list-group-item"><b>Email </b>: {{ $user->email }}</li>
                        <li class="list-group-item"><b>Alamat </b>: {{ $user->alamat }}</li>
                        <li class="list-group-item"><b>No. Telp/Handphone </b>: {{ $user->telp }}</li>
                        <li class="list-group-item"><b>Agama </b>: {{ $user->agama }}</li>
                        <li class="list-group-item"><b>Asal Sekolah </b>: {{ $user->asalSekolah }}</li>
                        <li class="list-group-item"><b>Jurusan yang dipilih </b>: {{ $user->jurusan }}</li>
                        <li class="list-group-item"><b>Nama Ayah </b>: {{ $user->nama_ayah }}</li>
                        <li class="list-group-item"><b>Pekerjaan Ayah </b>: {{ $user->pekerjaan_ayah }}</li>
                        <li class="list-group-item"><b>Riwayat Pendidikan Ayah </b>: {{ $user->pendidikan_ayah }}</li>
                        <li class="list-group-item"><b>Nama Ibu </b>: {{ $user->nama_ibu }}</li>
                        <li class="list-group-item"><b>Pekerjaan Ibu</b>: {{ $user->pekerjaan_ibu }}</li>
                        <li class="list-group-item"><b>Riwayat Pendidikan Ibu </b>: {{ $user->pendidikan_ibu }}</li>
                    </ul>
                @else
                    <h5>Data pengguna tidak ditemukan</h5>
                @endif
                
            </div>
            <a class="btn btn-success mt-3" href="{{ route('admin.index') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection