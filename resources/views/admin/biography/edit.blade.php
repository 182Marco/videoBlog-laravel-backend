
@extends('layouts.app') @section('content')
<div class="container d-flex align-items-center">
  <form 
  action="{{ route('updateBio')}}"
  method="POST"
  class="w-100"
  >
  @csrf 
  @method('PATCH')
  <div class="d-flex justify-content-between align-items-center mt-0 mb-1">
    <h1 class="d-inline-block"><strong>English Biography:</strong></h1>
    <input type="submit" class="btn btn-success mt-3" value="fatto" >
  </div>
    <textarea 
      name="en" 
      rows="13"
      class="form-control px-0 py-2 @error('en') is-invalid @enderror"
    >
      {{$bio->en}}
    </textarea>
    @error('en')
    <div class="feedback text-danger">{{$message}}</div>
    @enderror
    <h1 class="d-inline-block mb-1"><strong>Biografia in italiano:</strong></h1>
    <textarea 
      name="ita" 
      rows="13"
      class="form-control px-0 py-2 @error('en') is-invalid @enderror"
    >
      {{$bio->ita}}
    </textarea>
    @error('it')
    <div class="feedback text-danger">{{$message}}</div>
    @enderror
  </form>
</div>
@endsection