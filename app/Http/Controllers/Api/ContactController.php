<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMsg;
use App\Contact;

class ContactController extends Controller
{
    public function store(Request $request){

      $validator = Validator::make($request->all(), [
          'name' => 'required',
          'email' => 'required', 
          'msg' => 'required'
      ]);

      if ($validator->fails()){
          return response()->json([ 'errors'=> $validator->errors() ]);
      }

      $data = $request->all();

      $new_contact = new Contact();
      $new_contact ->fill($data);
      $new_contact->save();


      Mail::to('mirkofasoli90@gmail.com')->send(new ContactMsg($data));

      return response()->json($data);
    }
}
