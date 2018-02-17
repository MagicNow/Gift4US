@if (count($scraps) > 0)
    <table cellpadding="5" cellspacing="0" border="1" width="100%">
        <thead>
            <tr>
                <td><strong>Nome</strong></td>
                <td><strong>Mensagem</strong></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($scraps as $scrap)
                <tr>
                    <td>{{ $scrap->nome }}</td>
                    <td>{{ $scrap->mensagem }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif