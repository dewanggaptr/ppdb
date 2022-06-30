@extends('admin.layout')
<br><br>
<br><br>
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Status
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('admin.status', $akun->id) }}" id="myForm"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="username"><Strong>Status</Strong></label>
                        <div class="col-md-4">
                            <select id="role" name='role' class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }} "value="{{ $akun->role }}" required autofocus>
                                {{-- <option selected='selected'> </option> --}}
                                <option value='User'>Tidak Diterima</option>
                                <option value='Siswa'>Terima</option>
                            </select>
                            @if ($errors->has('role'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $akun->first('role') }}</strong>
                            </span>
                            @endif
                            {{-- <input type="username" name="username" class="form-control" id="username"
                                value="{{ $akun->role }}" ariadescribedby="username"> --}}
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection