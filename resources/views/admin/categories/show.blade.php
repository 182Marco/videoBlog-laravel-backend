@extends('layouts.app')
@section('content')
  <div class="container show category">
    <h1>{{ $category->name }}</h1>
    <div class="row">
      <div class="col-lg-6 col-sm-12">
        <img class="w-100 mb-4" src="{{asset('/storage/' . $category->img)}}" alt="{{$category->name}}">
      </div>
      <div class="col-lg-6 col-sm-12">
       <main>
          <h4>Nome nei links:</h4>
          <p class="mb-5">{{ $category->slug}}</p>
          <h4>Inserito a data base:</h4>
          <p class="mb-5">{{ $category->created_at }}</p>
          <h4>Ultima modifica a data base:</h4>
          <p class="mb-5">{{ $category->updated_at }}</p>
        </main>
      </div>
  </div>
    <section class="btns-box">
      <a class="text-primary mr-3" href="{{route('editCategory', $category->slug)}}">
        <i class="fa-solid fa-pencil"></i>
      </a>
      <form class="delete-form" action="{{ route('deleteCategory', $category->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" value="DELETE"><i class="fa fa-trash" aria-hidden="true"></i></button>
      </form>
   </section>
   <h4 class="mb-3">Related videos</h4>
   <div class="videos">
   @forelse ($category->videos as $video)
            <div class="video-box">
              <div 
              class="frame-box 
              {{$video->aspect_ratio == "1:1" ? 'square' : null}}
              {{$video->aspect_ratio == "9:16" ? 'vertical' : null}}
              {{$video->aspect_ratio == "4:5" ? 'vertical-short' : null}}
              "
              >
                <iframe src="{{$video->url}}" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="video-texts">
                <p>
                {{ $video->title }}({{$video->aspect_ratio}})
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
              </div>
        </div>
    @empty
    <p>No videos for this category</p>         
    @endforelse
    </div>
    <a href="{{ route('categories')}}" class="btn btn-success">torna all'indice</a>
  </div>
@endsection