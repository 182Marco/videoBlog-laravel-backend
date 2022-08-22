@extends('layouts.app')
@section('content')
  <div class="container show">
    <h1>{{ $video->title }}</h1>
    <main>
      <iframe src="{{ $video->url}}" frameborder="0"></iframe>
      <div>
        <h4>Credits:</h4>
        <p class="mb-4">{!! $video->credits !!}</p>
        @if($video->category)
          <h4>Categoria:</h4>
          <p class="mb-4">{{$video->category->name}}</p>
        @endif
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