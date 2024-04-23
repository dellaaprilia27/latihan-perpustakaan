@extends('layouts.perpus')

@section('content')
<div class="py-12">
   
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

                <div class="mb-4 d-flex justify-content-between">
                    <a class="btn btn-primary" href="{{route('peminjaman.tambah')}}">Tambah Data Peminjaman</a>
                    <a href="{{route('print')}}" class="btn btn-success">
                        <i class="fa fa-download"></i> Ekspor PDF </a>
                   
                    </a>
                </div>

                <table class="table-auto w-full border-collapse border border-gray-400">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="px-4 py-2 border">Nama Peminjam</th>
                            <th class="px-4 py-2 border">Buku yang Dipinjam</th>
                            <th class="px-4 py-2 border">Tanggal Peminjaman</th>
                            <th class="px-4 py-2 border">Tanggal Pengembalian</th>
                            <th class="px-4 py-2 border">Denda</th>
                            <th class="px-4 py-2 border">Status</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($peminjaman as $p)
                            <tr>
                                <td class="px-4 py-2 border">{{ $p->user->name }}</td>
                                <td class="px-4 py-2 border">{{ $p->buku->judul }}</td>
                                <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($p->tanggal_peminjaman)->format('d-M-Y') }}</td>
                                <td class="px-4 py-2 border">{{ $p->tanggal_pengembalian ? \Carbon\Carbon::parse($p->tanggal_pengembalian)->format('d-M-Y') : 'Belum di kembalikan'}}</td>
                                <td class="px-4 py-2 border">{{ $p->denda ? \Carbon\Carbon::parse($p->denda)->format('d-M-Y') : ''}}</td>


                                <td class="px-4 py-2 border">
                                    @if($p->status === 'Dipinjam')
                                        <span class="badge bg-warning">{{ $p->status }}</span>
                                    @elseif($p->status === 'Dikembalikan')
                                        <span class="badge bg-primary">{{ $p->status }}</span>
                                        @elseif($p->status === 'Denda')
                                        <span class="badge bg-danger">{{ $p->status }}</span>
                                        @endif
                                </td>
                                <td class="px-4 py-2 border">
                                    @if($p->status === 'Dipinjam')
                                        <form action="{{ route('peminjaman.kembalikan', $p->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">
                                                Kembalikan
                                            </button>
                                            @elseif($p->status === 'Denda')
                                            <a href="{{route('peminjaman.denda',$p->id)}}" class="btn btn-danger">
                                                Bayar Denda
                                            </a>
                                            @else($p->status === 'Dikembalikan') </form>
                                            -
                                    @endif
                                       
                                    
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-2 border text-center">Tidak ada data buku.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection