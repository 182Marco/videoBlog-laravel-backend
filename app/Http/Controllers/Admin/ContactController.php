<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function index() {
       
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.contacts.index', compact('contacts'));
    }


    public function show($id) {

        $contact = Contact::find($id);

        return view('admin.contacts.show', compact('contact'));      
    }


    public function destroy($id) {

        $contact = Contact::find($id);

        $contact->delete();

        return redirect()->route('contacts')->with('deleted', $contact->email);     
    }


}
