<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use App\koko;
use App\money;
use App\User;
use Illuminate\Support\Facades\DB;



class AdminController extends Controller
{
  public function __construct()
    {
      $this->middleware('admin');
    }

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



}
