<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller {


    public function index(Request $request)
    {
        $section 		= 'cadastro';
        $title_section 	= 'Informações';
        return view('site.home',compact('section','title_section'));
       
    }
    public function cadastro(Request $request)
    {
        $section 		= 'cadastro';
        $title_section 	= 'Informações';
        return view('site.cadastro',compact('section','title_section'));
       
    }
    public function dados_bancarios(Request $request)
    {
        $section 		= 'cadastro';
        $title_section 	= 'Área do usuário';
        return view('site.dados_bancarios',compact('section','title_section'));
       
    }
    public function edit(Request $request)
    {
        $section 		= 'cadastro';
        $title_section 	= 'Área do usuário';
        return view('site.edit',compact('section','title_section'));
       
    }
    public function nova_senha(Request $request)
    {
        $section 		= 'cadastro';
        $title_section 	= 'Senha';
        return view('site.nova_senha',compact('section','title_section'));
       
    }
    public function transferencia(Request $request)
    {
        $section 		= 'cadastro';
        $title_section 	= 'RESGATAR VALORES';
        return view('site.nova_senha',compact('section','title_section'));
       
    }
    public function logado(Request $request)
    {
        $section 		= 'cadastro';
        $title_section 	= 'Área do usuário';
        return view('site.logado',compact('section','title_section'));
       
    }
    public function resgatar(Request $request)
    {
        $section 		= 'cadastro';
        $title_section 	= 'RESGATAR vALORES';
        return view('site.resgatar',compact('section','title_section'));
       
    }
}
