@extends('master')
@section('title',"login test")
@section('main')
<link rel="stylesheet" href="/backend/css/bootstrap.min.css">
<h1>Form login</h1>
{{-- @if ($errors->any())
    @foreach($errors->all() as $error)
        {{$error}}<br>
    @endforeach --}}
    {{-- {{$errors}} --}}
    {{-- {{"abc"}} --}}
{{-- @endif --}}
{{-- <ul>
    @foreach ($tests as $item)
        <li>{{$item->name}}</li>
    @endforeach
</ul>
{{$tests->links("pagination::bootstrap-4")}}
<form action="" method="post">
    <input type="text" name="email" value="{{old('email')}}"/>
    <input type="text" name="password" value="{{old('password')}}" id="">
    <button type="submit">Login</button>
    @csrf
</form>
@endsection --}}

{{-- <h1>{{vietproHelper()}}</h1> --}}

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="fileupload"/>
    <input type="submit" name="sbm" value="Upload"/>
    {{csrf_field()}}
</form>
