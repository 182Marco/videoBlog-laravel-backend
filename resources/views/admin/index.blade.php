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
      <h1>Video in Data Base</h1>
      <a href="{{ route('create')}}">
        <span class="add-new">
            <i class="fa-solid fa-plus"></i>
        </span>
      </a>
    </header>
    <div class="all-videos">
        @forEach($videos as $video)
        <div class="video-box">
            <iframe src="{{$video->url}}" frameborder="0"></iframe>
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
        @endforEach
    </div>
    {{ $videos->links() }}
</div>
@endsection