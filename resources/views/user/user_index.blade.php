@extends('layouts.perpus')
@section( 'content')
<a class="btn btn-primary" href="{{route('user.create')}}">Tambah Pengguna</a>
<table class="table table-bordered mx-auto min-w-full border rounded-md overflow-hidden">
    <thead class="bg-primary text-white">
    <tr>
        <th class="py-2 px-4">Id</th>
        <th class="py-2 px-4">Nama</th>
        <th class="py-2 px-4">Email</th>
        <th class="py-2 px-4">Role</th>
        <th class="py-2 px-4">Aksi</th>
        {{-- <th class="py-2 px-4">ROLE</th> --}}
 
      
    </tr>
</thead>
<tbody>
    @foreach ($user as $u)
        <tr class="hover:bg-gray-50">

            <td class="py-2 px-4">{{ $u->id }}</td>
            <td class="py-2 px-4">{{ $u->name }}</td>
            <td class="py-2 px-4">{{ $u->email }}</td>
            <td>

            @foreach($u->roles as $role)
                {{$role->name}}
            @endforeach
            </td>
    
                <td class="py-2 px-4">
                    <form method="post" action="{{route('user.destroy',$u->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                <a class="btn btn-warning" href="{{ route('user.edit', $u->id)}}">Edit</a>     
                    </form>
    @endforeach
</tbody>
</table>


@endsection