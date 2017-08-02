<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use URL;
use Auth;
use Session;
use Request;
use App\Models\User;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use Mail;
use App\Mail\EmailConfirm;

class UsersController extends Controller
{
    public function __construct()
    {
        if (Auth::check()) {
            return redirect()->route('admin.login');
        }
    }

    public function index()
    {
        $section = 'users';
        $users = User::where('id','<>',1)->get();
        return view('admin.users.list',compact('users','section'));
    }
    
   	public function create()
    {
        $section = 'users';
        $types = [1 => 'ADMIN', 2 => 'MODERADOR', 3 => 'MEDIADOR'];
        return view('admin.users.create', [
            'section' => $section,
            'types'   => $types,
        ]);
    }

    public function edit($id = null)
    {
        $user = User::find($id);
        $types = [1 => 'ADMIN', 2 => 'MODERADOR', 3 => 'MEDIADOR'];
       
        return view('admin.users.create', [
            'section' => 'users',
            'user'    => $user,
            'types'   => $types,
        ]);
    }

    public function destroy($id)
    {
        $entity = User::findOrFail($id);
        
        $entity->delete();
        return Redirect::route('admin.users')->with('sucess', 'Registro apagado com sucesso!');;
    }

    public function store(Request $request, $id = null){
        
        $dados = Input::all();

        if($id){
            $user = User::find($id);
            $rules = array(
                'nome'      =>'required',  
                'email'     =>'required|min:5|email|unique:users,email,'.$id,

            );
        }else{
            $user = new User;
            $rules = array(
                'nome'         =>'required',
                'email'        =>'required|min:5|email|unique:users,email',
             ); 
        }

        $messages = [
            'unique' => 'Este :attribute já foi cadastrado.',
        ];
        $validator = Validator::make($dados, $rules, $messages);

        

        if(!$validator->fails()){

            $user->name         = $dados['nome'];
            $user->email        = $dados['email'];
            $user->type         = 1;

            if(isset($dados['senha'])){
                $senha = bcrypt($dados['senha']);
                $user->password       = $senha;
            }else{
                $email              = true;
                $senha              = str_random(10);
                $user->password     = bcrypt($senha);
            }

            $user->save();

            if($email){
                $dados['title'] = 'Confirmação dos dados';
                $dados['body'] = 'Senha: ' . $senha;
                $dados['url'] = url('/');
                $dados['button'] = url('Acessar');

                Mail::to($dados['email'], $dados['nome'])
                    ->send(new EmailConfirm($dados));
            }
            
         
            return Redirect::route('admin.users')->with('sucess', 'Registro efetuado com sucesso!');
        }else{
            if($id){
                return Redirect::route('admin.users')
                ->withErrors($validator)
                ->withInput();
            }else{
                return Redirect::route('admin.users.create')
                ->withErrors($validator)
                ->withInput();
            }
            
            
        }
    }
}