<?php

namespace App\Http\Controllers\api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Video;

class VideoController extends Controller
{
    public function  getVideos($search = null) {
       if(!$search){
           $videos = Video::orderBy('created_at', 'desc')->get();
        }

        $videos = Video::orderBy('created_at', 'desc')
        ->where('title', 'like', "%$search%")  // faster way to concat in php same->'%'. $search .'%
        ->get();

        return response()->json($videos);
    }

    public function getVideosByCategory($slug) {

        $category_id = Category::where('slug', $slug)->pluck('id');
            
        $videos = Video::where('category_id', $category_id)->orderBy('title')->get();

        return response()->json($videos);
    }
}