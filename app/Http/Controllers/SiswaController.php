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
        return view('backend.siswa.index');
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
                $user = User::where('id', $id)->with(['berita'])->first();
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
                $user->password = Hash::make($request->password);
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
            $user->password = Hash::make($request->password);
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
    
}
