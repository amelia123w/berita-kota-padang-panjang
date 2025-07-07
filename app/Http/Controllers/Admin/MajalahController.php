<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MajalahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function read(){
        $majalah = DB::table('majalah')->orderBy('tanggal', 'desc')->get(); // Pastikan data diambil dengan get()
        return view('admin.majalah.index', compact('majalah'));
    }

    public function add(){
        return view('admin.majalah.tambah');
    }

    public function create(Request $request){
        $dokumen = $request->file('file');
        if ($request->hasFile('file')) {
            $name = uniqid().".".$dokumen->getClientOriginalExtension();
            $dokumen->move(public_path() . "/public/majalah",$name);
            DB::table('majalah')->insert([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'file' => $name]);
        }

        return redirect('/admin/majalah')->with("success", "Data Berhasil Ditambah !");
    }

    public function detail($id){
        $majalah = DB::table('majalah')->where('id', $id)->first();
        if (!$majalah) {
            return redirect('/admin/majalah')->with("error", "Data tidak ditemukan!");
        }
        return view('admin.majalah.detail', compact('majalah'));
    }

    public function edit($id){
        $majalah = DB::table('majalah')->where('id', $id)->first();
        if (!$majalah) {
            return redirect('/admin/majalah')->with("error", "Data tidak ditemukan!");
        }
        return view('admin.majalah.edit', compact('majalah'));
    }

    public function update(Request $request, $id) {
        $majalah = DB::table('majalah')->find($id);
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($majalah->file != "") {
                unlink(public_path('public/majalah/' . $majalah->file));
            }

            // Simpan file baru
            $file = $request->file('file');
            $name = uniqid() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('public/majalah'), $name);

            // Update data majalah dengan file baru
            DB::table('majalah')
                ->where('id', $id)
                ->update([
                    'judul' => $request->judul,
                    'tanggal' => $request->tanggal,                    
                    'file' => $name
                ]);
        } else {
            // Update data majalah tanpa file
            DB::table('majalah')
                ->where('id', $id)
                ->update([
                    'judul' => $request->judul,
                    'tanggal' => $request->tanggal,
                ]);
        }
        return redirect('/admin/majalah')->with('success', 'Data Berhasil Diupdate !');
    }


    public function delete($id)
    {
        $majalah = DB::table('majalah')->where('id', $id)->first();
        if (!$majalah) {
            return redirect('/admin/majalah')->with("error", "Data tidak ditemukan!");
        }

        // Hapus file jika ada
        if ($majalah->file && Storage::exists('public/majalah/' . $majalah->file)) {
            Storage::delete('public/majalah/' . $majalah->file);
        }

        DB::table('majalah')->where('id', $id)->delete();

        return redirect('/admin/majalah')->with("success", "Data Berhasil Dihapus !");
    }
}
