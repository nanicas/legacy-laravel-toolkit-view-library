@extends('layouts.config.list')
@section('crud-content')
<table class="table table-bordered table-sm table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Chave</th>
            <th>Categoria</th>
            <th>Situação</th>
            <th>Opções</th>
<!--            <th>Data cadastro</th>-->
            <th></th>
        <tr>
    </thead>
    <tbody>
        @foreach($rows as $component)
        @php $id = $component->getId() @endphp
        <tr data-id="{{ $id }}">
            <td>{{ $id }}</td>
            <td>{{ $component->getName() }}</td>
            <td>{{ $component->getKey() }}</td>
            <td>{{ $component->category?->name }}</td>
            <td><span class="badge badge-{{ ($component->isActive()) ? 'success' : 'danger' }}">Ativo</span></td>
            <td>
                <span class="badge badge-{{ ($component->hasTitle()) ? 'success' : 'danger' }}">Título</span>
                <span class="badge badge-{{ ($component->hasContent()) ? 'success' : 'danger' }}">Conteúdo</span>
                <span class="badge badge-{{ ($component->hasExtra()) ? 'success' : 'danger' }}">Extra</span>
                <span class="badge badge-{{ ($component->hasImage()) ? 'success' : 'danger' }}">Imagem</span>
            </td>
<!--            <td>{{ $component->getCreatedAt() }}</td>-->
            <td class="text-center">
                <a class="btn btn-info" href="{{ route('component_config.show', $id) }}">
                    Editar
                </a>
                @include($view_prefix . 'components.buttons.delete-button', ['route' => route('component_config.destroy', $id)])
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection