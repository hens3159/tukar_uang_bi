<div class="total-uang">
<h6>Total Nominal Penukaran</h6>
<h6>Rp. {{$jumlah}} -</h6>
</div>

<table class="table">
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
    <tr class="tab" data-toggle="modal" data-target=".bs-example-modal-lg">
      <td>{{$count++}}</td>
      <td>{{date('d m Y', strtotime($customer->date))}}</td>
      <td>{{$customer->nama}}</td>
      <td>Rp {{$customer->nominal}}</td>

    </tr>
    <tr class="tab" data-toggle="modal" data-target=".bs-example-modal-lg">
      @endforeach

  </tbody>

</table>
