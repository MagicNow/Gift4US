@extends('admin.app')

@section('htmlheader_title')
    Usuários :: Criar
@endsection

@section('contentheader_title')
    <h1 class="col-md-6">
        Usuários
        <small></small>
    </h1>
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

    {!! Form::open(['route' => [ 'admin.products.store', isset($product->id) ? $product->id : ''], 'id' => 'form-products', 'method' => 'POST', 'files' => true ]) !!}

        <div class="row">
            <div class="col-md-4 form-group">
                <label for="categoria" class="form-category">Categoria</label>
                {!! Form::select('categoria', ['roupa' => 'Roupa', 'brinquedo' => 'Brinquedo'], isset($product->categoria) ? $product->categoria : '', ['placeholder' => 'Categoria', 'class' => 'form-control', 'id' => 'categoria']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="titulo" class="form-title">Título</label>
            {!! Form::text('titulo', isset($product->titulo) ? $product->titulo : '', ['class' => 'form-control','placeholder'=>'Título*', 'id' => 'titulo'] )!!}
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="preco_venda">Preço</label>
                {!! Form::text('preco_venda', isset($product->preco_venda) ? $product->preco_venda : '', ['class' => 'form-control', 'placeholder' => 'Preço*', 'id' => 'preco_venda'] )!!}
            </div>
            <div class="form-group col-md-6">
                <label for="cor">Cor</label>
                {!! Form::text('cor', isset($product->cor) ? $product->cor : '', ['class' => 'form-control', 'placeholder' => 'Cor*', 'id' => 'cor'] )!!}
            </div>
        </div>
        <div class="form-group">
            <label for="imagem">Imagem</label>
            <input type="file" id="imagem" name="imagem">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
	{!! Form::close() !!}
@endsection