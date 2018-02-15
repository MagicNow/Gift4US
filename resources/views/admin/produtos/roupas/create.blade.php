@extends('admin.app')

@section('htmlheader_title')
    Usuários :: Criar
@endsection

@section('contentheader_title')
    <h1 class="col-md-6">
        Roupas
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

    {!! Form::open(['route' => [ 'admin.products.clothes.store', isset($product->id) ? $product->id : ''], 'id' => 'form-products', 'method' => 'POST', 'files' => true ]) !!}

        {!! Form::hidden('categoria', 'roupa') !!}

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
            <label for="sexo" class="form-title">Sexo</label>
            <div class="custom-control custom-radio custom-control-inline">
                {!! Form::radio('sexo', 'M', isset($product->sexo) && $product->sexo == 'M' ? true : false, ['class' => 'custom-control-input', 'id' => 'sexoM'] )!!}
                <label class="custom-control-label" for="sexoM">Masculino</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                {!! Form::radio('sexo', 'F', isset($product->sexo) && $product->sexo == 'F' ? true : false, ['class' => 'custom-control-input', 'id' => 'sexoF'] )!!}
                <label class="custom-control-label" for="sexoF">Feminino</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                {!! Form::radio('sexo', 'U', isset($product->sexo) && $product->sexo == 'U' ? true : false, ['class' => 'custom-control-input', 'id' => 'sexoU'] )!!}
                <label class="custom-control-label" for="sexoU">Unissex</label>
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