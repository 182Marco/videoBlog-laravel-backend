<?php

namespace App\Http\Controllers\Admin;

use App\Biography;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BiographyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bio = Biography::find(1);
        return view('admin.biography.index', compact('bio'));
    }

    
    public function edit()
    {
        $bio = Biography::find(1);
        return view('admin.biography.edit', compact('bio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $bio = Biography::find(1);
        $bio->update($data);

        return view('admin.biography.index', compact('bio'));
    }

}
