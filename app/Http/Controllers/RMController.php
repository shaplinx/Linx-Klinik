<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;

class RMController extends Controller
{
    public function index() {
        $rms = ambil_semuadata('rm');
        $metadatas = ambil_satudata('metadata',12);
        return view('rm', compact('rms','metadatas'));
    }
    public function hapus_rm($id)
    {
        DB::table('rm')->where('id',$id)->update([
            'deleted' => 1,
        ]);
        $pesan="Data pasien berhasil dihapus!";
        return redirect ('rm')->with('pesan', $pesan);
    }
    public function update_rm(Request $request)
    {
        $this->validate($request, [
            'idpasien' => 'required|numeric|digits_between:1,4',
            'keluhan_utama' => 'required|max:40',
            'anamnesis' => 'required|max:1000',
            'px_fisik' => 'required|max:1000',
            'diagnosis' => 'required|max:40',
            'dokter' => 'required',
        ]);
       // Decoding array input pemeriksaan lab
       if (isset($request->lab))
       {
            if (has_dupes(array_column($request->lab,'id'))){
                $errors = new MessageBag(['lab'=>['Lab yang sama tidak boleh dimasukan berulang']]);
                return back()->withErrors($errors);
            }


            $this->validate($request, [
                'lab.*.hasil' => 'required|numeric|digits_between:1,4',          
            ]);
            $lab_id = decode('lab','id',$request->lab);
            $lab_hasil = decode('lab','hasil',$request->lab);
       }
       else {
        $lab_id ="";
        $lab_hasil ="";
       }

       // Decoding array input resep
       if (isset($request->resep))
        {
            if (has_dupes(array_column($request->resep,'id'))){
                $errors = new MessageBag(['resep'=>['resep yang sama tidak boleh dimasukan berulang']]);
                return back()->withErrors($errors);
            }
            $this->validate($request, [
                'resep.*.jumlah' => 'required|numeric|digits_between:1,3',
                'resep.*.aturan' => 'required',
            ]);
            $resep_id = decode('resep','id',$request->resep);
            $resep_jumlah = decode('resep','jumlah',$request->resep);
            $resep_dosis = decode('resep','aturan',$request->resep); 
        }
        else {
            $resep_id = "";
            $resep_jumlah = "";
            $resep_dosis = "";
        }
        
        $newresep = array();

        $oldresep=array_combine(encode(get_value('rm',$request->id,'resep')),encode(get_value('rm',$request->id,'jumlah')));
        foreach ($request->resep as $resep){
            $newresep[$resep['id']] = $resep['jumlah'];
            
        }
        if (empty($oldresep)) {
            $resultanresep = resultan_resep($oldresep,$newresep);
        }
        else {$resultanresep=$newresep;}
        $errors = validasi_stok($resultanresep);
        if ($errors !== NULL) {
          return  back()->withErrors($errors);
        }
  
        foreach ($resultanresep as $key => $value) {
            $perintah=kurangi_stok($key,$value);
            if ($perintah === false) { $habis = array_push($habis,$key); }
        }
   
   
        DB::table('rm')->where('id',$request->id)->update([
            'idpasien' => $request->idpasien,
            'ku' => $request->keluhan_utama,
            'anamnesis' => $request->anamnesis,
            'pxfisik' => $request->px_fisik,
            'lab' => $lab_id,
            'hasil' => $lab_hasil,
            'diagnosis' => $request->diagnosis,
            'resep' => $resep_id,
            'jumlah' => $resep_jumlah,
            'aturan' => $resep_dosis,
            'dokter' => $request->dokter,
            'updated_time' => Carbon::now(),
        ]);
           
            switch($request->simpan) {
                case 'simpan_edit': 
                    $buka=route('rm.edit',$request->id);
                    $pesan='Data Rekam Medis berhasil disimpan!';
                break;             
                case 'simpan_baru': 
                    $buka=route('rm.tambah.id',$request->idpasien);
                    $pesan='Data Rekam Medis berhasil disimpan!';
                break;
            }
       
         return redirect($buka)->with('pesan',$pesan);        
        
    }
    //Hallaman Edit Pasien
    public function edit_rm($id)
    {
        if (Auth::User()->admin !== 1) {
            if (Auth::User()->profesi !== "Dokter") {
                abort(403, 'Anda Tidak berhak Mengakses Halaman Ini.');
            }
            $dokters=DB::table('rm')->select('dokter')->where('id',$id)->get();;
            foreach ($dokters as $dokter) {            
                if (Auth::User()->id !== $dokter->dokter) {
                abort(403, 'Anda Tidak berhak Mengakses Halaman Ini.');
                }
            }
        }
        
        $metadatas = ambil_satudata('metadata',13);
        $datas= ambil_satudata('rm',$id);
        if ($datas->count() <= 0) {
            return abort(404, 'Halaman Tidak Ditemukan.');
        }
        foreach ($datas as $data) {
            //mencari id pasien dari id RM
             if ($data->idpasien != NULL) {$idpasien = $data->idpasien;  $idens=DB::table('pasien')->where('id',$idpasien)->get();}
             if ($data->lab != NULL) {
                //mengcovert data lab di tabel RM kedalam arry
                $data->labhasil=array_combine(encode($data->lab),encode($data->hasil));
                $num['lab']=sizeof($data->labhasil);
             }
             else {
                $num['lab']=0;
             }
             if ($data->resep != NULL) {
                $data->allresep=array_combine(encode($data->resep),encode($data->aturan));
                $data->jum=encode($data->jumlah);
                $num['resep']=sizeof($data->allresep);
             }
             else {
                $num['resep']=0;
             }
        }
        $dokters = DB::table('users')->where('profesi','Dokter')->get();
        $labs = ambil_semuadata('lab');
        $obats = ambil_semuadata('obat');
       
      return view('edit-rm',compact('metadatas','idens','datas','labs','obats','num','dokters'));
    }
    
