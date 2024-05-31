<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class CustomAuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }  
      
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.registration');
    }
      
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'image' => ['image'],
            
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        if(request()->hasfile('avatar')){
            $avatarName = time().'.'.request()->avatar->getClientOriginalExtension();
            request()->avatar->move(public_path('avatars'), $avatarName);
        }

      return User::create([
        'name' => $data['name'],
        'avatar' => $avatarName ?? NULL,
        'phone' => $data['phone'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])

      ]);
    }    
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('changeuser');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }


    public function show()
    {
        $users = User::paginate(1);
        $user = Auth::user();
        return view('viewuser', [ 'nguoidung' => $user, 'users' => $users ]);
        
    }  
    public function destroy(User $user)
    {
        // Find the user and delete it
        $user->delete();

        // Redirect or respond with a success message
        return redirect('dashboard');
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required',
        ]);
        $user->name = $request->name;
    $user->email = $request->email;
    if ($request->has('password')) {
        $user->password = Hash::make($request->password);
    }
    $user->phone = $request->phone;
    // Update other fields as needed

    $user->save();

        $user->update($request->all());

        return redirect('dashboard');
    }
    
    public function edit(User $user)
    {
        return view('updateuser', compact('user'));
    }

    public function usershow(User $user)
    {
        // Fetch the user details from the database
        $user = User::findOrFail($user->id);

        // Return the view to display user details
        return view('usershow', ['user' => $user]);
    }
}
