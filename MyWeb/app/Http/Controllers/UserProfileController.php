<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Auth;
use Image;
class UserProfileController extends Controller
{
    public function profile(){
        return view('profile', array('user' => Auth::user()) );
    }
    public function update_avatar(Request $request){
     // Logic for user upload of avatar
     if($request->hasFile('avatar')){
         $avatar = $request->file('avatar');
         $filename = time() . '.' . $avatar->getClientOriginalExtension();
         Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
         $user = Auth::user();
         $user->avatar = $filename;
         $user->save();
     }
     return view('profile', ['user' => Auth::user()] );
 }
}
