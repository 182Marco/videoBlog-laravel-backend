@component('mail::message')

# Hai un nuovo contatto dal sito
 
**Mail ricevuta da:** {{ $contact['name']}} 

**Indirizzo mittente:** {{ $contact['email']}} 

**Messaggio:** {{ $contact['msg']}}
 
@endcomponent