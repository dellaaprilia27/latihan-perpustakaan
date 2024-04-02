@extends('layouts.perpus')
@section( 'content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <h2 class="card-ttle mb-4">Tambah Pengguna Baru</h2>
                    <form action="{{ route('user.store')}}" method="POST">
                        @csrf
                    
                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Role:</label>
                        <select class="form-control" id="role" name="role[]" multiple required>
                    </div>

                    @foreach($role as $role)
                    <option value="{{$role->name}}">{{$role->name}}</option>
                    @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary"> Simpan</button>
                <a href="{{ route('user.index')}}" class="btn btn-primary">Kembali</a>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
