@extends('admin.layout')

@section('content')
 <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>TAMPILAN DATA AKUN USER</h2>
        </div>
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{ route('create') }}"> Input Akun</a>
        </div>
    </div>
 </div>

 <form class="form" method="get" action="{{ route('search') }}">
    <div class="form-group w-100 mb-3">
        <label for="search" class="d-block mr-2">Search Form</label>
        <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Search your data...">
        <button type="submit" class="btn btn-primary mb-1">Cari</button>
    </div>
 </form>

 @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
 @endif

 <table class="table table-bordered">
    <tr>
        <th>Username</th>
        <th>Nama</th>
        <th>Email</th>

    </tr>
    @foreach ($user as $us)
        <tr>
            <td>{{ $us ->username }}</td>
            <td>{{ $us ->name }}</td>
            <td>{{ $us ->email }}</td>
            <td>
            <form action="{{ route('destroy',['user'=>$us->id]) }}" method="GET">

                <a class="btn btn-info" href="{{ route('show',$us->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('edit',$us->id) }}">Edit</a>
                
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" >Delete</button>
            </form>
            </td>
        </tr>
    @endforeach
 </table>
        Halaman : {{ $user->currentPage() }} <br/>
        Jumlah Data : {{ $user->total() }} <br/>
        Data Per Halaman : {{ $user->perPage() }} <br/>
        <br>{{ $user->links() }}</br>
 @endsection

