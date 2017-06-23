@extends('admin.app')

@section('htmlheader_title')
    Produtos
@endsection
@section('contentheader_title')
    Produtos
@endsection


@section('main-content')
    <div class="box">
		<div class="box-header"> </div><!-- /.box-header -->
		@if (session('sucess'))
          <div class="alert alert-success">
              {{ session('sucess') }}
          </div>
      	@endif
		<div class="box-body">
			<table id="datatables" class="table table-bordered table-striped" data-order="[[ 0, &quot;desc&quot; ]]">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nome</th>
						<th>Descrição</th>
						<th>Tipo</th>
						<th>Imagem</th>
						<th>Data</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					@foreach($produtos as $prod)
						<tr>
							<td>{!! $prod->id !!}</td>
							<td>{!! $prod->title !!}</td>
							<td style="word-wrap: break-word !important;float: left;max-width: 300px;">{!! $prod->description !!}</td>
							<td>{!! $prod->type !!}</td>
							<td><img src="{!! $prod->image !!}" width="150"></td>
							<td>{!! date('d/m/Y H:i:s',strtotime($prod->created_at)) !!}</td>
							<td>	
								@if($prod->status == 1)		
									<a href="{{ route('admin.produtos.status',array($prod->id,0)) }}" class="btn btn-danger" >Reprovar</a>
								@else
									<a href="{{ route('admin.produtos.status',array($prod->id,1)) }}" class="btn btn-primary" >Aprovar</a>
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
						<th>Tipo</th>
						<th>Imagem</th>
						<th>Data</th>
						<th>Ações</th>
					</tr>
				</tfoot>
			</table>
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