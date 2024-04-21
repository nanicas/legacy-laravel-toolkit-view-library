@extends('layouts.crud.list')

@php $title = 'Fornecedores/as'; @endphp

@section('dashboard-title')
    {{ $title }}
@endsection

@section('dashboard-breadcrumb')
    @include('components.breadcrumb', ['current_description' => $title])
@endsection

@if($status)
    @section('crud-content')
    <div class="table-responsive">
        <table data-route="{{ route('supplier.list') }}" class="table table-bordered table-sm table-striped dataTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Celular</th>
                    <th>Telefone</th>
                    <th>Status</th>
                    <th>Data cadastro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    @endsection
@endif
