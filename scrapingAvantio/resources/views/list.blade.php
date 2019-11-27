<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Feed Me!</title>

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
    <div class="flex-center position-ref full-height">
      <div class="content">
        <div class="title m-b-md">
            Welcome to Feed Me!
        </div>
        @if (Route::has('login'))
          <div class="links">
              @auth
                <a href="{{ url('/list') }}">Menu</a>
                <a href="{{ url('/add') }}">Your menu</a>
                <a href="{{ url('/edit') }}">Customize the menu</a>

              @else
                  <a href="{{ route('login') }}">Login</a>
                  @if (Route::has('register'))
                      <a href="{{ route('register') }}">Register</a>
                  @endif
              @endauth
          </div>
          @endif
      </div>
    </div>


    <div class="feeds">
    <h1>Estos son los 5 articulos del momento de El Pais</h3>
      @foreach ($articulosElPais as $articulo)
        <article class="feeds__article">
          <h4>{{ $articulo['title']}}</h4>
          <p>{{ $articulo['body']}}</p>
          <img src ="{{ $articulo['image']}}">
          <p>{{ $articulo['source']}}</p>
          <p>{{ $articulo['publisher']}}</p>
        </article>
      @endforeach
    </div>

    <div class="feeds">
    <h1>Estos son los 5 articulos del momento de El Mundo</h3>
      @foreach ($articulosElMundo as $articulo)
        <article class="feeds__article col-md-6">
          <h4>{{ $articulo['title']}}</h4>
          <p>{{ $articulo['body']}}</p>
          @if($articulo['image'] != '')
          <img src ="{{ $articulo['image']}}">
          @endif
          <p>{{ $articulo['source']}}</p>
          <p>{{ $articulo['publisher']}}</p>
        </article>
      @endforeach
    </div>
  </body>
</html>
