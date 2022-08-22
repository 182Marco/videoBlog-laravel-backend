@extends('layouts.app') @section('content')
<div class="create">
    <h1>
        Update category data: "{{ Str::limit($category->name, 10, $end='...') }}" a data base
        <a class="text-success ml-3" href="{{ route('showCategory', $category->slug)}}">
            <i class="fa-solid fa-eye"></i>
        </a>
    </h1>
    <form action="{{ route('updateCategory', $category->id)}}" method="POST">
        @csrf 
        @method('PATCH')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
                type="text"
                id="name"
                class="form-control @error('name') is-invalid @enderror"
                name="name"
                @if(old('name')) 
                value="{{old('name')}}" 
              @else 
                value="{{$category->name}}"
              @endif          
            />
            @error('name')
              <div class="feedback text-danger">{{$message}}</div>
            @enderror
        </div>
        <button type="submit">
            <span class="btn btn-success">
                salva
            </span>
        </button>
    </form>
</div>
@endsection