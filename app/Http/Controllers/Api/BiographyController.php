<?php

namespace App\Http\Controllers\api;

use App\Biography;
use App\Http\Controllers\Controller;

class BiographyController extends Controller
{
    public function getBiographies() {
        
        $bio = Biography::find(1);

        return response()->json($bio);
    }
}
