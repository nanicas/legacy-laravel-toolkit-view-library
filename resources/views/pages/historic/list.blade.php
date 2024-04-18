@extends('layouts.crud.list')
@section('crud-content')
<table class="table table-bordered table-sm table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Observação</th>
            <th>Data de acontecimento</th>
            <th>Data cadastro</th>
            <th>Data atualização</th>
            <th></th>
        <tr>
    </thead>
    <tbody>
        @foreach($rows as $historic)
        @php $id = $historic->getId() @endphp
        <tr data-id="{{ $id }}">
            <td>{{ $id }}</td>
            <td>{{ $historic->getDescription() }}</td>
            <td>
                @if(empty($observation = $historic->getObservation()))
                    <span class="badge badge-secondary">Nada observado</span>
                @else
                    {{ $observation }}
                @endif
            </td>
            <td>
                @if(empty($happened = $historic->getHappenedAtFormatted()))
                    <span class="badge badge-warning">Nenhum registro</span>
                @else
                    {{ $happened }}
                @endif
            </td>
            <td>{{ $historic->getCreatedAt() }}</td>
            <td>{{ $historic->getUpdatedAt() }}</td>
            <td class="text-center">
                <a class="btn btn-info" href="{{ route('historic.show', $id) }}">
                    Editar
                </a>
                @include($view_prefix . 'components.buttons.delete-button', ['route' => route('historic.destroy', $id)])
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection