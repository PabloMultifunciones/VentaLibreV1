<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

//Form Request
use App\Http\Requests\uploadImageRequest;
use App\Http\Requests\UpdateMydata;

//Models
use App\Models\User;

//Traits
use Auth;

class MydataController extends Controller
{

    public function mydata()
    {
        return view('mydata');
    }

    public function uploadImage(uploadImageRequest $request)
    {
        $user = Auth::user();
        $image = $request->file('image');
        $imageName = Str::random(20) . "." . $image->getClientOriginalExtension(); 
        $image->move('img', $imageName);
        $user->img_user = $imageName;
        $user->save();
        return view('mydata');
    }
    
    public function updateData(UpdateMydata $request){
        $user = Auth::user();
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        return view('mydata');
    }
}
