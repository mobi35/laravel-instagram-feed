<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function uploadAvater(Request $request){

        if($request->hasFile('image')){
            User::uploadAvatar($request->image);
            $request->session()->flash('message','Image uploaded');
        }
            $request->session()->flash('error','Image Failed');
            return redirect()->back();
    }


}
