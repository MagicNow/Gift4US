@extends('admin.app')

@section('htmlheader_title')
    Usuários
@endsection
@section('contentheader_title')
    <h1 class="col-md-6">
        Usuários
        <small></small>
    </h1>
    <div class="col-md-6 text-right">
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Adicionar</a>
    </div>
@endsection


@section('main-content')
    <div class="box">
		<div class="box-header">
			@if (session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
			@endif
      	</div><!-- /.box-header -->
      	<div class="box-body">
	      	@if (isset($users) && count($users) > 0)
				<table id="datatables" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nome</th>
							<th>Email</th>
							<th>Data</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
							<tr>
								<td>{!! $user->id !!}</td>
								<td>{!! $user->name !!}</td>
								<td>{!! $user->email !!}</td>
								<td>{!! date('d/m/Y H:i:s',strtotime($user->created_at)) !!}</td>
								<td>
									<a href="{{ route('admin.users.edit',$user->id) }}" class="btn btn-primary">Editar</a>
									@if (Auth::user()->id !== $user->id)
										<a href="{{ route('admin.users.destroy',$user->id) }}" class="btn btn-primary" data-toggle="modal" data-target="#confirm-delete">Excluir</a>
									@endif
								</td>
							</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Email</th>
							<th>Data</th>
							<th>Ações</th>
						</tr>
					</tfoot>
				</table>
			@else
				<p>Nenhum usuário cadastrado</p>
			@endif
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