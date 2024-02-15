@extends('layouts.perpus')

@section('content')
<a class="btn btn-danger" href="{{route('buku.create')}}">Tambah Data</a>
<table class="mx-auto min-w-full border rounded-md overflow-hidden">
    <thead class="bg-gray-100">
        <tr>
            <th class="py-2 px-4">Judul</th>
            <th class="py-2 px-4">Penulis</th>
            <th class="py-2 px-4">Penerbit</th>
            <th class="py-2 px-4">Tahun</th>
            <th class="py-2 px-4">Kategori</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($buku as $b)
            <tr class="hover:bg-gray-50">
                <td class="py-2 px-4">{{ $b->judul }}</td>
                <td class="py-2 px-4">{{ $b->penulis }}</td>
                <td class="py-2 px-4">{{ $b->penerbit }}</td>
                <td class="py-2 px-4">{{ $b->tahun_terbit }}</td>
                <td class="py-2 px-4">
                    @foreach ($b->kategoribukurelasi as $kategoribuku)
                        @if ($kategoribuku->kategori)
                            {{ $kategoribuku->kategori->nama_kategori }}<br>
                        @endif
                    @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection