<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class ObatController extends Controller
{
    public function index () 
    {    
        $metadatas = ambil_satudata('metadata',4);
        $obats = ambil_semuadata('obat');
        return view('obat',['obats'=> $obats],['metadatas'=>$metadatas]);   
    }
    
        public function tambah_obat () 
    {    
        $metadatas = ambil_satudata('metadata',5);
        return view('tambah-obat',['metadatas'=>$metadatas]); 
    }
    
       public function simpan_obat(Request $request)
    { 
        $this->validate($request, [
            'n_obat' => 'required|min:4|max:25',
            'sediaan' => 'required',
            'dosis' => 'required|numeric|digits_between:1,7',
            'satuan' => 'required',
            'harga' => 'required|numeric|digits_between:1,7',
            'stok' => 'required|numeric|digits_between:1,5'
        ]);
        DB::table('obat')->insert([
            'nama_obat' => $request->n_obat,
            'sediaan' => $request->sediaan,
            'dosis' => $request->dosis,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'created_time' => Carbon::now(),
            'updated_time' => Carbon::now(),
        ]);
           $ids= DB::table('obat')->orderby('id','desc')->first();         
            switch($request->simpan) {
                case 'simpan': 
                    $buka=route('obat.edit',$ids->id);
                    $pesan='Data obat berhasil disimpan!';
                break;             
                case 'simpan_baru': 
                    $buka=route('obat.tambah');
                    $pesan='Data obat berhasil disimpan!';
                break;
            }
        return redirect($buka)->with('pesan',$pesan);
    }
     //Proses Update Pasien
        public function update_obat(Request $request)
    {
            $this->validate($request, [
                'n_obat' => 'required|min:4|max:25',
                'sediaan' => 'required',
                'dosis' => 'required|numeric|digits_between:1,7',
                'satuan' => 'required',
                'harga' => 'required|numeric|digits_between:1,7',
                'stok' => 'required|numeric|digits_between:1,5'
            ]);
            
            DB::table('obat')->where('id',$request->id)->update([
                'nama_obat' => $request->n_obat,
                'sediaan' => $request->sediaan,
                'dosis' => $request->dosis,
                'satuan' => $request->satuan,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'updated_time' => Carbon::now()
            ]);
     
            switch($request->simpan) {
                 case 'simpan': 
                    $buka='/obat/edit/' . $request->id;
                    $pesan='Data pasien berhasil disimpan!';
                break;           
                case 'simpan_baru': 
                    $buka='/obat/tambah';
                    $pesan='Data pasien berhasil disimpan!';
                break;
            }
        return redirect($buka)->with('pesan',$pesan);
    }
    
    public function edit_obat($id)
    {
        $metadatas = ambil_satudata('metadata',6);
        $datas= ambil_satudata('obat',$id);
        if ($datas->count() <= 0) {
            return abort(404, 'Halaman Tidak Ditemukan.');
        }
        return view('edit-obat',['metadatas'=>$metadatas],['datas'=>$datas]);
    }
    
    public function hapus_obat($id)
    {
        DB::table('obat')->where('id',$id)->update([
            'deleted' => 1,
        ]);
        $pesan="Data obat berhasil dihapus!";
        return redirect(route("obat"))->with('pesan',$pesan);
    }
}
