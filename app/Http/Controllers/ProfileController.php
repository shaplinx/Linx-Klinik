<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Show the profile and edit profile page.
     *
     * @param  Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('auth.profile', [
            'user' => $request->user()
        ]);
    }
    
    public function edit($id)
    {
        $user=User::where('id',$id)->first();
        return view('auth.profile', [
            'user' => $user
        ]);
    }
    
    
    public function simpan(Request $data)
    {
  
        $this->validate($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($data->id),],
            'password' => $data->password != null ? ['sometimes', 'confirmed','min:8', 'same:password'] : '',
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($data->id),],
            'profesi' => ['required', 'string', 'max:255'],
            'avatar' => ['sometimes','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);
        if ($data->avatar !== NULL) {
            $avatarname='avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
            $data->avatar->storeAs('public/avatars',$avatarname);
            $oldpic = User::find($data->id)->select('avatar')->first();
            if ($oldpic->avatar == "default.jpg") {
                Storage::delete('public/avatars/'. $oldpic->avatar);
            }
            
            
            User::find($data->id)->update([
                'avatar' => $avatarname,               
                ]);
        }
        if($data['password'] !== NULL){
            User::find($data->id)->update([
                'password' => Hash::make($data['password']),               
                ]);
        }
        
        
        User::find($data->id)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'profesi' => $data['profesi'],
            
            
        ]);
        
        if ($data['admin'] !== NULL) {
            User::find($data->id)->update([
                'admin' => $data['admin'],
            ]);
        }

    return redirect()->route('dashboard')->with('pesan','Data Profil Berhasil Disimpan');
}
}
