<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function simpan(Request $request)
    {
        $simpan = new Catatan();
        $simpan->feeling = $request->feeling;
        $simpan->isi = $request->isi;
        $simpan->save();
        return redirect()->back();
    }

    public function hapus($id)
    {
        $hapus = Catatan::find($id)-> delete();
        return redirect()->back();
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')->with([
            'datas'=> catatan::all()
        ]);
    }
}
