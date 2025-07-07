<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function read(){
        $account = DB::table('users')->where('level','!=','1')->orderBy('id','DESC')->get();

        return view('admin.account.index',['account'=>$account]);
    }

    public function add(){
        return view('admin.account.tambah');
    }

    public function create(Request $request){
        DB::table('users')->insert([  
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'username' => $request->username,
            'level' => $request->level
        ]);

        return redirect('/admin/account')->with("success","Data Berhasil Ditambah !");
    }

    public function edit($id){
        $account= DB::table('users')->where('id',$id)->first();
        
        return view('admin.account.edit',['account'=>$account]);
    }

    public function update(Request $request, $id) {
        DB::table('users')  
            ->where('id', $id)
            ->update([
            'name' => $request->name,
            'username' => $request->username,
            'level' => $request->level
        ]);

        return redirect('/admin/account')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id)
    {
        DB::table('users')->where('id',$id)->delete();

        return redirect('/admin/account')->with("success","Data Berhasil Dihapus !");
    }

    public function reset($id){
        DB::table('users')  
            ->where('id', $id)
            ->update([
            'password' => bcrypt('Haqqgroup2025')]);

        return redirect('/admin/account')->with("success","Password Berhasil Direset ! | Password Default : Haqqgroup2025");
    }
}
