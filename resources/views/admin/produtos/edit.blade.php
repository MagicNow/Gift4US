@extends('admin.app')

@section('htmlheader_title')
    {{$user->name}}
@endsection
@section('contentheader_title')
@endsection


@section('main-content')
    @if(count($errors) > 0)
        {{-- <div class="alert alert-danger">Preencha corretamente todos os campos</div> --}}
        <div class="alert alert-danger">
            @foreach ($errors->all() as $message)
                {!! $message!!}<br />
            @endforeach
        </div>
        
    @endif
    @if (session('sucess'))
        <div class="alert alert-success">
            {{ session('sucess') }}
        </div>
    @endif
    {!! Form::open(array('route' => array('admin.users.store',isset($user->id) ? $user->id : ''),'method' => 'POST','files'=>true)) !!}


        <div class="form-group">
            <label for="">Nome</label>
            {!! Form::text('nome',isset($user->name) ? $user->name : '',array('class' => 'form-control','placeholder'=>'Nome revenda*','id'=>'revenda') )!!}
        </div>
        <div class="form-group">
            <label for="">Email</label>
            {!! Form::text('email',isset($user->email) ? $user->email : '',array('class' => 'form-control','placeholder'=>'Email*','id'=>'email') )!!}
        </div>
        <div class="form-group">
            <label for="">Senha</label><br>
            {!! Form::password('senha','',array('class' => 'form-control','placeholder'=>'Senha*','id'=>'senha') )!!}
        </div>

        @
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
	{!! Form::close() !!}
@endsection