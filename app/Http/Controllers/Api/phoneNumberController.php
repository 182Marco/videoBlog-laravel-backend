<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PhoneNumber;

class phoneNumberController extends Controller
{
    public function  getPhone() {
        
        $phone = PhoneNumber::find(1)->pluck('number');

        return response()->json($phone);
    }
}
