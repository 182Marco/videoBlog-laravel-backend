<?php

namespace App\Http\Controllers\api;

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
}