<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PhoneNumber;

class phoneNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $number = PhoneNumber::find(1);

        return view('admin.phoneNumber.index', compact('number'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PhoneNumber  $phoneNumber
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $number = PhoneNumber::find(1);

        return view('admin.phoneNumber.edit', compact('number'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PhoneNumber  $phoneNumber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'number' => 'required|max:15|min:10|',
        ]
        );

        $data = $request->all();
        
        $phone = PhoneNumber::find(1);
        
        $phone->update($data);
        
        return redirect()->route('phone');
    }

}
