

@extends('layouts.app') @section('content')
<div class="container d-flex align-items-center mt-5">
  <form 
  action="{{ route('updatePhone')}}"
  method="POST"
  class="w-100"
  >
  @csrf 
  @method('PATCH')
    <input
      type="text"
      name='number' 
      class="form-control w-100 @error('number') is-invalid @enderror"
      @if(old('number')) 
      value="{{old('number')}}" 
      @else 
      value="{{$number->number}}" 
      @endif             
    />
    @error('number')
    <div class="feedback text-danger">{{$message}}</div>
    @enderror
    <input type="submit" class="btn btn-success mt-3" value="fatto" >
  </form>
</div>
@endsection


