@extends('layouts.master')

@section('judul')
    Tambah Donasi Buku
@endsection

@section('content')
<form method="post" action="/donasibuku" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label>User ID</label>
      <input type="text" name="user_id" value="{{Auth::user()->id}}" disabled>
    </div>

    <div class="mb-3">
      <label>Judul Buku</label>
      <input type="text" name="namaBuku" class="form-control @error('namaBuku') is-invalid @enderror">
    </div>
    @error('namaBuku')
        <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <div class="mb-3">
        <label>Pengarang</label>
        <input type="text" name="pengarang" class="form-control @error('pengarang') is-invalid @enderror">
      </div>
    @error('pengarang')
        <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <div class="mb-3">
        <label>Kategori</label>
        <select name="category_id" class="form-control" id="">
            <option value="">--Pilih Kategori--</option>
            @forelse ($category as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @empty
                <option value="">Tidak Ada Kategori</option>
            @endforelse
        </select>
      </div>
      @error('category_id')
          <div class="alert alert-danger">{{$message}}</div>
      @enderror
    
    <div class="mb-3">
        <label>Jumlah Buku</label>
        <input type="number" name="jumlahBuku" class="form-control @error('jumlahBuku') is-invalid @enderror">
      </div>
    @error('jumlahBuku')
        <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <div class="mb-3">
        <label>Upload Foto Buku</label>
        <input type="file" name="fotoBuku" class="form-control @error('fotoBuku') is-invalid @enderror">
      </div>
    @error('fotoBuku')
        <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
