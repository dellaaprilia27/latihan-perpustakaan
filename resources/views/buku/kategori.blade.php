@extends('layouts.perpus')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <th>
                            <td>Nama Kategori</td>
                            @foreach($kategori as $k)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-2 px-4">{{ $k->nama_kategori}}</td>
                                </tr>
                            @endforeach
                        </th>
                    </table>
                </div>
            
        </div>
    </div>
</div>
@endsection
