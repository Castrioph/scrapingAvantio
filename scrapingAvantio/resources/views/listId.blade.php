<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>dailyTrends!</title>

      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

      <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .feeds{
          display: flex;
          justify-content: center;
          align-items: center;
          flex-direction: column;
        }
        .feeds img{
          width: 50%;
          height: 50%;
        }
        .feeds__article{ 
          display: flex;
          justify-content: center;
          align-items: center;
          flex-direction: column;
          background-color: #f1f1f1;
          border: 1px solid;
          -webkit-box-shadow: 4px 12px 22px -4px rgba(0,0,0,0.75);
          -moz-box-shadow: 4px 12px 22px -4px rgba(0,0,0,0.75);
          box-shadow: 4px 12px 22px -4px rgba(0,0,0,0.75);
          width: 50%;
          margin: 20px;
          padding: 20px;
          color: black;
        }
    </style>
  </head>
  <body>
    <div class="flex-center position-ref">
      <div class="content">
        <div class="title m-b-md">
           List the menu!
        </div>
        <div class="links">
          <a href="{{ url('/home') }}">Home</a>
          <a href="{{ url('/list') }}">Menu</a>
          <a href="{{ url('/add') }}">Your menu</a>
          <a href="{{ url('/edit') }}">Customize the menu</a>
          <a href="{{ url('/logout') }}">Logout</a>   
        </div>    
      </div>

    </div>
    <div class="feeds">
    <article class="feeds__article">
          <h4>{{ $feed['title']}}</h4>
          <p>{{ $feed['body']}}</p>
          <img src ="{{ $feed['image']}}">
          <p>{{ $feed['source']}}</p>
          <p>{{ $feed['publisher']}}</p>
        </article>
    </div>
       
  </body>
</html>