    public function list_rm($idpasien)
    {
        $metadatas = ambil_satudata('metadata',12);
        $idens = ambil_satudata('pasien',$idpasien);
        if ($idens->count() <= 0) {
            return abort(404, 'Halaman Tidak Ditemukan.');
        }
        $rms = DB::table('rm')->where('idpasien',$idpasien)->get();

        return view('list-rm',compact('metadatas','idens','rms'));

    }
    
    public function tambah_rm()
    {
        $metadatas = ambil_satudata('metadata',11);
        $pasiens = ambil_semuadata('pasien');
        $cont=[
          'aria'=>'true',
          'show'=>'show',
          'col'=>''  
        ];
        return view('tambah-rm',compact('metadatas','pasiens','cont'));  
    }
    
        public function tambah_rmid($idpasien)
    {
        $metadatas = ambil_satudata('metadata',11);
        $pasiens = ambil_semuadata('pasien');
        $idens = ambil_satudata('pasien',$idpasien);
        $labs = ambil_semuadata('lab');
        $obats = ambil_semuadata('obat');
        $dokters = DB::table('users')->where('profesi','Dokter')->get();
        $cont=[
          'aria'=>'false',
          'show'=>'',
          'col'=>'collapsed'  
        ];
        return view('tambah-rm',compact('metadatas','idens','pasiens','cont','labs','obats','dokters'));  
    }
    
