@extends('layouts.crud.form')

@php $title = 'Formulário de fornecedor/a'; @endphp

@section('dashboard-title')
    {{ $title }}
@endsection

@section('dashboard-breadcrumb')
    @include('components.breadcrumb', ['current_description' => $title])
@endsection

@section('crud-form-content')

@php $isUpdate = (isset($data['row']) && !empty($data['row'])); @endphp

@if($status)
<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="form-group">
            <label>Nome</label>
            <input maxlength="150" type="text" class="form-control" name="name" required value="{{ ($isUpdate) ? $data['row']->getName() : '' }}">
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="form-group">
            <label>E-mail</label>
            <input maxlength="75" type="email" class="form-control" name="email" required value="{{ ($isUpdate) ? $data['row']->getEmail() : '' }}">
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="form-group">
            <label>Telefone</label>
            <input type="text" minlength="10" maxlength="11" class="form-control" name="phone" value="{{ ($isUpdate) ? $data['row']->getPhone() : '' }}">
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="form-group">
            <label>Celular</label>
            <input type="text" minlength="10" maxlength="11" class="form-control" name="cell_phone" value="{{ ($isUpdate) ? $data['row']->getCellPhone() : '' }}">
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
        <div class="form-group form-check">
            <input type="checkbox" value="1" class="form-check-input" id="active-check" name="active" value="1" {{ ($isUpdate && $data['row']->isActive()) ? 'checked' : '' }}>
            <label class="form-check-label" for="active-check">Ativo</label>
        </div>
    </div>
</div>
@endif
@endsection
