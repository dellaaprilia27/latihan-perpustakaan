@extends('layouts.perpus')

@section('content')

<a class="btn btn-primary" href="{{route('kategori.create')}}">Tambah Data Kategori</a>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
        </a>
        </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
    
                    <table class="table-auto w-full border-collapse border border-gray-400">
                        <thead class="bg-primary text-white">
                            <tr>
                            <th class="px-4 py-2">Nama Kategori</th>
                            <th class="col-1 px-4 py-2">Aksi</th>
                        </tr></thead>
                            @foreach($kategori as $k)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-2 px-4">{{ $k->nama_kategori}}</td>

                                    <td class="py-2 px-4 col-4">
                                        <form method="post" action="{{route('kategori.destroy',$k->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"> Hapus</button>
                                            
                                            <a class="btn btn-warning" href="{{route('kategori.edit', $k->id)}}">Edit</a>
                                        </form>
                                    </td>
                               
                            @endforeach
                        </th>
                    </table>
                </div>
            
        </div>
    </div>
</div>
@endsection
