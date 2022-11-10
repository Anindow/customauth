<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Authcontroller extends Controller
{
 public function index()
 {
    return view('login');
 }    

 public function login(Request $request){

$request->validate([
'name' => 'required',
'password'=> 'required'
]);

   if(\Auth::attempt($request->only('name','password'))){
            return redirect('home');
        }

        return redirect('login')->withError('Login details are not valid');

    }
 public function register_view()
 {
    return view('register');
 }
 public function register(Request $request){
    $request->validate([
        'name'=>'required',
        'email'=>'required',
        'password'=>'required'

    ]);
    user::create([
        'name'=> $request->name,
        'email'=> $request->email,
        'password'=> \Hash::make($request->password)
    ]);

    if(\Auth::attempt($request->only('name','password'))){
        return redirect('home');
        }
        return redirect('register')->withError('Error');
    
 }
 public function home(){
    return view ('home');
 }
 public function logout(){
    \Session::flush();
    \Auth::logout();
    return redirect('');
 }

}
