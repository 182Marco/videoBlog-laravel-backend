@extends('layouts.app')
@section('content')
<div class="container index contact">
    {{-- Session Deleted --}}
    <div class="alert-box">
        @if (session('deleted'))
        <div class="alert alert-success">
            Messaggio da: <strong>{{ session('deleted') }}</strong> eliminato!
        </div>
        @endif
    </div>
    {{-- --}}
    <header class="mb-4">
        <h1 class="mb-0">Contatti ricevuti</h1>
        <form action="" class="form-inline" type="GET" action={{route('contacts')}}>
            <input class="form-control" type="text" name="search" placeholder="search by product id">
            <button class="btn btn-success ml-2" type="text">search</button>
        </form>
    </header>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Mail</th>
                    <th>Incipit messaggio</th>
                    <th>Data</th>
                    <th>Mostra</th>
                    <th>Cancella</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                <tr>
                    <td>{{ucfirst($contact->name)}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{ucfirst(substr($contact->msg,0,35))}}</td>
                    <td>{{$contact->created_at}}</td>
                    <td>
                        <a
                            class="text-success"
                            href="{{ route('contact', $contact->id)}}"
                        >
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </td>
                    <td>
                        <section>
                            <form
                                class="delete-form"
                                action="{{ route('deleteContact', $contact->id)}}"
                                method="DELETE"
                            >
                                @csrf @method('DELETE')
                                <button type="submit" value="DELETE">
                                    <i
                                        class="fa fa-trash"
                                        aria-hidden="true"
                                    ></i>
                                </button>
                            </form>
                        </section>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $contacts->withQueryString()->links() }}
</div>
@endsection
