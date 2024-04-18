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
        <h1 class="error-code"> 401 </h1>
        <h2>Pendente de autorização</h2>
        <div class="error-details">
            Seu cadastro ainda encontra-se como "pendente de aprovação", aguarde até alguém conceder sua autorização.
        </div>
    </div>
@endsection