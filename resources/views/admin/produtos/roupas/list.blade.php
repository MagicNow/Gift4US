@extends('admin.app')

@section('htmlheader_title')
	Produtos
@endsection

@section('contentheader_title')
	<h1 class="col-md-6">
		Roupas
		<small></small>
	</h1>
	<div class="col-md-6 text-right">
		<a href="{{ route('admin.products.clothes.create') }}" class="btn btn-primary">Adicionar</a>
	</div>
@endsection


@section('main-content')
	<div class="box">
		<div class="box-header">
			@if (session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
			@endif
			<form action="{{ route('admin.products.clothes.index') }}" class="row" method="get">
				<div class="col-md-7">
				</div>
				<div class="col-md-4 text-right">
					<input type="text" name="titulo" class="form-control">
				</div>
				<div class="col-md-1 text-right">
					<button type="submit" class="btn btn-secondary">Buscar</button>
				</div>
			</form>
		</div><!-- /.box-header -->
		<div class="box-body">
			<table id="datatables" class="table table-bordered table-striped" data-order="[[ 0, &quot;desc&quot; ]]">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nome</th>
						<th>Descrição</th>
						<th>Imagem</th>
						<th>Data</th>
						<th width="100">Ações</th>
					</tr>
				</thead>
				<tbody>
					@foreach($produtos as $prod)
						<tr>
							<td>{{ $prod->id }}</td>
							<td>{{ $prod->titulo }}</td>
							<td style="word-wrap: break-word !important;float: left; max-width: 300px;">{{ str_limit($prod->descricao, $limit = 150, $end = '...') }}</td>
							<td>
								<img src="{{ $prod->imagem }}" width="100">
							</td>
							<td>{{ date('d/m/Y H:i:s',strtotime($prod->created_at)) }}</td>
							<td>	
								@if($prod->status == 1)		
									<a href="{{ route('admin.products.clothes.status', [ $prod->id, 0 ]) }}" class="btn btn-danger" title="Reprovar"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
								@else
									<a href="{{ route('admin.products.clothes.status', [ $prod->id, 1 ]) }}" class="btn btn-default" title="Aprovar"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a>
								@endif
								<form method="post" action="{{ route('admin.products.clothes.destroy', $prod->id) }}" style="display: inline-block;">

									{{ Form::open(['method' => 'DELETE', 'route' => [ 'admin.products.clothes.destroy', $prod->id ]]) }}
										{{ Form::hidden('id', $prod->id) }}

										<button type="submit" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
									{{ Form::close() }}
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th>Id</th>
						<th>Nome</th>
						<th>Descrição</th>
						<th>Tipo</th>
						<th>Imagem</th>
						<th>Data</th>
						<th>Ações</th>
					</tr>
				</tfoot>
			</table>
			{{ $produtos->links() }}
		</div><!-- /.box-body -->
	</div><!-- /.box -->
	<div class="modal fade modal-danger " id="confirm-delete" tabindex="-1" role="dialog" aria-hidden="false">
		<div class="modal-dialog">
			<div class="modals-content">
			
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Apagar Usuário?</h4>
				</div>
			
				<div class="modal-body">
					<!-- <p>You are about to delete one track, this procedure is irreversible.</p>
					<p>Do you want to proceed?</p> -->
					<p class="debug-url"></p>
				</div>
				
				<div class="modal-footer">
					<button id="#confirm-delete" type="button" class="btn btn-outline pull-left" data-dismiss="modal">Fechar</button>
					<a type="button" class="btn btn-outline btn-ok">Apagar</a>
				</div>
			</div>
		</div>
	</div>
@endsection