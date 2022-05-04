@extends('layouts.app') @section('content')
<div class="container index">
    {{-- Session Deleted --}}
    <div class="alert-box">
        @if (session('deleted'))
        <div class="alert alert-success">
            Messaggio da: <strong>{{ session('deleted') }}</strong> eliminato!
        </div>
        @endif
    </div>
    {{-- --}}
    <h1>Contatti ricevuti</h1>
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
                        <section class="mb-3">
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

    {{ $contacts->links() }}
</div>
@endsection
