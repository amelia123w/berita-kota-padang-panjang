<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class OPDController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function read(){
        $opd = DB::table('opd')->orderBy('id','DESC')->get();

        return view('admin.opd.index',['opd'=>$opd]);
    }

    public function add(){
        return view('admin.opd.tambah');
    }

    public function create(Request $request){
        DB::table('opd')->insert([  
            'nama' => $request->nama]);

        return redirect('/admin/opd')->with("success","Data Berhasil Ditambah !");
    }

    public function edit($id){
        $opd = DB::table('opd')->where('id',$id)->first();
        
        return view('admin.opd.edit',['opd'=>$opd]);
    }

    public function update(Request $request, $id) {
        DB::table('opd')  
            ->where('id', $id)
            ->update([
            'nama' => $request->nama]);

        return redirect('/admin/opd')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id)
    {
        DB::table('opd')->where('id',$id)->delete();

        return redirect('/admin/opd')->with("success","Data Berhasil Dihapus !");
    }
}
