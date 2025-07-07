<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class PadangpanjangtvController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function read()
    {
        $padangpanjangtv = DB::table('padangpanjangtv')->orderBy('id', 'DESC')->get();
        return view('admin.padangpanjangtv.index', compact('padangpanjangtv'));
    }

    public function add()
    {
        return view('admin.padangpanjangtv.tambah');
    }

    public function create(Request $request)
    {
        // Validasi form input
        $request->validate([
            'judul' => 'required|string|max:255',
            'link' => 'required|url',
        ]);

        // Simpan ke database
        DB::table('padangpanjangtv')->insert([
            'judul' => $request->input('judul'),
            'link' => $request->input('link'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.padangpanjangtv.read')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $padangpanjangtv = DB::table('padangpanjangtv')->where('id', $id)->first();
        if (!$padangpanjangtv) {
            return redirect()->route('admin.padangpanjangtv.read')->with('error', 'Data tidak ditemukan.');
        }

        return view('admin.padangpanjangtv.edit', compact('padangpanjangtv'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'link' => 'required|url',
        ]);

        DB::table('padangpanjangtv')->where('id', $id)->update([
            'judul' => $request->input('judul'),
            'link' => $request->input('link'),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.padangpanjangtv.read')->with('success', 'Data berhasil diperbarui!');
    }

    public function delete($id)
    {
        $deleted = DB::table('padangpanjangtv')->where('id', $id)->delete();

        if ($deleted) {
            return redirect()->route('admin.padangpanjangtv.read')->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect()->route('admin.padangpanjangtv.read')->with('error', 'Data tidak ditemukan.');
        }
    }
}
