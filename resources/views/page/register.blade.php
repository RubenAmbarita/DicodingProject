@extends('layouts.master')

@section('judul')
    Register User
@endsection

@section('content')
    <form action="/home" method="post">
        @csrf
        <label for="">Nama Depan</label> <br>
        <input type="text" name="fname"> <br><br>
        <label for="">Nama Belakang</label> <br>
        <input type="text" name="lname"> <br><br>
        <label for="">Username</label> <br>
        <input type="text" name="uname"> <br><br>
        
        <input type="submit" value="kirim"> <br><br>
    </form>
@endsection