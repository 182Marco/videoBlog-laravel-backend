@extends('layouts.app') @section('content')
<div class="container d-flex align-items-center mt-5">
    <h1 class="d-inline-block"><strong>Phone number:</strong> {{$number->number}}</h1>
    <a class="ml-5 btn btn-warning" href="{{route('editPhone')}}">edit</a>
</div>
@endsection