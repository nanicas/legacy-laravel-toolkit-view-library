@extends('layouts.config.form')
@section('crud-form-content')
@php
$isUpdate = (isset($data['row']) && !empty($data['row']));
@endphp

<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="component">Componente</label>
            <select class="form-control" id="component" name="component" data-action="{{ route('entity_config.dynamic_form') }}" method="GET">
                @foreach($data['components'] as $component)
                    @php $componentId = $component->getId(); @endphp
                    <option {{ ($isUpdate && $componentId == $data['row']->getComponent()) ? 'selected' : '' }} value="{{ $component->getId() }}">{{ $component->getName() }}</option>
                @endforeach
            </select>
        </div>
        <div id="component-load" class="none">Carregando ...</div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="name">Nome</label>
            <input maxlength="50" type="text" class="form-control" name="name" value="{{ $isUpdate ? $data['row']->getName() : '' }}">
        </div>
    </div>
    <div class="col-12">
        <div class="form-check text-left">
            <input class="form-check-input" type="checkbox" value="1" id="active" {{ ($isUpdate && $data['row']->isActive()) ? 'checked' : '' }} name="active">
            <label class="form-check-label" for="active">
                Ativo
            </label>
        </div>
    </div>
</div>
<hr>

<div id="dynamic-form-by-component"></div>

@endsection