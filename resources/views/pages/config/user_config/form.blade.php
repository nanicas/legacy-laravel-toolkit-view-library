@extends('layouts.config.form')
@section('crud-form-content')

@if($status === true)

    @php
        extract($data);
        $isUpdate = (isset($data['row']) && !empty($data['row']));
    @endphp

    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>Apelido</th>
                <th>Perfil</th>
                @if($isMaster)
                    <th>Admin</th>
                @endif
                @if($isUpdate)
                    <th>Criação</th>
                    <th>Atualização</th>
                @endif
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input class="form-control" name="name" value="{{ ($isUpdate) ? $data['row']->getName() : '' }}" /></td>
                <td>
                    <select class="form-control" name="rule_id">
                        
                        @foreach($data['rules'] as $rule)
                            @php $ruleId = $rule->getId() @endphp
                            <option {{ ($isUpdate && $ruleId == $data['row']->getRuleId()) ? 'selected' : '' }} value="{{ $ruleId }}">{{ $rule->getDescription() }}</option>
                        @endforeach
                    </select>
                </td>
                
                @if($isMaster)
                    <td><input class="form-control" {{ ($isUpdate && $data['row']->isAdmin()) ? 'checked' : '' }} type="checkbox" name="admin" value="1" /></td>
                @endif
                @if($isUpdate)
                    <td>{{ $data['row']->getCreatedAt() }}</td>
                    <td>{{ $data['row']->getUpdatedAt() }}</td>
                @endif
            </tr>
        </tbody>
    </table>

@endif
@endsection