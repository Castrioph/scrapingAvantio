<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feed;

class AddController extends Controller
{
   public function add(){
    return view('add');
   }

   public function addFeed(Request $request){
       $editValues = [
        'title' => $request->input('title'),
        'body'  => $request->input('body'),
        'image'  => $request->input('image'),
        'source'  => $request->input('source'),
        'publisher'  => $request->input('publisher')
    ];
    FeedController::create($editValues);
    return redirect()->route('list');
   }
}
