<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  {{-- Getting from config/app.php --}}
  <title>{{ config('app.name') }}</title>

  {{-- Include Bootstrap 5 from CDN --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-sm-8">

        {{-- Blade directive for dynamic content --}}
        @yield('content')
        
      </div>
    </div>
  </div>
</body>
</html>