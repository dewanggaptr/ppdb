@extends('layouts.daftar')

@section('content')
<br><br>
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Form Pendaftaran Siswa Baru') }}</div>

                <div class="card-body">

                    @if(session()->has('success'))
                        <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('simpanedit') }}" enctype="multipart/form-data" id="myForm">
                        @csrf
                        <small id="passwordHelpBlock" class="form-text text-danger">
                                 Mohon isi kembali form yang kosong.
                        </small> 
                        <br><br>

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ $user->nama}}" required autofocus>

                                @if ($errors->has('nama'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nisn" class="col-md-4 col-form-label text-md-right">{{ __('NISN') }}</label>

                            <div class="col-md-4">
                                <input id="nisn" type="text" class="form-control{{ $errors->has('nisn') ? ' is-invalid' : '' }}" name="nisn" value="{{ $user->nisn }}" required autofocus>

                                @if ($errors->has('nisn'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nisn') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tempat_lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tempat Lahir') }}</label>

                            <div class="col-md-5">
                                <input id="tempat_lahir" type="text" class="form-control{{ $errors->has('tempat_lahir') ? ' is-invalid' : '' }}" name="tempat_lahir" value="{{ $user->tempat_lahir}}" required autofocus>

                                @if ($errors->has('tempat_lahir'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

                            <div class="col-md-4">
                                <input id="tanggal_lahir" type="date" class="form-control{{ $errors->has('tanggal_lahir') ? ' is-invalid' : '' }}" name="tanggal_lahir" value="{{ $user->tanggal_lahir}}" required autofocus>
                                <small id="passwordHelpBlock" class="form-text text-danger">
                                </small>                                

                                @if ($errors->has('tanggal_lahir'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenisKel" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>

                            <div class="col-md-4">
                                <select id="jenisKel" name="jenisKel" class="form-control{{ $errors->has('jenisKel') ? ' is-invalid' : '' }}" value="{{ $user->jenisKel }}" required autofocus>
                                    <option selected='selected'> </option>
                                    <option value='Laki-laki'>Laki-laki</option>
                                    <option value='Perempuan'>Perempuan</option>
                                </select>
                                @if ($errors->has('jenisKel'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jenisKel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Lengkap') }}</label>

                            <div class="col-md-6">
                                <input id="alamat" type="alamat" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" value="{{ $user->alamat }}" required>

                                @if ($errors->has('alamat'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telp" class="col-md-4 col-form-label text-md-right">{{ __('Telp/Handphone') }}</label>

                            <div class="col-md-4">
                                <input id="telp" type="text" class="form-control{{ $errors->has('telp') ? ' is-invalid' : '' }}" name="telp" value="{{ $user->telp }}" required autofocus>

                                @if ($errors->has('telp'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="agama" class="col-md-4 col-form-label text-md-right">{{ __('Agama') }}</label>

                            <div class="col-md-4">
                                <select  id="agama" name='agama' class="form-control{{ $errors->has('agama') ? ' is-invalid' : '' }}" value="{{ $user->agama }}" required autofocus>
                                    <option selected='selected'> </option>
                                    <option value='Islam' >Islam</option>
                                    <option value='Kristen'>Kristen</option>
                                    <option value='Katholik'>Katholik</option>
                                    <option value='Hindu'>Hindu</option>
                                    <option value='Budha'>Budha</option>
                                </select>
                                @if ($errors->has('agama'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('agama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="asalSekolah" class="col-md-4 col-form-label text-md-right">{{ __('Asal Sekolah') }}</label>

                            <div class="col-md-4">
                                <input id="asalSekolah" type="text" class="form-control{{ $errors->has('asalSekolah') ? ' is-invalid' : '' }}" name="asalSekolah" value="{{ $user->asalSekolah }}" required autofocus>

                                @if ($errors->has('asalSekolah'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('asalSekolah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jurusan" class="col-md-4 col-form-label text-md-right">{{ __('Jurusan yang dipilih') }}</label>

                            <div class="col-md-4">
                                <select  id="jurusan" name="jurusan" class="form-control{{ $errors->has('jurusan') ? ' is-invalid' : '' }}" value="{{ $user->jurusan}}" required autofocus >
                                    <option selected='selected'> </option>
                                    <option value='IPA' >IPA</option>
                                    <option value='IPS'>IPS</option>
                                    <option value='BAHASA'>BAHASA</option>
                                </select>
                                @if ($errors->has('jurusan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jurusan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="url_foto" class="col-md-4 col-form-label text-md-right">{{ __('Upload Foto') }}</label>
                            <div class="col-md-7">
                                <input id="url_foto" type="file" class="form-control{{ $errors->has('url_foto') ? ' is-invalid' : '' }}" name="url_foto" value="{{ $user->url_foto }}" required autofocus>

                                @if ($errors->has('url_foto'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('url_foto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="nama_ayah" class="col-md-4 col-form-label text-md-right">{{ __('Nama Ayah') }}</label>

                            <div class="col-md-6">
                                <input id="nama_ayah" type="text" class="form-control{{ $errors->has('nama_ayah') ? ' is-invalid' : '' }}" name="nama_ayah" value="{{ $user->nama_ayah }}" required autofocus>

                                @if ($errors->has('nama_ayah'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_ayah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pekerjaan_ayah" class="col-md-4 col-form-label text-md-right">{{ __('Pekerjaan Ayah') }}</label>

                            <div class="col-md-6">
                                <input id="pekerjaan_ayah" type="text" class="form-control{{ $errors->has('pekerjaan_ayah') ? ' is-invalid' : '' }}" name="pekerjaan_ayah" value="{{ $user->pekerjaan_ayah }}" required autofocus>

                                @if ($errors->has('pekerjaan_ayah'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pekerjaan_ayah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pendidikan_ayah" class="col-md-4 col-form-label text-md-right">{{ __('Riwayat Pendidikan Ayah') }}</label>

                            <div class="col-md-6">
                                <input id="pendidikan_ayah" type="text" class="form-control{{ $errors->has('pendidikan_ayah') ? ' is-invalid' : '' }}" name="pendidikan_ayah" value="{{ $user->pendidikan_ayah}}" required autofocus>

                                @if ($errors->has('pendidikan_ayah'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pendidikan_ayah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama_ibu" class="col-md-4 col-form-label text-md-right">{{ __('Nama Ibu') }}</label>

                            <div class="col-md-6">
                                <input id="nama_ibu" type="text" class="form-control{{ $errors->has('nama_ibu') ? ' is-invalid' : '' }}" name="nama_ibu" value="{{ $user->nama_ibu }}" required autofocus>

                                @if ($errors->has('nama_ibu'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_ibu') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pekerjaan_ibu" class="col-md-4 col-form-label text-md-right">{{ __('Pekerjaan Ibu') }}</label>

                            <div class="col-md-6">
                                <input id="pekerjaan_ibu" type="text" class="form-control{{ $errors->has('pekerjaan_ibu') ? ' is-invalid' : '' }}" name="pekerjaan_ibu" value="{{ $user->pekerjaan_ibu }}" required autofocus>

                                @if ($errors->has('pekerjaan_ibu'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pekerjaan_ibu') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pendidikan_ibu" class="col-md-4 col-form-label text-md-right">{{ __('Riwayat Pendidikan Ibu') }}</label>

                            <div class="col-md-6">
                                <input id="pendidikan_ibu" type="text" class="form-control{{ $errors->has('pendidikan_ibu') ? ' is-invalid' : '' }}" name="pendidikan_ibu" value="{{ $user->pendidikan_ibu }}" required autofocus>

                                @if ($errors->has('pendidikan_ibu'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pendidikan_ibu') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Simpan perubahan') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection