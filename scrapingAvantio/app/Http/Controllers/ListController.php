<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feed;

class ListController extends Controller
{
   public function list(){
       $feeds = Feed::all();
    return view('list', ['feeds' => $feeds]);
   }

   public function listId($id){
       $feed = Feed::find($id);
       return view('listId', ['feed' => $feed]);
   }
}
