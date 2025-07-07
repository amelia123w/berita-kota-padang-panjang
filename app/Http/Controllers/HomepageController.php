<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
use File;
use PDF;

class HomepageController extends Controller
{

    public function invoice($id){
        $transaksi = DB::table('transaksi')->where('id',$id)->first();
        $detail_transaksi = DB::table('detail_transaksi')->where('id_transaksi',$transaksi->id)->orderBy('id','DESC')->get();
        $member = DB::table('member')->where('id',$transaksi->id_member)->first();
        $kasir = DB::table('users')->find($transaksi->id_user);

        $pdf = PDF::loadview('admin.transaksi.invoice',['transaksi'=>$transaksi,'member'=>$member,'kasir'=>$kasir,'detail_transaksi'=>$detail_transaksi]);
        $pdf->setPaper('A4', 'portrait');

        return $pdf->stream('Invoice Transaksi '.$transaksi->nama.'.pdf');
    }
}