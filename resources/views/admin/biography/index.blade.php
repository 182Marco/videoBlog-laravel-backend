@extends('layouts.app') @section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1><strong>English Biography:</strong></h1>
        <a class="btn btn-warning" href="{{route('editBio')}}">edit</a>
    </div>
    <p>{{$bio->en}}</p>
    <h1><strong>Biografia in Italiano:</strong></h1>
    <p>{{$bio->ita}}</p>
</div>
@endsection