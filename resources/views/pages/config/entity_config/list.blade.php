@extends('layouts.config.list')
@section('crud-content')
<table class="table table-bordered table-sm table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Componente</th>
            <th>Situação</th>
            <th>Data cadastro</th>
<!--            <th>Data atualização</th>-->
            <th></th>
        <tr>
    </thead>
    <tbody>
        @foreach($rows as $entity)
        @php $id = $entity->getId() @endphp
        <tr data-id="{{ $id }}">
            <td>{{ $id }}</td>
            <td>{{ $entity->getName() }}</td>
            <td>{{ $entity->component?->name }}</td>
            <td><span class="badge badge-{{ ($entity->isActive()) ? 'success' : 'danger' }}">Ativo</span></td>
            <td>{{ $entity->getCreatedAt() }}</td>
<!--            <td>{{ $entity->getUpdatedAt() }}</td>-->
            <td class="text-center">
                <a class="btn btn-info" href="{{ route('entity_config.show', $id) }}">
                    Editar
                </a>
                @include($view_prefix . 'components.buttons.delete-button', ['route' => route('entity_config.destroy', $id)])
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection