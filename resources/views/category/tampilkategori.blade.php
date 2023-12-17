@extends('layouts.master')

@section('judul')
    Daftar Kategori
@endsection

@section('content')
<a href="/category/create" class="btn btn-sm btn-primary my-3">Tambah Kategori</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Nomor</th>
            <th scope="col">Nama Kategori</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($category as $key=>$item)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$item->name}}</td>
            <td>
                <form action="/category/{{$item->id}}" method="post">
                    @csrf
                    @method('delete')
                    <a href="/category/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
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