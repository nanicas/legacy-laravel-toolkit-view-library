@extends('layouts.config.list')
@section('crud-content')

<table class="table table-bordered table-sm table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Chave</th>
            <th>Ativo</th>
            <th>Data cadastro</th>
<!--            <th>Data atualização</th>-->
            <th></th>
        <tr>
    </thead>
    <tbody>
        @foreach($rows as $category)
        @php $id = $category->getId() @endphp
        <tr data-id="{{ $id }}">
            <td>{{ $id }}</td>
            <td>{{ $category->getName() }}</td>
            <td>{{ $category->getKey() }}</td>
            <td>
                @if($category->isActive())
                <span class="badge badge-success">Ativo</span>
                @else
                <span class="badge badge-danger">Inativo</span>
                @endif
            </td>
            <td>{{ $category->getCreatedAt() }}</td>
<!--            <td>{{ $category->getUpdatedAt() }}</td>-->
            <td class="text-center">
                <a class="btn btn-info" href="{{ route('category_config.show', $id) }}">
                    Editar
                </a>
                @include($view_prefix . 'components.buttons.delete-button', ['route' => route('category_config.destroy', $id)])
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection