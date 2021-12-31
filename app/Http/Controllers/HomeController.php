<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Model
use App\Models\Publish;
use App\Http\Controllers\ArticleController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $publications = Publish::all();
        $article = new ArticleController();
        return view('home',compact('publications','article'));
    }

}
