@extends('layouts.master')

@section('judul')
    Donasi Buku
@endsection

@section('content')
<a href="/donasibuku/create" class="btn btn-sm btn-primary my-3">Donasikan Buku</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Foto Buku</th>
            <th scope="col">Judul Buku</th>
            <th scope="col">Pengarang</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($donasi as $key=>$item)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$item->namaBuku}}</td>
            <td><img src="{{asset('/images/'.$item->fotoBuku)}}" alt=""></td>
            <td>{{$item->pengarang}}</td>
            <td>{{$item->jumlahBuku}}</td>
            <td>
                <form action="/donasibuku/{{$item->id}}" method="post">
                    @csrf
                    @method('delete')
                    <a href="/donasibuku/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                </form>
            </td>
        </tr>
            
        @empty
            <tr>
                <td>Tidak Ada Kategori</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection