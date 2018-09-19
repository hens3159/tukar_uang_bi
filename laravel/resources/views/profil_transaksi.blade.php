
            <div class="show-data">
             <h6 style="text-align:center;">Data Transaksi Penukaran </h6>
             <div class="data-con">
            <div class="label-data">Nama Penukar</div>
            <div class="titik-dua">:</div>
            <div class="input-data"> {{$no_transaksi->nama}}</div>
          </div>

          <div class="data-con">
         <div class="label-data">Usia</div>
         <div class="titik-dua">:</div>
         <div class="input-data">{{$no_transaksi->usia}}</div>
       </div>

       <div class="data-con">
      <div class="label-data">Alamat</div>
      <div class="titik-dua">:</div>
      <div class="input-data">{{$no_transaksi->alamat}}</div>
    </div>

    <div class="data-con">
   <div class="label-data">Tanggal</div>
   <div class="titik-dua">:</div>
   <div class="input-data">{{date('d m Y', strtotime($no_transaksi->tanggal))}}</div>
 </div>

 <div class="data-con">
<div class="label-data">Nominal</div>
<div class="titik-dua">:</div>
<div class="input-data">{{$no_transaksi->nominal}}</div>
</div>
<br>
<button type="button" class="btn btn-success btn-block btn-lg" data-dismiss="modal" id="ok">Ok</button>

            </div>
