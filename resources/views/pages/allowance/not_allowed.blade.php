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
    @yield('not-allowed-content', view('pages.allowance.not_allowed_content'))
@endsection