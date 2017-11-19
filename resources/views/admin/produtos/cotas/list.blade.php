@extends('admin.app')

@section('htmlheader_title')
	Produtos
@endsection

@section('contentheader_title')
	<h1 class="col-md-6">
		Brinquedos
		<small></small>
	</h1>
@endsection


@section('main-content')
	<div class="box">
		<div class="box-header">
			@if (session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
			@endif
			<form action="{{ route('admin.products.quotas.index') }}" class="row" method="get">
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
						<th>Observações</th>
						<th>Imagem</th>
						<th>Valor Total</th>
						<th>Quantidade</th>
						<th>Data</th>
						<th width="100">Ações</th>
					</tr>
				</thead>
				<tbody>
					@foreach($produtos as $prod)
						<tr>
							<td>{{ $prod->id }}</td>
							<td>{{ $prod->nome }}</td>
							<td style="word-wrap: break-word !important;float: left; max-width: 300px;">{{ str_limit($prod->observacao, $limit = 150, $end = '...') }}</td>
							<td>
								@if (!empty($prod->foto))
									<img src="{{ url('storage/quotas/' . $prod->foto) }}" width="100"></td>
								@endif
							<td>R$ {{ number_format($prod->valor_total, 2) }}</td>
							<td>{{ $prod->quantidade_cotas == 0 ? 1 : $prod->quantidade_cotas }}</td>
							<td>{{ date('d/m/Y H:i:s',strtotime($prod->created_at)) }}</td>
							<td>
								<form method="post" action="{{ route('admin.products.quotas.destroy', $prod->id) }}" style="display: inline-block;">

									{{ Form::open(['method' => 'DELETE', 'route' => [ 'admin.products.quotas.destroy', $prod->id ]]) }}
										{{ Form::hidden('id', $prod->id) }}

										<button type="submit" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
									{{ Form::close() }}
								</form>
								@if ($prod->festa->ativo == 1)
									<a href="{{ route('convidado.index', $prod->festa_id) }}" target="_blank" class="btn btn-default" title="Ver página do convidado"><i class="fa fa-eye" aria-hidden="true"></i></a>
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th>Id</th>
						<th>Nome</th>
						<th>Descrição</th>
						<th>Imagem</th>
						<th>Valor Total</th>
						<th>Quantidade</th>
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