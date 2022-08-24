@extends('layouts.app') 
@section('content')
<div class="container">

    {{-- Session Deleted --}}
    @if (session('deleted'))
        <div class="alert alert-success">
            <strong>{{ session('deleted') }}</strong>
            Category deleted!
        </div>
    @endif

    <h2 class="my-3 font-weight-bold">All the categories</h2>

    <!--Create-->
    <a class="mb-5 btn btn-success font-weight-bold" href="{{ route('createCategory')}}">Create</a>
    <div class="table-responsive">
        <table class="table"> 
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Immagine</th>
                    <th>Nome nei links</th>
                    <th colspan="3">Buttons</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)              
                <tr>
                    
                    <td>{{ $category->name }}</td>
                    <td> <img height="50" src="{{asset('/storage/' . $category->img)}}" alt=""></td>
                    <td>{{ $category->slug }}</td>
                    
                    <td> <a class="btn btn-success btn-sm font-weight-bold" href="{{ route('showCategory', $category->slug) }}">SHOW</a> </td>
                    <td> <a class="btn btn-warning btn-sm font-weight-bold" href="{{ route('editCategory', $category->slug)}}">EDIT</a> </td>
                    <td><form class="delete-post-form font-weight-bold" action="{{ route('deleteCategory', $category->id )}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger btn-sm" type="submit" value="DELETE">
                        </form>
                    </td>
                </tr>  
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $categories->links() }}
</div>
@endsection