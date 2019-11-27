<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feed;
use Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the Welcome landing
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        $paramsElMundo = [
            'web' => 'https://www.elmundo.es',
            'searchParams' => [
                'article' =>'.ue-c-cover-content',
                'title' => '.ue-c-cover-content__headline',
                'body' => '',
                'image' => '.ue-c-cover-content__image',
                'image_att' => 'src',
                'publisher' => '.ue-c-cover-content__byline-name',
            ]
        ];

        $paramsElPais = [
            'web' => 'https://www.elpais.com',
            'searchParams' => [
                'article' =>'.articulos',
                'title' => '[itemprop=headline]',
                'body' => '[itemprop=description]',
                'image' => '[itemprop=image]  [itemprop=url]',
                'image_att' => 'content',
                'publisher' => '[itemprop=author]',
            ]
        ];
        
        $articulosElPais = scraping($paramsElPais['web'], $paramsElPais['searchParams'], 5);
        $articulosElMundo = scraping($paramsElMundo['web'], $paramsElMundo['searchParams'], 5);

        return view('welcome',  ['articulosElPais' => $articulosElPais, 'articulosElMundo' =>  $articulosElMundo]);
    }
}
