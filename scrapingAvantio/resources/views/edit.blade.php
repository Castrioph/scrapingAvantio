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

        .links__feed{
          display: flex;
          justify-content: center;
          align-items: center;
          flex-direction: column;
          height: 70vh;
          overflow: auto;
          margin-top: 5vh;
        }

    </style>
  </head>
  <body>
    <div class="flex-center position-ref">
      <div class="content">
        <div class="title m-b-md">
            Welcome to dailyTrends!
        </div>
        @if (Route::has('login'))
          <div class="links">
              @auth
                <a href="{{ url('/home') }}">Home</a>
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
    <h3 class="flex-center">Click on a link to edit the Feed</h3>
    <div class="links__feed">
           @foreach($feeds as $feed)
              <p>{{$feed['id']}} <a href="/edit/{{$feed['id']}}">{{$feed['title']}}</a></p>
           @endforeach
        </div>
  </body>
</html>
