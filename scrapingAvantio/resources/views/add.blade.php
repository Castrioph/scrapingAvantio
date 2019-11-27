<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>dailyTrends!</title>

      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

      <!-- Styles -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
          margin-top: 20px;
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

        form{ 
          width: 50%;
        }

        .fedTitle{
          color: red;
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
        </div>    
      </div>

    </div>
    <div class="feeds">

    <h3>Add a new Feed</h3>
    
    
    <form method="post" action="/add">
      @csrf
      <div class="form-group ">
        <label for="title">Title</label>
        <input name="title" class="form-control" id="titleFeed"  placeholder="Enter title here" required>
      </div>
      <div class="form-group ">
        <label for="title">Body</label>
        <input name="body" class="form-control" id="titleFeed"  placeholder="Enter body here" required>
      </div>
      <div class="form-group ">
        <label for="title">Image</label>
        <input name="image" class="form-control" id="titleFeed"  placeholder="Enter image heree" required>
      </div>
      <div class="form-group ">
        <label for="title">Source</label>
        <input name="source" class="form-control" id="titleFeed"  placeholder="Enter source here" required>
      </div>
      <div class="form-group ">
        <label for="title">Publisher</label>
        <input name="publisher" class="form-control" id="titleFeed"  placeholder="Enter publisher here" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  </body>
</html>
