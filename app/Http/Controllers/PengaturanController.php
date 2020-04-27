<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    public function index() {
        $metadatas =ambil_satudata('metadata',16);
        $datas=DB::table('pengaturan')->where('id',1)->get();
        
        return view('setting',['metadatas'=>$metadatas],['datas'=>$datas]);
    }
    public function simpan(Request $request){
            $this->validate($request, [
                'nama_klinik' => 'required|min:4|max:25',
                'slogan' => 'required',
                'logo' => 'required',
                'jasa' => 'required|numeric|digits_between:1,7',
                'gambar' => ['sometimes','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],

            ]);
            if ($request->gambarbool === NULL) {$request->gambarbool=0; }
           if ($request->gambar !== NULL) {
            $avatarname='logo'.time().'.'.request()->gambar->getClientOriginalExtension();
            $request->gambar->storeAs('public/logo',$avatarname);
            $oldpic = get_setting('gambar');
            Storage::delete('public/logo/'. $oldpic);

            
            
            DB::table('pengaturan')->where('id',1)->update([
                'gambar' => $avatarname,               
                ]);
        }
   
            DB::table('pengaturan')->where('id',1)->update([
                'n_Klinik' => $request->nama_klinik,
                'Slogan' => $request->slogan,
                'logo' => $request->logo,
                'jasa' => $request->jasa,
                'gambarbool' => $request->gambarbool,
            ]);
        return redirect(route('pengaturan'))->with('pesan',"Pengaturan Berhasil Disimpan!");
    }
}
