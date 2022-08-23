@extends('layouts.app') 
@section('content')
<div class="container index">
        {{-- Session Deleted --}}
        <div class="alert-box">
            @if (session('deleted'))
            <div class="alert alert-success">
                <strong>{{ session('deleted') }}</strong>
                {{ session('deleted') }} cancellato!
            </div>
            @endif
        </div>
        {{--  --}}
    <header>
      <h1 class="mb-3">Video in Data Base</h1>
      <a href="{{ route('create')}}">
        <span class="add-new">
            <i class="fa-solid fa-plus"></i>
        </span>
      </a>
    </header>
    <form  class="form-inline"  action="{{route('home')}}" method="GET">
        <input type="text" name="search" class="form-control mb-3 mr-3" placeholder="cerca un video">
        <button type="submit" class="btn btn-primary mb-3">Cerca</button>
    </form>
    <div class="mt-5">
      @if (!$search)
      @forEach($categories as $category)
      <section>
        <h3>{{$category->name}}</h3>
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
                  {{ $video->title }} <em>({{$video->aspect_ratio}})</em>
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
      </section>
      @endforEach  
      @endif
    </div>

    @if(!$search)
    @forEach($videos as $video)@if (!$video->category_id)<h3>Uncategorized</h3>@endif @break @endforEach
    <div class="videos">
    @forEach($videos as $video)
      @if(!$video->category)
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
            </div>
        </div>     
      @endif
    @endforEach
    </div>
    @endif

    @if($search)
      <h3 class="mt-5">Searched Videos:</h3>
    <div class="videos">
    @forelse($videos as $video)
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
              {{ $video->title }}
            </p>
            <p><strong>@if($video->category){{$video->category->name}}@else Uncategorized @endif</strong></p>
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
      <p>No results for this search</p>
    @endforelse
  </div>   
  @endif  
</div>
@endsection