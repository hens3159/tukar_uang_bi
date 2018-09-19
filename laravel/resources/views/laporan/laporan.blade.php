<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
*{
  background-color: white;
}



</style>

  </head>


  <body>
    <div class="menu">
    <ul class="coco">
    <li><a href="" style="font-size:20px;"><i class="fa fa-home" style="font-size:20px; background:none; margin-right:12px;"></i>Home</a></li>
    <a class="dropdown-item" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    </ul>
    </div>

<div class="con-mobile">
<div class="logo">
<h6>APLIKASI TUKAR UANG LUSUH</h6>
<img src="{{asset('storage/image/laporan.png')}}" class="img-responsive" width="276" alt="logo">
</div>

<div class="button">
<a href="http://{{Request::getHost()}}/laporan">
  <button type="button" class="btn btn-success btn-block btn-lg">Lihat Data Transaksi</button>
</a>
</div>

</div>
  </body>
</html>
