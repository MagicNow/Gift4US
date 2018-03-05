<div class="modal-lista-footer col-md-12">
    @if ($paginator->onFirstPage())
        <span class="disabled col-md-3">Anterior</span>
    @else
        <a href="{{ route('notificacoes.aniversario', [$party]) }}?modal={{ $request->modal }}&page={{ $paginator->currentPage() - 1 }}{{ isset($request->ordem) ? '&ordem=' . $request->ordem : NULL }}" rel="prev" class="col-md-3">Anterior</a>
    @endif
    <div class="col-md-6">Páginas {{ $paginator->currentPage() }}/{{ ceil($paginator->total() / $paginator->perPage()) }}</div>
    @if ($paginator->hasMorePages())
        <a href="{{ route('notificacoes.aniversario', [$party]) }}?modal={{ $request->modal }}&page={{ $paginator->currentPage() + 1 }}{{ isset($request->ordem) ? '&ordem=' . $request->ordem : NULL }}" rel="next" class="col-md-3 text-right">Próxima</a>
    @else
        <span class="disabled col-md-3 text-right">Próxima</span>
    @endif
</div>
    