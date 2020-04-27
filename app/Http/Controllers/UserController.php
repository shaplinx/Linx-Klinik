<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index() {
        $users=user::all();
        $metadatas= ambil_satudata('metadata',18);
        
        return view('auth.users',compact('metadatas','users'));
        
    }
    
        public function hapus($id) {
        $user=user::find($id);
        $user->delete();
        
        return redirect()->route('user')->with('pesan','Data Pengguna Berhasil Dihapus!') ;
        
    }
}
