<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @yield('head')
        @yield('meta')

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @vite(['resources/sass/app.scss'])

        <link href="{{ asset($packaged_assets_prefix . '/css/layouts/app.css') }}" rel="stylesheet">

        @if(!empty($assets['css']))
            @foreach ($assets['css'] as $css)
                <link rel="stylesheet" href="{{ asset($css) }}"></link>
            @endforeach
        @endif

        @yield('css')
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
                <div class="container">
                    @yield('app_logo', View::make('components.app_logo'))
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto"></ul>

                        @php $currentRouteName = Route::currentRouteName(); @endphp
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @if (Route::has('site') && $currentRouteName != 'site')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('site') }}">Site</a>
                                </li>
                            @endif
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register', (!empty($register_params)) ? $register_params : []) }}">Registrar-se</a>
                                    </li>
                                @endif
                            @else
                                @if ($currentRouteName == 'site')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                                    </li>
                                @endif

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ \App\Helpers\Helper::getUserName(false) }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            Sair
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                <div class="container-fluid">
                    
                    @if(!empty($app_flash_data))
                        @if(is_array($app_flash_data) && !empty($app_flash_data['message']))
                            <div class="flash-message">
                                @if(!empty($app_flash_data['wrapped']))
                                    {!! $app_flash_data['message'] !!}
                                @else
                                    @if(array_key_exists('status', $app_flash_data))
                                        @if($app_flash_data['status'] === true)
                                            @include('components.messages.success', ['message' => $app_flash_data['message']])
                                        @else
                                            @include('components.messages.danger', ['message' => $app_flash_data['message']])
                                        @endif
                                    @else
                                        <div class="alert alert-primary">
                                            {{ $app_flash_data['message'] }}
                                        </div>
                                    @endif
                                @endif
                            </div>
                        @endif
                    @endif
                    
                    <div id="top-message"></div>
                </div>
                
                @yield('content')
                
                <div class="container-fluid">
                    <div id="bottom-message"></div>
                </div>
            </main>
        </div>
        
        <footer class="py-3 my-4 mb-0">
            @yield('footer')
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
    <!--            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>-->
            </ul>
            <p class="text-center text-muted mb-0">© {{ date('Y') }}</p>
        </footer>
    </body>

    @vite(['resources/js/app.js'])

    <script type="text/javascript" src="{{ asset($packaged_assets_prefix . '/js/layouts/app.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset($packaged_assets_prefix. '/js/utils/helper.js') }}" defer></script>

    @if(!empty($assets['js']))
        @foreach ($assets['js'] as $js)
            <script type="text/javascript" src="{{ asset($js) }}" defer></script>
        @endforeach
    @endif

    @yield('js')
</html>
