@extends('layouts.app')
@section('content')
  <div class="create">
    <h1>Inserisci un nuovo video a data base</h1>
    <form action="{{ route('store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label for="url" class="form-label">url</label>
            <input type="text" id="url" class="form-control" name="url">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">titolo</label>
            <input type="text" id="title" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label for="credits" class="form-label">credits</label>
            <textarea type="text" id="credits" class="form-control" name="credits" rows="6"></textarea>
        </div>
        <button type="submit">
            <span class="add-new">
                <i class="fa-solid fa-plus"></i>
            </span>
        </button>
    </form>
  </div>
@endsection