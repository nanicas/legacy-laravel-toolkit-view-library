@extends('layouts.app')

@section('css')
<style>
    .error-page {
        padding: 40px 15px;
        text-align: center;
    }
    .error-actions {
        margin-top:15px;
        margin-bottom:15px;
    }
    .error-actions .btn {
        margin-right:10px;
    }
    h1.error-code {
        font-size :100px !important;
    }
</style>
@endsection

@section('content')
    <div class="error-page">
        <h2>Oops!</h2>
        <h1 class="error-code"> Atenção </h1>
        <div class="error-details">
            {!! $message !!}
        </div>

        <a href="{{ route('home') }}">Página inicial</a>
    </div>
@endsection