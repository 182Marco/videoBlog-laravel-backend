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
            <label for="url" class="form-label">url</label>
            <input
                type="text"
                id="url"
                class="form-control"
                name="url"
                value="{{$video->url}}"
            />
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">titolo</label>
            <input
                type="text"
                id="title"
                class="form-control"
                name="title"
                value="{{$video->title}}"
            />
        </div>
        <div class="mb-3">
            <label for="credits" class="form-label">credits</label>
            <textarea
                type="text"
                id="credits"
                class="form-control"
                name="credits"
                rows="6"
            >{{$video->credits}}
            </textarea>
        </div>
        <button type="submit">
            <span class="btn btn-success">
                salva
            </span>
        </button>
    </form>
</div>
@endsection
