<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publish extends Model
{
    use HasFactory;

    protected $table = "Publications";

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'price',
        'image'
    ];

    public function getImagePublish(){
        $routeImg = 'img/' . $this->attributes['image']; 
        return url($routeImg);
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
