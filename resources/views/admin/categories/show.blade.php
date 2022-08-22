@extends('layouts.app')
@section('content')
  <div class="container show category">
    <h1>{{ $category->name }}</h1>
    <main>
        <h4>Inserito a data base:</h4>
        <p class="mb-4">{{ $category->created_at }}</p>
        <h4>Ultima modifica a data base:</h4>
        <p class="mb-4">{{ $category->updated_at }}</p>
   </main>
    <section class="mb-3">
      <a class="text-primary mr-3" href="{{route('editCategory', $category->slug)}}">
        <i class="fa-solid fa-pencil"></i>
      </a>
      <form class="delete-form" action="{{ route('deleteCategory', $category->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" value="DELETE"><i class="fa fa-trash" aria-hidden="true"></i></button>
      </form>
   </section>
   <h4 class="mb-3">Videos</h4>
   <div class="videos">
   @forelse ($category->videos as $video)
        <div class="video-box">
            <div class="videoframe">
              <iframe src="{{$video->url}}" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
            </div>
            <section>
                <p>
                {{ $video->title }}
                </p>
                <footer>
                <a class="text-success" href="{{ route('show', $video->slug)}}">
                    <i class="fa-solid fa-eye"></i>
                </a>
                <a class="text-primary mx-3" href="{{route('edit', $video->slug)}}">
                    <i class="fa-solid fa-pencil"></i>
                </a>          
                </a>
                <form class="delete-form" action="{{ route('delete', $video->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" value="DELETE"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
                </footer>      
            </section>
        </div>
    @empty
    <p>No videos for this category</p>         
    @endforelse
    </div>
    <a href="{{ route('categories')}}" class="btn btn-success">torna all'indice</a>
  </div>
@endsection