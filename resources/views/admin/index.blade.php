@extends('layouts.app')
@section('content')
  <div class="container table-responsive">
      <h1 class="font-weight-bold">I VIDEO</h1>
      <table class="table table-striped w-100">
        <thead>
           <tr>
             <th>id</th>
             <th>Titolo</th>
             <th class="d-flex justify-content-center">Azioni</th>
           </tr>
        </thead>
        <tbody>
          @forEach($videos as $video)
            <tr>
              <td>{{ $video->id }}</td>
              <td>{{ $video->title }}</td>
              <td class="d-flex justify-content-end">
                <button class="btn btn-success"><i class="fa-solid fa-eye"></i></button>
                <button class="btn btn-warning mx-2"><i class="fa-solid fa-pencil"></i></button>
                <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
              </td>
            </tr>
          @endforEach
        </tbody>
      </table>
  </div>
@endsection