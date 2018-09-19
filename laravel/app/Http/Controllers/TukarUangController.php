<?php

namespace App\Http\Controllers;
use App\customer;
use App\Http\Requests\StoreBlogPost;
use App\koko;
use App\money;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TukarUangController extends Controller
{

  public function __construct()
    {
      $this->middleware('auth');
    }


    public function TransaksiLink()
    {
      return view('transaksi.transaksi');
    }

         public function FormTransaksi()
         {
           return view('transaksi.form');
         }

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
