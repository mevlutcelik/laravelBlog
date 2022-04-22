<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProfileEditRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileEditController extends Controller
{
    public function show(){
        return view('user.profile-edit');
    }
    public function edit(ProfileEditRequest $request){
        $user = Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();
        return back()->with([
            'type' => 'success',
            'msg' => 'Profil başarılı bir şekilde kayıt edildi.'
        ]);
    }
}
