@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-2" id="menu-box">
                <div id="accordion">
                    @yield('menu-items')
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9 col-xl-10 px-md-4">
                <main role="main">
                    
                    <div class="modal fade" id="fast-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-complement" id="fast-result-box"></div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <!--
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes<button>
                                    -->
                                </div>
                            </div>
                        </div>
                    </div>

                    @yield('dashboard-main-top-content')
                    
                    <!--
                    <form method="GET" action="#">
                        <nav class="navbar flex-md-nowrap p-0">

                            <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Company name</a>
                            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <input name="name" class="form-control w-100" type="text" placeholder="Pesquisar usuários" aria-label="Search">
                            <ul class="navbar-nav px-3">
                                <li class="nav-item text-nowrap">
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                </li>
                            </ul>
                            <ul class="navbar-nav px-3">
                                <li class="nav-item text-nowrap">
                                    <a class="nav-link" href="#">Sign out</a>
                                </li>
                            </ul>
                        </nav>
                    </form>

                    <br>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="#">{{ \Request::route()->getName() }}</a></li>
                        </ol>
                    </nav>
                    -->

                    @if(!empty($dashboard_flash_data))
                        @if(is_array($dashboard_flash_data) && !empty($dashboard_flash_data['message']))
                            <div class="flash-message">
                                @if(!empty($dashboard_flash_data['wrapped']))
                                    {!! $dashboard_flash_data['message'] !!}
                                @else
                                    @if(array_key_exists('status', $dashboard_flash_data))
                                        @if($dashboard_flash_data['status'] === true)
                                            @include('components.messages.success', ['message' => $dashboard_flash_data['message']])
                                        @else
                                            @include('components.messages.danger', ['message' => $dashboard_flash_data['message']])
                                        @endif
                                    @else
                                        <div class="alert alert-primary">
                                            {{ $dashboard_flash_data['message'] }}
                                        </div>
                                    @endif
                                @endif
                            </div>
                        @endif
                    @endif

                    <div id="top-dashboard-message"></div>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            @yield('dashboard-breadcrumb')
                            <!-- 
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Library</li>
                            -->
                        </ol>
                    </nav>

                    <h2 class="text-start">@yield('dashboard-title')</h2>
                    
                    @yield('dashboard-content')
                    
                    <div id="bottom-dashboard-message"></div>
                    
                    @yield('dashboard-main-bottom-content')
                    
                </main>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('build/vendor/bootstrap-theme/feather.min.js') }}"></script>
@endsection
