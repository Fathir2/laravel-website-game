<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class GameController extends Controller
{
   
    public function index()
    {
    	// mengambil data dari table
    	$game = DB::table('game')->get();
 
    	// mengirim data ke view
    	return view('VGame',['game' => $game]);
 
    }

    public function tambah(Request $request)
    {
    	DB::table('game')->insert([
			'kd_game' => $request->kd_game,
			'nama_game' => $request->nama_game,
            'desk_game' => $request->desk_game,
            'link_game' => $request->link_game

		]);
		// alihkan halaman ke halaman berita
		return redirect('/game');
 
    }
    public function hapus(Request $request)
    {
		$kd_game=$request->kd_game;
		DB::table('game')->where('kd_game',$kd_game)->delete();

		// alihkan halaman ke halaman berita
		return redirect('/game');
 
    }
   
	public function edit(Request $request)
    {
    	DB::table('game')->where('kd_game',$request->kd_game)->update([
		 
	    'kd_game' => $request->kd_game, 
		'nama_game' => $request->nama_game,
		'desk_game' => $request->desk_game,
		'link_game' => $request->link_game,
       
	  ]);
		// alihkan halaman ke halaman berita
		return redirect('/game');
 
    }
}
