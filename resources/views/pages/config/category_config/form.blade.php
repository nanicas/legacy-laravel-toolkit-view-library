@extends('layouts.config.form')
@section('crud-form-content')

@php
extract($data);
$isUpdate = (isset($data['row']) && !empty($data['row']));
@endphp

<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" maxlength="30" name="name" value="{{ $isUpdate ? $data['row']->getName() : '' }}">
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="config">Chave</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
                <input value="{{ $isUpdate ? $data['row']->getKey() : '' }}" maxlength="20" type="text" class="form-control" name="key" id="key" aria-describedby="inputGroupPrepend">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
    <div class="form-check text-left">
            <input class="form-check-input" type="checkbox" value="1" id="active" {{ ($isUpdate && $data['row']->isActive()) ? 'checked' : '' }} name="active">
            <label class="form-check-label" for="active">
                Ativo
            </label>
        </div>
    </div>
</div>
@endsection