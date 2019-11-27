<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feed;

class EditController extends Controller
{
    public function edit(){
        $feeds = Feed::all();
        return view('edit', ['feeds' => $feeds]);
    }

    public function editId($id){
        $feed = Feed::find($id);
        return view('editId', ['feed' => $feed]);
    }

    public function editFeed($id, Request $request){
        $id = explode("/", $request->path())[1];
        $editValues = [
            'title' => $request->input('title'),
            'body'  => $request->input('body'),
            'image'  => $request->input('image'),
            'source'  => $request->input('source'),
            'publisher'  => $request->input('publisher')
        ];
        FeedController::edit($id,$editValues);
        return redirect()->route('list');
    }

    public function deleteFeed($id){
        FeedController::remove($id);
        return redirect()->route('list');
    }
}

