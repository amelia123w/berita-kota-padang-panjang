<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Auth;

class BeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function read()
    {
        $berita = DB::table('berita')
            ->select('berita.*', 'opd.nama as nama_opd')
            ->join('opd', 'opd.id', '=', 'berita.opd')
            ->orderBy('id', 'DESC')
            ->get();

        return view('admin.berita.index', compact('berita'));
    }

    public function add()
    {
        $opd = DB::table('opd')->get();
        return view('admin.berita.tambah', compact('opd'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'deskripsi' => 'required|string',
            'opd' => 'required|exists:opd,id',
            'sumberberita' => 'required|string|max:255',
            'penulisberita' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fotoName = null;
        if ($request->hasFile('foto')) {
            $dokumen = $request->file('foto');
            $fotoName = uniqid() . "." . $dokumen->getClientOriginalExtension();
            $dokumen->move(public_path("berita"), $fotoName);
        }

        DB::table('berita')->insert([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'opd' => $request->opd,
            'sumberberita' => $request->sumberberita,
            'penulisberita' => $request->penulisberita,
            'foto' => $fotoName
        ]);

        return redirect('/admin/berita')->with("success", "Data Berhasil Ditambah !");
    }

    public function edit($id)
    {
        $berita = DB::table('berita')->where('id', $id)->first();
        $opd = DB::table('opd')->get();
        if (!$berita) {
            return redirect('/admin/berita')->with('error', 'Data tidak ditemukan!');
        }
        return view('admin.berita.edit', compact('berita', 'opd'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'deskripsi' => 'required|string',
            'opd' => 'required|exists:opd,id',
            'sumberberita' => 'required|string|max:255',
            'penulisberita' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $berita = DB::table('berita')->where('id', $id)->first();
        if (!$berita) {
            return redirect('/admin/berita')->with('error', 'Data tidak ditemukan!');
        }

        $fotoName = $berita->foto;
        if ($request->hasFile('foto')) {
            if ($fotoName && File::exists(public_path("berita/{$fotoName}"))) {
                File::delete(public_path("berita/{$fotoName}"));
            }

            $dokumen = $request->file('foto');
            $fotoName = uniqid() . "." . $dokumen->getClientOriginalExtension();
            $dokumen->move(public_path("berita"), $fotoName);
        }

        DB::table('berita')->where('id', $id)->update([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'opd' => $request->opd,
            'sumberberita' => $request->sumberberita,
            'penulisberita' => $request->penulisberita,
            'foto' => $fotoName
        ]);

        return redirect('/admin/berita')->with("success", "Data Berhasil Diupdate!");
    }

    public function delete($id)
    {
        $berita = DB::table('berita')->where('id', $id)->first();
        if (!$berita) {
            return redirect('/admin/berita')->with('error', 'Data tidak ditemukan!');
        }

        if ($berita->foto && File::exists(public_path("berita/{$berita->foto}"))) {
            File::delete(public_path("berita/{$berita->foto}"));
        }

        DB::table('berita')->where('id', $id)->delete();

        return redirect('/admin/berita')->with("success", "Data Berhasil Dihapus !");
    }
}
