@extends('layouts.perpus')

@section('content')

<a class="btn btn-primary" href="{{route('buku.create')}}">Tambah Data Buku</a>
<table class="table-auto w-full border-collapse border border-gray-400">
    <thead class="bg-primary text-white">
        <tr>
            <th class="py-2 px-4">Foto</th>
            <th class="py-2 px-4">Judul</th>
            <th class="py-2 px-4">Penulis</th>
            <th class="py-2 px-4">Penerbit</th>
            <th class="py-2 px-4">Tahun Terbit</th>
            <th class="py-2 px-4">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($buku as $b)
            <tr class="hover:bg-gray-50">
                <td>
                    <img src="{{ asset('storage/'.$b->foto) }}" alt="Foto Buku" width="100">
                </td>       
                <td class="py-2 px-4">{{ $b->judul }}</td>
                <td class="py-2 px-4">{{ $b->penulis }}</td>
                <td class="py-2 px-4">{{ $b->penerbit }}</td>
                <td class="py-2 px-4">{{ $b->tahun_terbit }}</td>
     
                <td class="py-2 px-4">
                    <form method="post" action="{{route('buku.destroy',$b->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        <a class="btn btn-warning" href="{{route('buku.edit', $b->id)}}">Edit</a>
                    </form>
                </td>
                
        @endforeach
    </tbody>
</table>
@endsection