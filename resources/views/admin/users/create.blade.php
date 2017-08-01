@extends('admin.app')

@section('htmlheader_title')
   Novo Usuário
@endsection
@section('contentheader_title')
    Novo Usuário
@endsection


@section('main-content')
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $message)
                {!! $message!!}<br />
            @endforeach
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    {!! Form::open(array('route' => array('admin.users.store',isset($user->id) ? $user->id : ''),'id'=>'form-users','method' => 'POST','files'=>false)) !!}
       {{--  <div class="form-group col-xs-12">
            {!! Form::label('type', 'Tipo Usuário') !!}
            {!! Form::select('type', $types, isset($user->type) ? $user->type : '', ['placeholder' => 'Tipo Usuário*', 'class' => 'form-control select2','id' => 'type']) !!}
        </div> --}}
        <div class="form-group col-xs-12">
            <label for="">Nome</label>
            {!! Form::text('nome',isset($user->name) ? $user->name : '',array('class' => 'form-control','placeholder'=>'Nome usuário*','id'=>'nome') )!!}
        </div>
        <div class="form-group col-xs-12">
            <label for="">Email</label>
            {!! Form::text('email',isset($user->email) ? $user->email : '',array('class' => 'form-control','placeholder'=>'Email*','id'=>'email') )!!}
        </div>

        <div class="form-group col-xs-12">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
	{!! Form::close() !!}
@endsection