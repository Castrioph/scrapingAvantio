<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Feed;
use Goutte\Client;
use App\Http\Controllers\FeedController;


//Scraping dynamically for articles
function scraping($web,$params, $numFeeds){
  $client = new Client();
  $crawler = $client->request('GET', $web);
  $feeds = [];
  try{
    //Creates a new search matching the filter and saves it in $search
    $search = $crawler->filter($params['article'])->each(function($node, $index) use ($params, $web, $feeds, $numFeeds){
      $title = $node->filter($params['title']);
      $body = $node->filter($params['body']);
      $image = $node->filter($params['image']);
      $publisher = $node->filter($params['publisher']);

      $title = $title->count() != 0 ? $title->text() : ""; 
      $body = $body->count() != 0 ? $body->text() : ""; 
      $image = $image->count() != 0 ? $image->attr($params['image_att']) : ""; 
      $publisher = $publisher->count() != 0 ? $publisher->text() : ""; 

      //In case the feed doesn't exist on the database a new one is generated
      if(!FeedController::checkIfExist($title)){
        FeedController::create(['title'=>$title, 'body'=>$body, 'image'=>$image, 'source'=>$web, 'publisher'=>$publisher]);
      }
      
      //Gets the $numFeeds first posts and returns them
      if($index < $numFeeds){
        return $feeds[$index] = [
          'title' => $title,
          'body' => $body,
          'image' => $image,
          'publisher' => $publisher,
          'source' => $web,
        ];
      }
    });

    //Reduce the $search array in a new array of lenght = $numFeeds
    for($i = 0; $i < $numFeeds; $i++){
      $feeds[$i] = $search[$i];
    }

    return $feeds;
    
  } catch (Exception $e) {
    //Prepared to debug
      //  dd($e);
  } 
}

?>