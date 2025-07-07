<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BulletinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function read(){
        $bulletin = DB::table('bulletin')->orderBy('tanggal', 'desc')->get(); // Pastikan data diambil dengan get()
        return view('admin.bulletin.index', compact('bulletin'));
    }

    public function add(){
        return view('admin.bulletin.tambah');
    }

    public function create(Request $request){
        $dokumen = $request->file('file');
        if ($request->hasFile('file')) {
            $name = uniqid().".".$dokumen->getClientOriginalExtension();
            $dokumen->move(public_path() . "/public/bulletin",$name);
            DB::table('bulletin')->insert([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'file' => $name]);
        }

        return redirect('/admin/bulletin')->with("success","Data Berhasil Ditambah !");
    }

    public function detail($id){
        $bulletin = DB::table('bulletin')->where('id', $id)->first();
        if (!$bulletin) {
            return redirect('/admin/bulletin')->with("error", "Data tidak ditemukan!");
        }
        return view('admin.bulletin.detail', compact('bulletin'));
    }

    public function edit($id){
        $bulletin = DB::table('bulletin')->where('id', $id)->first();
        if (!$bulletin) {
            return redirect('/admin/bulletin')->with("error", "Data tidak ditemukan!");
        }
        return view('admin.bulletin.edit', compact('bulletin'));
    }

    public function update(Request $request, $id) {
        $bulletin = DB::table('bulletin')->find($id);
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($bulletin->file != "") {
                unlink(public_path('public/bulletin/' . $bulletin->file));
            }

            // Simpan file baru
            $file = $request->file('file');
            $name = uniqid() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('public/bulletin'), $name);

            // Update data bulletin dengan file baru
            DB::table('bulletin')
                ->where('id', $id)
                ->update([
                    'judul' => $request->judul,
                    'tanggal' => $request->tanggal,                    
                    'file' => $name
                ]);
        } else {
            // Update data bulletin tanpa file
            DB::table('bulletin')
                ->where('id', $id)
                ->update([
                    'judul' => $request->judul,
                    'tanggal' => $request->tanggal,
                ]);
        }
        return redirect('/admin/bulletin')->with('success', 'Data Berhasil Diupdate !');
    }


    public function delete($id)
    {
        $bulletin = DB::table('bulletin')->where('id', $id)->first();
        if (!$bulletin) {
            return redirect('/admin/bulletin')->with("error", "Data tidak ditemukan!");
        }

        // Hapus file jika ada
        if ($bulletin->file && Storage::exists('public/bulletin/' . $bulletin->file)) {
            Storage::delete('public/bulletin/' . $bulletin->file);
        }

        DB::table('bulletin')->where('id', $id)->delete();

        return redirect('/admin/bulletin')->with("success", "Data Berhasil Dihapus !");
    }
}
