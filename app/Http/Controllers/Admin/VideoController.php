<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Video;
use Illuminate\Support\Str;
use App\Category;
use Illuminate\Validation\Rule;

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
        $categories = Category::orderBy('name')->get();
        if(!$search){
            $videos = Video::orderBy('created_at', 'desc')->with('category')->get();
        }else{
            $videos = Video::orderBy('created_at', 'desc')
                        ->where('title', 'like' , '%'. $search. '%')
                        ->orWhere('credits', 'like' , '%'. $search. '%')
                        ->with('category')
                        ->get();      
        }
        
        return view('admin.index', compact('videos','categories','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'title' => 'required|unique:videos|min:3',
            'url' => 'required|unique:videos|min:5',
            'category_id' => 'nullable|exists:categories,id',
        ],
        [
            'required' => 'The :attribute is required',
            'unique' => 'The :attribute is already in use for another video',
            'min' => 'Min :min characters allowed for this :attribute',
        ]);

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
        $video = Video::where('slug', $slug)->with('category')->first();

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
        $video = Video::where('slug', $slug)->with('category')->first();
        $categories = Category::all();

        if(!$video){
            return abort(404);
        }
        return view('admin.edit', compact('video','categories'));
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
        $request->validate([
            'title' => [
                'required',
                Rule::unique('videos')->ignore($id),
                'min:3'
            ],
            'url' => [
                'required',
                Rule::unique('videos')->ignore($id),
                'min:5'
            ],
            'category_id' => 'nullable|exists:categories,id',
        ],
        [
            'required' => 'The :attribute is required',
            'unique' => 'The :attribute is already in use for another video',
            'min' => 'Min :min characters allowed for this :attribute',
        ]);

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
