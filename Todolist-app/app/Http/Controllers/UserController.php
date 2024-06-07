<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $user = User::find(auth()->user()->id);
        return view('user.index', compact('user'));
    }

    public function edit(){
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
                return view('user.edit', compact('user'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }

    public function update(Request $request){
        $user = User::find(Auth::user()->id);
        if($user){
            $validate = null;
            if(Auth::user()->email === $request->get('email')){
                $validate = $request->validate([
                    'name'=>['required','min:3'],
                    'email'=>['required','email'],
                    'phone'=>['required','min:10'],
                    'avatar'=>['required|mimes:jpeg,jpg,png,gif|max:1000'],
                ]);
            }else{
                $validate = $request->validate([
                    'name'=>['required','min:3'],
                    'email'=>['required','email', 'unique:users'],
                    'phone'=>['required','min:10'],
                    'avatar'=>['required|mimes:jpeg,jpg,png,gif|max:1000'],
                ]);
            }
            if($validate){
                if($request->hasfile('avatar')){
                    $file = $request->file('avatar');
                    $ext = $file->getClientOriginalExtension();
                    $filename = time().'.'.$ext;
                    $file->move('avatars/', $filename);
                    $user->avatar = $filename;

                    $user->update([
                        'name'=>$request->get('name'),
                        'email'=>$request->get('email'),
                        'phone'=>$request->get('phone'),
                        'avatar'=>$filename,

                    ]);
                }else{
                    $user->update([
                        'name'=>$request->get('name'),
                        'email'=>$request->get('email'),
                        'phone'=>$request->get('phone'),
                    ]);
                }





                return redirect()->back()->with('success','Profile info updated successfully!');
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }

    public function passwordEdit(){


        if(Auth::user()){

            $user = User::find(Auth::user()->id);
            if($user){
                return view('user.password',compact('user'));

            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }

    public function passwordUpdate(Request $request){
        $validate = $request->validate([
            'oldPassword'=>'required|min:7',
            'password'=>'required|min:7|required_with:password_confirmation'
        ]);
        $user = User::find(Auth::user()->id);

        if($user){
            if(Hash::check($request->get('oldPassword'), $user->password) && $validate){
                $user->password = Hash::make($request->get('password'));
                $user->save();
                return redirect()->back()->with('msg', 'Your password has been updated successfully!');
            }else{
                return redirect()->back()->with('error', 'The password you entered does not match your current password');
            }
        }
    }
}
