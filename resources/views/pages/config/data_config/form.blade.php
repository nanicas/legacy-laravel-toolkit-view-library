@extends('layouts.config.form')

@section('crud-form-content')

@php
    $isUpdate = (isset($data['row']) && !empty($data['row']));
@endphp

<div id="accordion">
    @if($isUpdate)
        @foreach($data['row']->addresses as $address)
            @include($view_prefix . 'pages.config.data_config.address-form', ['data' => $address, 'isUpdate' => $isUpdate])
        @endforeach
    @else
        @include($view_prefix . 'pages.config.data_config.address-form', ['isUpdate' => $isUpdate])
    @endif
</div>
<br>

<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="facebook">Facebook</label>
            <input maxlength="80" type="text" class="form-control" name="facebook" value="{{ $isUpdate ? $data['row']->getFacebook() : '' }}">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="instagram">Instagram</label>
            <input maxlength="80" type="text" class="form-control" name="instagram" value="{{ $isUpdate ? $data['row']->getInstagram() : '' }}">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="twitter">Twitter</label>
            <input maxlength="80" type="text" class="form-control" name="twitter" value="{{ $isUpdate ? $data['row']->getTwitter() : '' }}">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="youtube">Youtube</label>
            <input maxlength="80" type="text" class="form-control" name="youtube" value="{{ $isUpdate ? $data['row']->getYoutube() : '' }}">
        </div>
    </div>
</div>
@endsection