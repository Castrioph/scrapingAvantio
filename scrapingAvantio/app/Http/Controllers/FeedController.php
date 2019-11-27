<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedController extends Controller
{


      /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return App\Feed     
     * */
  
     //Creates a new Feed
  public static function create(array $data)
  {
    return \App\Feed::create([
      'title' => $data['title'],
      'body' => $data['body'],
      'image' => $data['image'],
      'source' => $data['source'],
      'publisher' => $data['publisher'],
    ]);
  }

  //Deletes a Feed matching the $id from the database
  public static function remove($id){
    $feed = \App\Feed::find($id);
    $feed->delete();
  }

//Edits the Feed matching the $id values
  public static function edit($id, array $data){
    $feed = \App\Feed::find($id);
    $feed->title =  $data['title'] ;
    $feed->body =  $data['body'] ;
    $feed->image =  $data['image'] ;
    $feed->source =  $data['image'] ;
    $feed->publisher =  $data['publisher'] ;
    $feed->save();
  }

  //Checks if a Feed with the title matching $title exists
  public static function checkIfExist($title){
    $feed = \App\Feed::where('title', $title);
    if($feed->count() == 0){
      return false;
    }

    return true;
  }
}
