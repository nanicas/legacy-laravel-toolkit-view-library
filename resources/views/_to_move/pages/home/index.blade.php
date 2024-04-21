@extends('layouts.dashboard')

@section('dashboard-title')
    Página inicial
@endsection

@section('dashboard-breadcrumb')
    @include('components.breadcrumb', ['current_description' => 'Página inicial'])
@endsection

@section('dashboard-content')

Olá, Authorization!

@endsection
