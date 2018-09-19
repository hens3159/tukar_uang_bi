<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

	<div class="con-form">
			<form role="form" id="formInput" class="input-lap">
<div class="form-group form-group-lg has-feedback">
 <label for="nama">Nama</label>
 <input type="text" name="nama" id="nama" class="form-control textbox">
 <i class="form-control-feedback"></i>
 <span class="text-danger" ></span>
 </div>

 <div class="form-group form-group-lg has-feedback">
  <label for="nama">Usia</label>
  <input type="text" name="nama" id="usia" class="form-control textbox">
  <i class="form-control-feedback"></i>
  <span class="text-danger" ></span>
  </div>

	<div class="form-group form-group-lg has-feedback">
	 <label for="nama">Alamat</label>
	 <input type="text" name="nama" id="alamat" class="form-control textbox">
	 <i class="form-control-feedback"></i>
	 <span class="text-danger" ></span>
	 </div>

	 <div class="form-group form-group-lg has-feedback">
	  <label for="nama">Nominal yang dtukar</label>
	  <input type="text" name="nama" id="nominal" class="form-control textbox">
	  <i class="form-control-feedback"></i>
	  <span class="text-danger" ></span>
	  </div>

<button type="button" name="btn-simpan" class="btn btn-success btn-block" id="submit_komen" data-toggle="koko" data-target="koko">Simpan</button>

</form>
 </div>
 </div>


 <div class="modal bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">

   <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
       <div class="konten">
       <h6 style="text-align:center; margin-bottom:35px; color: #808080;">Data Berhasil Terkirim !</h6>
       <button type="input" class="btn btn-success btn-block btn-lg" data-dismiss="modal" id="ok">Ok</button>

     </div>
     </div>
   </div>
 </div>


<script type="text/javascript">


$(document).ready(function(){
	$('.text-danger').hide();

	$('input').each(function(){
		$(this).blur(function(){ //blur function itu dijalankan saat element kehilangan fokus
			if (! $(this).val()){ //this mengacu pada text box yang sedang fokus
				return get_error_text(this); //function get_error_text ada di bawah
			} else {
				$(this).removeClass('no-valid');
				$(this).parent().find('.text-danger').hide();//cari element dengan class has-warning dari element induk text yang sedang focus
				$(this).closest('div').removeClass('has-error');
				$(this).closest('div').addClass('has-success');
				$(this).parent().find('.form-control-feedback').removeClass('glyphicon glyphicon-warning-sign');
				$(this).parent().find('.form-control-feedback').addClass('glyphicon glyphicon-ok');
			}
		});
});

//menerapkan gaya validasi form bootstrap saat terjadi eror
function apply_feedback_error(textbox){
	$(textbox).addClass('no-valid'); //menambah class no valid
	$(textbox).parent().find('.text-danger').show();
	$(textbox).closest('div').removeClass('has-success');
	$(textbox).closest('div').addClass('has-error');
	$(textbox).parent().find('.form-control-feedback').removeClass('glyphicon glyphicon-ok');
	$(textbox).parent().find('.form-control-feedback').addClass('glyphicon glyphicon-warning-sign');
}

//untuk mendapat eror teks saat textbox kosong, digunakan saat submit form dan blur fungsi
function get_error_text(textbox){
	$(textbox).parent().find('.text-danger').text("");
	$(textbox).parent().find('.text-danger').text("Harap untuk diisi");
	return apply_feedback_error(textbox);
}

$('#submit_komen').click(function(e){
  e.preventDefault();
  var valid=true;
      var nama = $('#nama').val();
      var usia = $('#usia').val();
      var alamat = $('#alamat').val();
      var nominal = $('#nominal').val();

  if(nama!=0 && usia!=0 && alamat!=0 && nominal!=0 ){
    $('#submit_komen').attr("data-toggle","modal");
    $('#submit_komen').attr("data-target",".bs-example-modal-lg");

    $.get("/ajax-form",
    {
        nama: nama,
        usia: usia,
        alamat: alamat,
        nominal: nominal,
    },
    function(data){
      $('#nama').val("");
      $('#usia').val("");
      $('#alamat').val("");
      $('#nominal').val("");
      alert(data);

      $("#formInput").find('.form-group').removeClass('has-success');
      $("#formInput").find('.form-control-feedback').removeClass('glyphicon glyphicon-ok');



    });

  }else{

            if (! $('#nama').val()){
              get_error_text('#nama');
              valid = false;
              $('html,body').animate({scrollTop: 0},"slow");
            }

            if (! $('#usia').val()){
              get_error_text('#usia');
              valid = false;
              $('html,body').animate({scrollTop: 0},"slow");
            }

            if (! $('#alamat').val()){
              get_error_text('#alamat');
              valid = false;
              $('html,body').animate({scrollTop: 0},"slow");
            }

            if (! $('#nominal').val()){
              get_error_text('#nominal ');
              valid = false;
              $('html,body').animate({scrollTop: 0},"slow");
            }

  }

});
});


$("#ok").click(function(){
  $('#submit_komen').attr("data-toggle","");
  $('#submit_komen').attr("data-target","");
});


</script>



</body>
</html>
