@extends('layouts.app') @section('content')
<div class="container show">
    <h1>Inviato da: <em>{{ucfirst( $contact->name )}}</em></h1>
    <main>
        <div>
            <h4>Email:</h4>
            <p class="mb-4">{!! $contact->email !!}</p>
            <h4>Messaggio per intero:</h4>
            <p class="mb-4">{{ucfirst( $contact->msg )}}</p>
        </div>
    </main>
    <section class="mb-3">
        <form
            class="delete-form"
            action="{{ route('deleteContact', $contact->id)}}"
            method="DELETE"
        >
            @csrf @method('DELETE')
            <button type="submit" value="DELETE">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </button>
        </form>
    </section>
    <a href="{{ route('contacts')}}" class="btn btn-success"
        >torna all'indice</a
    >
</div>
@endsection
