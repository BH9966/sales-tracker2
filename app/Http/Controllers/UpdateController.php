<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UpdateController extends Controller
{
    //  hii apa implimentation (skeleton yake) 
    // if(Hash::check($value, $hashedValue))
    public function index()
    {
         return view('mazerpage.profile.update');
    }
    public function verifyPassword(Request $request)

    {
        $data = $request->all();
        if(Hash::check($data['current_pass'], Auth::guard('users')->user()->password))
        {
            return "true";
        } else
        {
            return "false";
        }
    }
}
