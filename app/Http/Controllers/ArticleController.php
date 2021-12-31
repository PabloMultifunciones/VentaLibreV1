<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//model
use App\Models\Publish;

class ArticleController extends Controller
{
    public function article($id){
        $article = Publish::find($id);
        return view('article',compact('article'));
    }
}
