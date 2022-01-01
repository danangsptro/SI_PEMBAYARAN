<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = User::with([])->get();
        return view('backend.siswa.index', compact('siswa'));
    }

    public function storeSiswa(Request $request, $id=null)
    {
        try {
            // Validator::make($request->all(),[
            //     'name' => 'required|string|max:255',
            //     'nisn'  => 'required',
            //     'jk' => 'required',
            //     'email' => 'required|string|email|max:255',
            //     'password' => ''
            // ])->validate();
    
    
            if($id){
                $user = User::where('id', $id)->with([])->first();
                if(!$user){
                    return redirect()->back()->with([
                        'message'   => 'Tidak ada siswa dengan id tersebut',
                        'style'     => 'danger' 
                    ]);
                }
                $user->name = $request->name;
                $user->role = "Siswa";
                $user->nisn = $request->nisn;
                $user->jk = $request->jk;
                $user->password_exist = $request->password_exist;
                $user->password = Hash::make($request->password_exist);
                $user->save(); 
    
                return redirect()->back()->with([
                    'message'   => 'Update siswa success',
                    'style'     => 'success' 
                ]);
    
            }
            $user = new User();
            $user->name = $request->name;
            $user->role = "Siswa";
            $user->nisn = $request->nisn;
            $user->jk = $request->jk;
            $user->email = $request->email;
            $user->password = Hash::make('qwerty');
            $user->save();
            
            return redirect()->back()->with([
                'style' => 'success',
                'message' => "Data Successfully Added"
            ]);
        } catch (Exception $e) {
            $message = $e->getMessage();
            return redirect()->back()->with([
                'style' => 'danger',
                'message' => $message
            ]);
        }
    }
    
    public function deleteSiswa($id)
    {
        try {
            $user = User::where('id', $id)->with([])->first();
            $user->delete();
            return redirect()->back()->with([
                'style' => 'success',
                'message' => "Delete siswa Successfully"
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'style' => 'success',
                'message' => "Delete siswa error :".$e->getMessage()
            ]);
        }
    }

    public function settingProfile($id) 
    {
        $siswa = User::with([])->where('id', $id)->first();
        return view('backend.siswa.edit', compact('siswa'));
    }

    public function updateProfile(Request $request, $id=null)
    {
        try {
            $siswa = User::with([])->where('id', $id)->first();
            $siswa->name = $request->name;
            $siswa->nisn = $request->nisn;
            $siswa->jk = $request->jk;
            if ($request->email != $siswa->email) {
                $siswa->email = $request->email;
            }
            $siswa->password_exist = $request->password_exist;
            $siswa->password = Hash::make($request->password_exist);
            $siswa->save();
            return redirect()->back()->with([
                'style' => 'success',
                'message' => "Update profile siswa Successfully"
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'style' => 'success',
                'message' => "Update profile siswa error :".$e->getMessage()
            ]);
        }
        
    }
}
