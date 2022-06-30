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
                        <h5>Congratulations , You're Students</h5>
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
                                <th>Status</th>
                                <td>:</td>
                                <td><strong>DITERIMA</strong></td>
                            </tr>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
