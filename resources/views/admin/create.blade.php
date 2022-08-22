@extends('layouts.app')
@section('content')
  <div class="create">
    <h1>Inserisci un nuovo video a data base</h1>
    <form action="{{ route('store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label for="url" class="form-label">Url</label>
            <input 
               type="text" 
               id="url" 
               name="url"
               class="form-control @error('url') is-invalid @enderror" 
               value="{{old('url')}}"
            >
            @error('url')
              <div class="feedback text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input 
               type="text" 
               id="title" 
               name="title"
               value="{{old('title')}}"
               class="form-control @error('title') is-invalid @enderror" 
            >
            @error('title')
              <div class="feedback text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="credits" class="form-label">Credits</label>
            <textarea type="text" id="credits" class="form-control" name="credits" rows="6">{{old('credits')}}</textarea>
        </div>
        <div class="mb-3">
            <label for="credits" class="form-label">Category</label>
            <select 
               name="category_id" 
               id="category_id" 
               class="form-control @error('category_id') is-invalid @enderror"
            >
                <option value="">-- Select Category --</option>
                @forEach($categories as $category)
                 <option 
                    value="{{$category->id}}"
                    @if($category->id == old($category->id)) selected @endif
                >{{$category->name}}</option>
                @endforEach
            </select>
            @error('category_id')
                <div class="feedback text-danger">{{$message}}</div>
            @enderror
        </div>
        <button type="submit">
            <span class="add-new">
                <i class="fa-solid fa-plus"></i>
            </span>
        </button>
    </form>
  </div>
@endsection