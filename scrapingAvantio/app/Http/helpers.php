<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Feed;
use Goutte\Client;
use App\Http\Controllers\FeedController;



function scraping($web,$params, $numFeeds){
  $client = new Client();
  $crawler = $client->request('GET', $web);
  $feeds = [];
  try{
    $search = $crawler->filter($params['article'])->each(function($node, $index) use ($params, $web, $feeds, $numFeeds){
      $title = $node->filter($params['title']);
      $body = $node->filter($params['body']);
      $image = $node->filter($params['image']);
      $publisher = $node->filter($params['publisher']);

      $title = $title->count() != 0 ? $title->text() : ""; 
      $body = $body->count() != 0 ? $body->text() : ""; 
      $image = $image->count() != 0 ? $image->attr($params['image_att']) : ""; 
      $publisher = $publisher->count() != 0 ? $publisher->text() : ""; 

      if(!FeedController::checkIfExist($title)){
        FeedController::create(['title'=>$title, 'body'=>$body, 'image'=>$image, 'source'=>$web, 'publisher'=>$publisher]);
      }
      
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

    for($i = 0; $i < $numFeeds; $i++){
      $feeds[$i] = $search[$i];
    }

    return $feeds;
    
  } catch (Exception $e) {
       dd($e);
  } 
}

?>