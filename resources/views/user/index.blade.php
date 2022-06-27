@extends('layouts.daftar')

@section('content')
<br><br>
<br><br>
    <div class="container" data-aos="fade-up" data-aos-delay="200">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('Dashboard') }}</div>

                    <div class="card-body  bg-light">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <br>
                        <h5>Welcome, You are user!</h5>
                        <br>
                        
                        <table class="table table-responsive">
                            <tr>
                                <th>Username</th>
                                <th>:</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th>:</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <th>:</th>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                        </table>
                        <br>

                        @if(count($user->all()) > 0)
                            <div class="col-lg-12 margin-tb">
                                <div class="float-right my-2">
                                    &nbsp;
                                    &nbsp;
                                    <a class="btn btn-success" href="{{ route('show') }}">Lihat Formku</a>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-12 margin-tb">
                                <div class="float-right my-2">
                                    &nbsp;
                                    &nbsp;
                                    <a class="btn btn-success" href="{{ route('daftar') }}">Registrasi</a>
                                </div>
                            </div>
                        @endif
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
