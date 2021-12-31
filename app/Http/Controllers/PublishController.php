<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

//request form
use App\Http\Requests\PublishRequest;

//model
use App\Models\Publish;

//traits
use Auth;

class PublishController extends Controller
{
    public function publish(){
        return view('publish');
    }

    public function publishArticle(PublishRequest $request){
        $publish = new Publish();
        $publish->user_id = Auth::user()->id;
        $publish->title = $request->title;
        $publish->description = $request->description;
        $publish->price = $request->price;
        $image = $request->file('image');
        $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
        $image->move('img',$imageName);
        $publish->image = $imageName;
        $publish->save();
        return view('publish');
    }
}
