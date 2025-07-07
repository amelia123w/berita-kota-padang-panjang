<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Majalah;
use App\Models\Bulletin;
use App\Models\Kliping;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('landing.home', [
            'beritas' => Berita::latest()->take(6)->get(),
            'majalahs' => Majalah::latest()->take(5)->get(),
            'bulletins' => Bulletin::latest()->take(5)->get(),
            'klipings' => Kliping::latest()->take(5)->get(),
            'logins' => Kliping::latest()->take(5)->get(),
            
        ]);
    }
}
