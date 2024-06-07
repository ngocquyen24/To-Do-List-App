<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.user.user',compact('users'));
    }
    public function edit(User $user){

          return view('admin.user.edit', compact('user'));

    }
    public function update(Request $request,User $user){
        $request->validate([
            'name' => ['required'],
            'email' => ['required|email|unique:users'],
            'avatar' => ['required|mimes:jpeg,jpg,png,gif|max:1000'],
            'phone' => ['required'],
            'role' => ['required'],

        ]);
        if($request->hasfile('avatar')){
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('avatars/', $filename);
            $user->avatar = $filename;
            $user->update([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'avatar' =>  $filename,
                'phone' => $request->get('phone'),
                'role' => $request->get('role'),

            ]);
        }else{
            $user->update([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'role' => $request->get('role'),
            ]);
        }
       
        return redirect('/admin/user/');

    }

    public function delete(User $user){
        $user->delete();
        return redirect()->back();

    }


}
