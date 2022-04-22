<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileEditController extends Controller
{
    public function show(){
        return view('user.profile-edit');
    }
}
