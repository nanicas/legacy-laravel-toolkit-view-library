@extends('layouts.dashboard')
@section('dashboard-content')

    @if(isset($state))
        @include('layouts.crud.messages-state', ['state' => $state])
    @endif
    
    <div id="crud-message">
        @if(!empty($message))
            {!! $message !!}
        @endif
    </div>
    
    @if($status)
        @if(!isset($config['create_option']) || $config['create_option'] === true)
            @yield('create_link', \View::make('layouts.crud.create_link', compact('full_screen')))
        @endif

        @yield('crud-filters')

        <div id="crud-list">
            @yield('crud-content')
        </div>
    @endif

@endsection