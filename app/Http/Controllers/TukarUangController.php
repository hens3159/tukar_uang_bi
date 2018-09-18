<?php

namespace App\Http\Controllers;
use App\customer;
use App\Http\Requests\StoreBlogPost;
use App\koko;
use App\money;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TukarUangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = DB::table('customer_money')
                    ->join('customers', 'customers.id', '=', 'customer_money.customer_id')
                    ->join('moneys', 'moneys.id', '=', 'customer_money.money_id')
                    ->select("customers.nama", "customers.usia", "customers.alamat", "customer_money.created_at as date", "customer_money.id as id", "moneys.nominal_penukaran as nominal")
                    ->get();

      $jumlah = DB::table('customer_money')
                    ->join('customers', 'customers.id', '=', 'customer_money.customer_id')
                    ->join('moneys', 'moneys.id', '=', 'customer_money.money_id')
                    ->select('moneys.nominal_penukaran')
                    ->sum('nominal_penukaran');

       return view ('laporan.data-laporan',['customer'=>$users, 'jumlah'=>$jumlah]);
      //return view('daftar_laporan');
    }

    public function TransaksiLink()
    {
      return view('transaksi.transaksi');
    }

    public function LaporanLink()
    {
      return view('laporan.laporan');
    }

  public function AjaxSearch(Request  $request)
  {
    $tanggal1 = $request->date1;
    $tanggal2 = $request->date2;

    $users = DB::table('customer_money')
                  ->join('customers', 'customers.id', '=', 'customer_money.customer_id')
                  ->join('moneys', 'moneys.id', '=', 'customer_money.money_id')
                  ->select("customers.nama", "customers.usia", "customers.alamat", "customer_money.created_at as date", "moneys.nominal_penukaran as nominal")
                  ->whereBetween('customer_money.created_at',[$tanggal1,$tanggal2])
                  ->get();


  return view ('laporan.laporan-ajax',['customer'=>$users]);

 }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

         public function FormTransaksi()
         {
           return view('transaksi.form');
         }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


         public function FormTransaksiAjax(Request  $request)
         {
                $customer = new customer;
                $nama = $customer->nama = $request->nama;
                $customer->usia = $request->usia;
                $customer->alamat =$request->alamat;

                $koko= customer::where('nama', $nama)->first();

               if ($koko != null)
                {
                 $customerId = $koko['id'];
                }else {
                  $customer->save();
                  $customerId= $customer->id;
                }

                 $nominal = new money;
                 $nominal->nominal_penukaran = $request->nominal;
                 $money= money::where('nominal_penukaran', $nominal)->first();

                 if ($money != null)
                  {
                   $lastInsertedId = $money['id'];
                  }else {
                    $nominal->save();
                    $lastInsertedId= $nominal->id;
                  }

                   $user =customer::find($customerId);
                   $user->moneys()->attach($lastInsertedId);

                   return redirect ('/form');

         }




/*
    public function store(Request $request)
    {

     $blog = new customer;
     $nama = $blog->nama = $request->nama;
     $blog->usia = $request->usia;
     $blog->alamat =$request->alamat;

     $koko= customer::where('nama', $nama)->first();

    if ($koko != null)
     {
      $blogId = $koko['id'];
     }else {
       $blog->save();
       $blogId= $blog->id;
     }

      $nominal = new money;
      $nominal->nominal_penukaran = $request->nominal;
      $kaka= money::where('nominal_penukaran', $nominal)->first();

      if ($kaka != null)
       {
        $lastInsertedId = $kaka['id'];
       }else {
         $nominal->save();
         $lastInsertedId= $nominal->id;
       }

        $user =customer::find($blogId);
        $user->moneys()->attach($lastInsertedId);

        return redirect ('laporan/create');

    }
*/
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      $id = $request->id;
      $id = intval($id);

      $no_transaksi = DB::table('customer_money')
                    ->join('customers', 'customers.id', '=', 'customer_money.customer_id')
                    ->join('moneys', 'moneys.id', '=', 'customer_money.money_id')
                    ->select("customers.nama", "customers.usia", "customers.alamat", "customer_money.created_at as tanggal", "moneys.nominal_penukaran as nominal")
                    ->where("customer_money.id",$id)->first();
      return view ('profil_transaksi',['no_transaksi'=>$no_transaksi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
