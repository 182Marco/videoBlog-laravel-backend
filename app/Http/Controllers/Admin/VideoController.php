<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Video;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if(!$search){
            $videos = Video::orderBy('created_at', 'desc')->paginate(6);
        }else{
            $videos = Video::orderBy('created_at', 'desc')
                        ->where('title', 'like' , '%'. $search. '%')
                        ->orWhere('credits', 'like' , '%'. $search. '%')
                        ->paginate(6);      
        }
        
        return view('admin.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        $new_video = new Video;
        $new_video->fill($data);
        $new_video->slug = Str::slug( $new_video->title, '-');
        $new_video->save();

        return redirect()->route('show', $new_video->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $video = Video::where('slug', $slug)->first();

        if(!$video){
            return abort(404);
        }
        return view('admin.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $video = Video::where('slug', $slug)->first();

        if(!$video){
            return abort(404);
        }
        return view('admin.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        
        $video = Video::find($id);
        
        $video['slug'] = Str::slug($video->slug, '-');
        
        $video->update($data);
        
        return redirect()->route('show', $video->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);

        $video->delete();

        return redirect()->route('home')->with('deleted', $video->title);

    }
}
