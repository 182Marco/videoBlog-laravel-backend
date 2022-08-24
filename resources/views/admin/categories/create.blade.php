@extends('layouts.app')
@section('content')
  <div class="create">
    <h1>Create a new category record in data base</h1>
    <form action="{{ route('storeCategory')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input 
               type="text" 
               id="name" 
               name="name"
               class="form-control @error('name') is-invalid @enderror" 
               value="{{old('name')}}"
            >
            @error('name')
              <div class="feedback text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
          <label for="img" class="form-label">Category Image</label><br>
          <input type="file" name="img" >
          @error('img')<div class="feedback text-danger">{{$message}}</div>@enderror
        </div>
        <button type="submit">
            <span class="add-new">
                <i class="fa-solid fa-plus"></i>
            </span>
        </button>
    </form>
  </div>
@endsection