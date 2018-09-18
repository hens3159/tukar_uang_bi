<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="{!! asset('css/style.css') !!}">

     <script src="myscripts.js"></script>

<style>
body{
  background-color: #0F95C8;
}
</style>

  </head>


  <body>

<div class="con-mobile">

<div class="logo">
<h6>APLIKASI TUKAR UANG LUSUH</h6> <br>
<img src="{{asset('storage/image/login.png')}}" class="img-responsive" width="276" alt="logo">
</div>

<div class="form-login">
  <form method="POST" action="{{ route('login') }}" class="form-transaksi">
      @csrf
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" class="form-control" id="username" name="username">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="password">
  </div> <br>
  <button type="submit" class="btn btn-success btn-block">Login</button>

</form>

</div>

</div>

  </body>
</html>
