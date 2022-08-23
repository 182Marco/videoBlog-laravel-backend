@extends('layouts.app')
@section('content')
  <div class="container show">
    <h1>{{ $video->title }}</h1>
    <main>
      <div 
      class="frame-box 
      {{$video->aspect_ratio == "1:1" ? 'square' : null}}
      {{$video->aspect_ratio == "9:16" ? 'vertical' : null}}
      {{$video->aspect_ratio == "4:5" ? 'vertical-short' : null}}
      "
      >
        <iframe src="{{$video->url}}" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="ml-3">
        <h4>Credits:</h4>
        <p class="mb-4">@if($video->credits){!! $video->credits !!}@else <em>You've not recorded "credits" for this video</em>@endif</p>
        @if($video->category)
          <h4>Categoria:</h4>
          <p class="mb-4">{{$video->category->name}}</p>
        @endif
        <h4>Aspect ratio:</h4>
        <p class="mb-4">{{$video->aspect_ratio}}</p>
        <h4>Inserito a data base:</h4>
        <p class="mb-4">{{ $video->created_at }}</p>
        <h4>Ultima modifica a data base:</h4>
        <p class="mb-4">{{ $video->updated_at }}</p>
      </div>
   </main>
    <section class="mb-3">
      <a class="text-primary mr-3" href="{{route('edit', $video->slug)}}">
        <i class="fa-solid fa-pencil"></i>
      </a>
      <form class="delete-form" action="{{ route('delete', $video->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" value="DELETE"><i class="fa fa-trash" aria-hidden="true"></i></button>
      </form>
   </section>
    <a href="{{ route('home')}}" class="btn btn-success">torna all'indice</a>
  </div>
@endsection