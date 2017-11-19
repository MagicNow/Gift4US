<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use URL;
use Auth;
use Session;
use Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use App\Models\User;
use Validator;

class AdminController extends Controller {
    public function index() {
        if (Auth::check()) {
            if(Auth::user()->first_access == 0){
                return view('auth.passwords.reset');  
            }else{
                return redirect ('/admin/users');
            }        
        } else {
            //dd(md5('123mkt456'));
            //dd(bcrypt('123mkt456'));
        	return view('auth.login');
        }
    }

    public function login() {
            //dd(bcrypt('123456'));
       // dd(Auth::attempt(['email' => request::input('username'), 'password' => request::input('password')]));
        if (Auth::attempt(['email' => request::input('username'), 'password' => request::input('password')])) {

            if(Auth::user()->first_access == 0){
                return view('auth.passwords.reset');  
            }else{
                return redirect ('/admin/users');
            }
            
        } else {
            $errors = 'Email e/ou senha inválidos'; 
            return Redirect::back()->withErrors($errors)->withInput(Input::except('password'));

        }
    }
    public function changePassword(){
        $dados = Input::all();
        $user = User::find(Auth::user()->id);

        $rules = array(
            'senha' => 'required|min:6|confirmed'
        );
        $validator = Validator::make($dados, $rules);

        if(!$validator->fails()){
            $user->password         = bcrypt($dados['senha']);
            $user->first_access     = 1;
            
            $user->save();

            return redirect ('/admin/users');
            
        }else{
            return Redirect::back()->withInput(Input::except('senha'))->withErrors($validator);
        }
    }
    public function logout() {
        
        Auth::logout();
        
        return redirect('/admin');
    }

}