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

<style>
body{
  background-color: #F8F8F8;
}


.modal-dialog {
  width: 100%;
  height: 30%;
  margin: 0;
  padding: 0;
  bottom:0;
  position: absolute;
  z-index: 10040;
  overflow: auto;
  overflow-y: auto;
  border: 1px solid white;
  border-width: 0;
}

.modal-content {
  height: auto;
  min-height: 100%;
  border-radius: 10px;
}

</style>

  </head>


  <body>

    <div class="menu">
    <ul class="coco">
    <a href="http://{{Request::getHost()}}/transaksi-link" style="font-size:20px;"><i class="fa fa-arrow-left" style="font-size:20px; background:none; margin-right:16px;"></i>Input Data Transaksi</a>
  </ul>
    </div>

    <input type="hidden" value="{{csrf_token()}}" id="token"/>

<div class="con-form">
  <form class="input-lap">
    <div class="form-group">
      <label for="nama">Nama Penukar:</label>
      <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} " id="nama" value="{{ old('nama') }}" name="nama">
      @if($errors->has('nama'))
      <p>{{$errors->first('nama')}}</p>
      @endif
    </div>


    <div class="form-group">
      <label for="usia">Usia:</label>
      <input type="text" class="form-control" id="usia">
    </div>

    <div class="form-group">
    <label for="alamat">Alamat:</label>
    <textarea class="form-control" rows="3" id="alamat"></textarea>
    </div>

    <div class="form-group">
      <label for="nominal">Nominal yang Ditukar:</label>
      <input type="text" class="form-control" id="nominal">
    </div>
    <br>
    <button type="button" class="btn btn-success btn-block"  id="submit_komen">Kirim</button>
  </form>

</div>

<div class="modal bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">

  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="konten">
      <h6 style="text-align:center; margin-bottom:35px; color: #808080;">Data Berhasil Terkirim !</h6>
      <button type="button" class="btn btn-success btn-block btn-lg" data-dismiss="modal" id="ok">Ok</button>

    </div>
    </div>
  </div>
</div>


<script type="text/javascript">

$("#submit_komen").click(function(){

  var nama = $('#nama').val();
  var usia = $('#usia').val();
  var alamat = $('#alamat').val();
  var nominal = $('#nominal').val();
  var token = $('#token').val();

    $.get("/ajax-form",
    {
        nama: nama,
        usia: usia,
        alamat: alamat,
        nominal: nominal,
        token: token
    },
    function(data){
      // $('#nama').val("");
      // $('#usia').val("");
      // $('#alamat').val("");
      // $('#nominal').val("");
      alert("koko");

});
});

// </script>



  </body>



</html>
