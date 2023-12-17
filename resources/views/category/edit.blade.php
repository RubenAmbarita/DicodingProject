@extends('layouts.master')

@section('judul')
    Edit Kategori
@endsection

@section('content')
<form method="post" action="/category/{{$categoryData->id}}">
    @csrf
    @method('put')
    <div class="mb-3">
      <label>Nama Kategori</label>
      <input type="text" name="name" value="{{$categoryData->name}}" class="form-control @error('name') is-invalid @enderror">
    </div>
    @error('name')
        <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
