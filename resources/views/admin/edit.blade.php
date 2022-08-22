@extends('layouts.app') @section('content')
<div class="create">
    <h1>
        Modifica i dati del video: "{{ Str::limit($video->title, 10, $end='...') }}" a data base
        <a class="text-success ml-3" href="{{ route('show', $video->slug)}}">
            <i class="fa-solid fa-eye"></i>
        </a>
    </h1>
    <form action="{{ route('update', $video->id)}}" method="POST">
        @csrf 
        @method('PATCH')
        <div class="mb-3">
            <label for="url" class="form-label">Url</label>
            <input
                type="text"
                id="url"
                class="form-control @error('url') is-invalid @enderror"
                name="url"
                @if(old('url')) 
                  value="{{old('url')}}" 
                @else 
                  value="{{$video->url}}"
                @endif             
            />
            @error('url')
              <div class="feedback text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input
                type="text"
                id="title"
                class="form-control @error('title') is-invalid @enderror"
                name="title"
                @if(old('title')) 
                  value="{{old('title')}}" 
                @else 
                  value="{{$video->title}}"
                @endif             
            />
            @error('title')
              <div class="feedback text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="credits" class="form-label">Credits</label>
            <textarea
                type="text"
                id="credits"
                class="form-control"
                name="credits"
                rows="6"
            >{{$video->credits}}
            </textarea>
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
                    @if($category->id == old('category_id', $video->category_id))selected @endif
                >
                  {{$category->name}}
                </option>
                @endforEach
            </select>
        </div>    
        <div class="mb-3">
            <label for="credits" class="form-label">Aspect ratio</label>
            <select 
               name="aspect_ratio" 
               id="aspect_ratio_id" 
               class="form-control @error('aspect_ratio') is-invalid @enderror"
            >
                @forEach($aspect_ratio_formats as $format)
                 <option 
                    value="{{$format}}"
                    @if($format == old('aspect_ratio', $video->aspect_ratio))selected @endif
                >
                  {{$format}}
                </option>
                @endforEach
            </select>
        </div>    
        <button type="submit">
            <span class="btn btn-success">
                salva
            </span>
        </button>
    </form>
</div>
@endsection
