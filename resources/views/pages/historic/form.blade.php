@extends('layouts.crud.form')
@section('crud-form-content')
@php
$isUpdate = (isset($data['row']) && !empty($data['row']));
@endphp

<div id="accordion">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Entidades e Relacionamentos
                </a>
            </h5>
        </div>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <div class="row">
                    @foreach($data['entities'] as $entity)
                        <div class="col-4">
                            <div class="form-group">
                                <label for="{{ $entity['key'] }}">{{ '[' . $entity['description'] .']' }}</label>
                                <select class="form-control personalized-select" id="{{ $entity['key'] }}" name="{{ $entity['key'] }}[]" multiple="multiple">
                                    @foreach($entity['rows'] as $finalEntity)
                                        @php 
                                            $finalEntityId = $finalEntity->getId();
                                        @endphp
                                        <option {{ ($isUpdate && in_array($finalEntityId, $entity['selecteds'])) ? 'selected' : '' }} value="{{ $finalEntityId }}">[{{ $finalEntityId }}] - {{ $finalEntity->getName() }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endforeach 
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-5">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <input type="text" class="form-control" name="description" value="{{ $isUpdate ? $data['row']->getDescription() : '' }}">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="happened_at">Data do acontecimento</label>
                    <input type="date" class="form-control" name="happened_at" value="{{ $isUpdate ? $data['row']->getHappenedAtFormatted() : '' }}">
                </div>
            </div>
        </div>
    </div>
    <div class="col-7">
        <div class="form-group">
            <label for="observation">
                Observações
            </label>
            <textarea rows="4" class="form-control" name="observation">{{ $isUpdate ? $data['row']->getObservation() : '' }}</textarea>
        </div>
    </div>
</div>
@endsection