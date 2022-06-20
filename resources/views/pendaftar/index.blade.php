@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('pendaftar.create') }}">Registrasi</a>
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('cetak_form,  $pendaftar->user_id') }}">Cetak Formulir</a>
            </div>
        </div>
    </div>
@endsection