           public function simpan_rm(Request $request)
    {  

        $this->validate($request, [
            'idpasien' => 'required|numeric|digits_between:1,4',
            'keluhan_utama' => 'required|max:40',
            'anamnesis' => 'required|max:1000',
            'px_fisik' => 'max:1000',
            'diagnosis' => 'max:40',
            'dokter' => 'required',
        ]);
       // Decoding array input pemeriksaan lab
       if (isset($request->lab))
       {
            if (has_dupes(array_column($request->lab,'id'))){
                $errors = new MessageBag(['lab'=>['Lab yang sama tidak boleh dimasukan berulang']]);
                return back()->withErrors($errors);
            }
            $this->validate($request, [
                'lab.*.hasil' => 'required|numeric|digits_between:1,4',          
            ]);
            $lab_id = decode('lab','id',$request->lab);
            $lab_hasil = decode('lab','hasil',$request->lab);
       }
       else {
        $lab_id ="";
        $lab_hasil ="";
       }

       // Decoding array input resep
       if (isset($request->resep))
        {
            if (has_dupes(array_column($request->resep,'id'))){
                $errors = new MessageBag(['resep'=>['resep yang sama tidak boleh dimasukan berulang']]);
                return back()->withErrors($errors);
            }
            $this->validate($request, [
                'resep.*.jumlah' => 'required|numeric|digits_between:1,3',
                'resep.*.aturan' => 'required',
            ]);
            $resep_id = decode('resep','id',$request->resep);
            $resep_jumlah = decode('resep','jumlah',$request->resep);
            $resep_dosis = decode('resep','aturan',$request->resep); 
        }
        else {
            $resep_id = "";
            $resep_jumlah = "";
            $resep_dosis = "";
        }
        $newresep = array();
        $oldresep=array();
        foreach ($request->resep as $resep){
            $newresep[$resep['id']] = $resep['jumlah'];
            
        }
        if (empty($oldresep)) {
            $resultanresep = resultan_resep($oldresep,$newresep);
        }
        else {$resultanresep=$newresep;}
        $errors = validasi_stok($resultanresep);
        if ($errors !== NULL) {
          return  back()->withErrors($errors);
        }
  
        foreach ($resultanresep as $key => $value) {
            $perintah=kurangi_stok($key,$value);
            if ($perintah === false) { $habis = array_push($habis,$key); }
        }
   
        DB::table('rm')->insert([
            'idpasien' => $request->idpasien,
            'ku' => $request->keluhan_utama,
            'anamnesis' => $request->anamnesis,
            'pxfisik' => $request->px_fisik,
            'lab' => $lab_id,
            'hasil' => $lab_hasil,
            'diagnosis' => $request->diagnosis,
            'resep' => $resep_id,
            'jumlah' => $resep_jumlah,
            'aturan' => $resep_dosis,
            'dokter' => $request->dokter,
            'created_time' => Carbon::now(),
            'updated_time' => Carbon::now(),
        ]);
    
           $ids= DB::table('rm')->latest('created_time')->first();         
            switch($request->simpan) {
                case 'simpan_edit': 
                    $buka=route('rm.edit',$ids->id);
                    $pesan='Data Rekam Medis berhasil disimpan!';
                break;             
                case 'simpan_baru': 
                    $buka=route('rm.tambah.id',$request->idpasien);;
                    $pesan='Data Rekam Medis berhasil disimpan!';
                break;
            }
       
         return redirect($buka)->with('pesan',$pesan);
         
    }
    
    public function tagihan($id)
    {
        $metadatas = ambil_satudata('metadata',14);
        $datas= ambil_satudata('rm',$id);
        foreach ($datas as $data) {
            //mencari id pasien dari id RM
             $idpasien = $data->idpasien;
             $labs_id= encode($data->lab);
             $obats_id=encode($data->resep);
             $jumlah_obat=encode($data->jumlah);
        }             
        $idens=DB::table('pasien')->where('id',$idpasien)->get();
        
        $items = array();
        $jasa=DB::table('pengaturan')->select('jasa')->first();
        foreach ($jasa as $j) {
            $items['Jasa Dokter'] = [$j,1,$j * 1];
        }
        
        foreach ($labs_id as $lab_id) {
            $entries = ambil_satudata ('lab',$lab_id);
                foreach ($entries as $entry) {
                    $items[$entry->nama] = [$entry->harga, $n=1, $entry->harga * $n];
                }
                
        }
        
        for ($i=0;$i<sizeof($obats_id);$i++) {
            $entries = ambil_satudata ('obat',$obats_id[$i]);
                foreach ($entries as $entry) {
                    $items[$entry->nama_obat] = [$entry->harga, $n=$jumlah_obat[$i], $entry->harga * $n];
                }
                
        }
        

        return view('tagihan',compact('metadatas','idens','items'));      
        
    }
    
        public function lihat_rm($id)
    {
        $metadatas = ambil_satudata('metadata',15);
        $datas= ambil_satudata('rm',$id);
        if ($datas->count() <= 0) {
            return abort(404, 'Halaman Tidak Ditemukan.');
        }
        foreach ($datas as $data) {
            //mencari id pasien dari id RM
             $idpasien = $data->idpasien;
             if ($data->lab != NULL) {
                //mengcovert data lab di tabel RM kedalam arry
                $data->labhasil=array_combine(encode($data->lab),encode($data->hasil));
                $num['lab']=sizeof($data->labhasil);
             }
             else {
                $num['lab']=0;
             }
             if ($data->resep != NULL) {
                $data->allresep=array_combine(encode($data->resep),encode($data->aturan));
                $data->jum=encode($data->jumlah);
                $num['resep']=sizeof($data->allresep);
             }
             else {
                $num['resep']=0;
             }
        }
        $labs = ambil_semuadata('lab');
        $obats = ambil_semuadata('obat');
        $idens=DB::table('pasien')->where('id',$idpasien)->get();
      return view('lihat-rm',compact('metadatas','idens','datas','labs','obats','num'));
    }
}