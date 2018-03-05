@extends('admin.app')

@section('htmlheader_title')
	Vendas
@endsection

@section('contentheader_title')
	<h1 class="col-md-6">
		Vendas
		<small></small>
	</h1>
@endsection


@section('main-content')
	<div class="box">
		<div class="box-body">
			<table id="datatables" class="table table-bordered table-striped" data-order="[[ 0, &quot;desc&quot; ]]">
				<thead>
					<tr>
						<th>Tipo</th>
						<th>Nome do Presente</th>
						<th>Valor</th>
						<th>Nome do Convidado</th>
                        <th>E-mail do convidado</th>
                        <th>Código do pagamento</th>
                        <th>Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach($sales as $sale)
						<tr>
							<td>{{ $sale->tipo }}</td>
                            <td>{{ $sale->presente_nome }}</td>
                            <td>{{ $sale->valor_venda }}</td>
                            <td>{{ $sale->convidado_nome }}</td>
                            <td>{{ $sale->convidado_email }}</td>
                            <td>{{ $sale->pagamento_codigo }}</td>
                            <td>
                                @switch($sale->status)
                                    @case(1)
                                        Aguardando Pagamento
                                        @break
                                    @case(2)
                                        Em Análise
                                        @break
                                    @case(3)
                                        Paga
                                        @break
                                    @case(4)
                                        Disponível
                                        @break
                                    @case(5)
                                        Em disputa
                                        @break
                                    @case(6)
                                        Devolvida
                                        @break
                                    @case(7)
                                        Cancelada
                                        @break
                                @endswitch
                            </td>
						</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
                        <th>Tipo</th>
                        <th>Nome do Presente</th>
                        <th>Valor</th>
                        <th>Nome do Convidado</th>
                        <th>E-mail do convidado</th>
                        <th>Status</th>
					</tr>
				</tfoot>
			</table>
			{{ $sales->links() }}
		</div><!-- /.box-body -->
	</div><!-- /.box -->
@endsection