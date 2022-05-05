@component('mail::message')

# Hai un nuovo  contatto
 
**Mail ricevuta da:** {{ $contact['name']}} 

**Indirizzo mittente:** {{ $contact['email']}} 

**Messaggio:** {{ $contact['msg']}}
 
@component('mail::button', ['url' => ''])
View Order
@endcomponent
 
@endcomponent