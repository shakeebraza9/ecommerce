<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Password;

class WebAuthController extends Controller
{
    public function login()
    {

        if (Auth::check()){
            $role_id = Auth::user()->role_id;
            if ($role_id == 0) {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/dashboard');
            }
        }
        // $users = User::all();
        // return view('theme.login',compact('users'));
        return view('theme.login');
    }
    public function register()
    {

        if (Auth::check()){
             return redirect('/dashboard'); 
        }
       
        return view('theme.register');
    }

    public function createAccount(Request $request)
    {

        Validator::extend('case_insensitive_confirmation', function ($attribute, $value, $parameters, $validator) {
                return strtolower($value) === strtolower($validator->getData()[$parameters[0]]);
        });
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'Password' => 'required|string|min:8|max:255|case_insensitive_confirmation:password_confirmation',
        ]);
    
        if ($validator->fails()) {
            
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        
        // dd($request->Password);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->Password),
            'role_id' => 1, // Assuming 'customer' role has id 1
            'created_by' => 0, 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        return redirect('/login')->with('success', 'Account created successfully. You can now login.');
    }
    public function webLogin(Request $request)
    {
        if (Auth::check()) {
            $role_id = Auth::user()->role_id;
            if ($role_id == 0) {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/dashboard');
            }
        }
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|max:255',
        ]);
        
        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        
        
        $user = User::where('email',$request->email)->first();
        // dd($user);
        if($user == null ){
            return back()
            ->withErrors([
                "email" => ["Wrong Email or password"]
                ])->withInput();
            }
        if($user->role_id == 0){
            return back()
            ->withErrors([
                "email" => ["Enter a valid user email !"]
                ])->withInput();
        }
            if(Hash::check($request->password, $user->password)) {
               
            
            if (Auth::attempt([
                'email' =>$request->email,
                'password' => $request->password])){
                    if($user->role_id == 1){
                        return redirect('/dashboard'); 
                        
                    }else{
                        return redirect('/admin/dashboard'); 

                    }
            }

        } else {

               return back()
                ->withErrors([
                    "password" => ["Wrong Password"]
                ])->withInput();
        }


    }

    public function forgotPassword()
    {
        return view('theme.forgot_password');
    }

    public function dashboard()
    {
        return view('theme.dashboard');
    }
    
    public function weblogout()
    {
        Auth::logout();
        return redirect('/login');
    }
  
 /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Send the password reset link
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Check if the password reset link was sent successfully
        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', __($status));
        } else {
            return back()->withErrors(['email' => __($status)]);
        }
    }
  
}
