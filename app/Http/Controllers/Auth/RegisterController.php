<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        //validation
       //dd($request->role_id);
        $this->validate($request, [
            'firstname'=>'required|max:255',
            'lastname'=>'required|max:255',
            'email' => 'required|email|max:255',
            'role_id' =>'nullable',
            'password' => 'required|confirmed', // polje confirmed poredi sa poljem password_confirmation u view-u i time vidi da li se pass i confirmed pass podudaraju
        ]);

        //store user
        User::create([
            'name' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'role_id' => 2,
            'password' => Hash::make($request->password),
        ]);

        //sign in user
        auth()->attempt($request->only('email','password'));
        
        return redirect()->route('posts');
        
    }
}
