@extends('layouts.perpus')
@section( 'content')

<table class="table table-bordered mx-auto min-w-full border rounded-md overflow-hidden">
    <thead class="bg-primary text-white">
    <tr>
        <th class="py-2 px-4">ID</th>
        <th class="py-2 px-4">NAMA</th>
        <th class="py-2 px-4">EMAIL</th>
        {{-- <th class="py-2 px-4">ROLE</th> --}}
 
      
    </tr>
</thead>
<tbody>
    @foreach ($user as $u)
        <tr class="hover:bg-gray-50">

            <td class="py-2 px-4">{{ $u->id }}</td>
            <td class="py-2 px-4">{{ $u->name }}</td>
            <td class="py-2 px-4">{{ $u->email }}</td>
          
            
            
 
           
            
    @endforeach
</tbody>
</table>


@endsection