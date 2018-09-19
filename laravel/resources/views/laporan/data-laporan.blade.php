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
  background-color:#F8F8F8;
}


.modal-dialog {
  width: 90%;
  height: 60%;
  margin: 0 auto;
  border: 0;
  top:20%;
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
    <a href="{{Request::getHost()}}/laporan-link" style="font-size:20px;"><i class="fa fa-arrow-left" style="font-size:20px; background:none; margin-right:16px;"></i>Laporan Transaksi</a>
  </ul>
    </div>

<div class="con-laporan">
    <form class="form-date">
    <div class="container-fluid">
      <div class="row">
    <div class="col-xs-6">
    <div class="form-group">
    <label for="tanggal" style="font-weight:100; color:#808080; font-size:12px;" >Set Tanggal Awal</label>
    <input type="date" class="form-control" id="date1">
    </div>
  </div>

  <div class="col-xs-6">
  <div class="form-group">
  <label for="tanggal" style="font-weight:100; color:#808080; font-size:12px;" >Set Tanggal Akhir</label>
  <input type="date" class="form-control" id="date2">
  </div>
  </div>

  </div>
  </div>

</form>


<div class="total-uang">
<h6>Total Nominal Penukaran</h6>
<h6>Rp. {{$jumlah}} -</h6>
</div>


  <table class="table" id="koko">
    <thead>
      <tr class="head">
        <th style="text-align:center;">No</th>
        <th>Tanggal</th>
        <th>Nama</th>
        <th>Nominal</th>
      </tr>
    </thead>
    <tbody>
      <?php $count=1; ?>
      @foreach($customer as $customer)
      <tr class="tab" data-toggle="modal" data-target=".bs-example-modal-lg" data-id="{{$customer->id}}">
        <td >{{$count++}}</td>
        <td>{{date('d-m-Y', strtotime($customer->date))}}</td>
        <td>{{$customer->nama}}</td>
        <td>Rp {{$customer->nominal}}</td>

      </tr>
        @endforeach

    </tbody>

  </table>
</div>


    <div class="modal  bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">

      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="show-data" id="show-data">

            </div>

          </div>
        </div>
        </div>
      </div>
    </div>


        <script type="text/javascript">

    $('#date2').on('change',henhen);
    $('#date1').on('change',henhen);


    function henhen() {

      var date1 = $('#date1').val();
      var date2 = $('#date2').val();

        $.get("/ajax",
        {
            date1: date1,
            date2: date2,
        },
        function(data){
         $('#koko').html(data);
        });

}


    $(".tab").click(function(){
      var id = $(this).attr('data-id');
        $.get("/profil",
        {
          id: id,
        },
        function(data){
          $('#show-data').html(data);
        });

    });


    </script>



  </body>
</html>
