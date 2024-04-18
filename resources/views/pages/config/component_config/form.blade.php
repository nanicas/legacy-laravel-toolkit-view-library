@extends('layouts.config.form')
@section('crud-form-content')
@php
$isUpdate = (isset($data['row']) && !empty($data['row']));
@endphp

<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="category">Categoria</label>
            <select class="form-control" id="category" name="category">
                @foreach($data['categories'] as $category)
                @php $categoryId = $category->getId(); @endphp
                <option {{ ($isUpdate && $categoryId == $data['row']->getCategory()) ? 'selected' : '' }} value="{{ $category->getId() }}">{{ $category->getName() }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="name">Nome</label>
            <input maxlength="50" type="text" class="form-control" name="name" value="{{ $isUpdate ? $data['row']->getName() : '' }}">
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="key">Chave</label>
            <input maxlength="40" type="text" class="form-control" name="key" value="{{ $isUpdate ? $data['row']->getKey() : '' }}">
        </div>
    </div>
</div>
<hr>
<div class="row">

    <div class="col">
        <table class="table w-100 table-bordered table-striped">
            <thead></thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td>
                        <div class="form-check text-left">
                            <input class="form-check-input" type="checkbox" value="1" id="active" {{ ($isUpdate && $data['row']->isActive()) ? 'checked' : '' }} name="active">
                            <label class="form-check-label" for="active">
                                Ativo
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>
                        <div class="form-check text-left">
                            <input class="form-check-input" type="checkbox" value="1" id="has_image" {{ ($isUpdate && $data['row']->hasImage()) ? 'checked' : '' }} name="has_image">
                            <label class="form-check-label" for="has_image">
                                Possui imagem?
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>
                        <div class="form-check text-left">
                            <input class="form-check-input" type="checkbox" value="1" id="has_title" {{ ($isUpdate && $data['row']->hasTitle()) ? 'checked' : '' }} name="has_title">
                            <label class="form-check-label" for="has_title">
                                Possui título?
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>
                        <div class="form-check text-left">
                            <input class="form-check-input" type="checkbox" value="1" id="has_content" {{ ($isUpdate && $data['row']->hasContent()) ? 'checked' : '' }} name="has_content">
                            <label class="form-check-label" for="has_content">
                                Possui conteúdo?
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td>
                        <div class="form-check text-left">
                            <input class="form-check-input" type="checkbox" value="1" id="has_extra" {{ ($isUpdate && $data['row']->hasExtra()) ? 'checked' : '' }} name="has_extra">
                            <label class="form-check-label" for="has_extra">
                                Possui extra?
                            </label>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row">

    <div class="col">
        <div class="form-group">
            <label for="template">
                Modelo de apresentação
            </label>
            <textarea rows="13" class="form-control" name="template" id="template">{{ ($isUpdate) ? $data['row']->getTemplate() : '' }}</textarea>
        </div>
    </div>
</div>
@endsection