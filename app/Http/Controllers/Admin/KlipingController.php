<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KlipingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function read(){
        $kliping = DB::table('kliping')->orderBy('tanggal', 'desc')->get(); // Pastikan data diambil dengan get()
        return view('admin.kliping.index', compact('kliping'));
    }

    public function add(){
        return view('admin.kliping.tambah');
    }

    public function create(Request $request){
        $dokumen = $request->file('file');
        if ($request->hasFile('file')) {
            $name = uniqid().".".$dokumen->getClientOriginalExtension();
            $dokumen->move(public_path() . "/public/kliping",$name);
            DB::table('kliping')->insert([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'file' => $name]);
        }

        return redirect('/admin/kliping')->with("success","Data Berhasil Ditambah !");
    }
    public function detail($id){
        $kliping = DB::table('kliping')->where('id', $id)->first();
        if (!$kliping) {
            return redirect('/admin/kliping')->with("error", "Data tidak ditemukan!");
        }
        return view('admin.kliping.detail', compact('kliping'));
    }

    public function edit($id){
        $kliping = DB::table('kliping')->where('id', $id)->first();
        if (!$kliping) {
            return redirect('/admin/kliping')->with("error", "Data tidak ditemukan!");
        }
        return view('admin.kliping.edit', compact('kliping'));
    }

    public function update(Request $request, $id) {
        $kliping = DB::table('kliping')->find($id);
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($kliping->file != "") {
                unlink(public_path('public/kliping/' . $kliping->file));
            }

            // Simpan file baru
            $file = $request->file('file');
            $name = uniqid() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('public/kliping'), $name);

            // Update data kliping dengan file baru
            DB::table('kliping')
                ->where('id', $id)
                ->update([
                    'judul' => $request->judul,
                    'tanggal' => $request->tanggal,                    
                    'file' => $name
                ]);
        } else {
            // Update data kliping tanpa file
            DB::table('kliping')
                ->where('id', $id)
                ->update([
                    'judul' => $request->judul,
                    'tanggal' => $request->tanggal,
                ]);
        }
        return redirect('/admin/kliping')->with('success', 'Data Berhasil Diupdate !');
    }


    public function delete($id)
    {
        $kliping = DB::table('kliping')->where('id', $id)->first();
        if (!$kliping) {
            return redirect('/admin/kliping')->with("error", "Data tidak ditemukan!");
        }

        // Hapus file jika ada
        if ($kliping->file && Storage::exists('public/kliping/' . $kliping->file)) {
            Storage::delete('public/kliping/' . $kliping->file);
        }

        DB::table('kliping')->where('id', $id)->delete();

        return redirect('/admin/kliping')->with("success", "Data Berhasil Dihapus !");
    }
}
