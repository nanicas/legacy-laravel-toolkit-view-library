@extends($view_prefix . 'layouts.dashboard')

<!--
@section('menu-items')
    <ul class="list-group mb-2">
        <li class="list-group-item rounded {{ ($screen == 'home') ? 'active' : '' }}">
            <a href="{{ route('home') }}">
                <div class="card">
                    <div class="card-header">
                        <span data-feather="star"></span>
                        <label role="button">Página inicial</label>
                    </div>
                </div>
            </a>
        </li>
    </ul>

    <ul class="list-group mb-2">
        <li class="rounded list-group-item w-100" role="button">
            <div class="card">
                @php $isExampleScreenAbout = (
                    in_array($screen, [
                        'example-a',
                        'example-b',
                    ]))
                @endphp
                <div class="card-header" id="heading-example-a-menu">
                    <button class="btn btn-link collapsed text-decoration-none" data-bs-toggle="collapse" data-bs-target="#collapse-example-a-menu" aria-expanded="{{ ($isExampleScreenAbout) ? 'true' : 'false' }}" aria-controls="collapse-example-a-menu">
                        <span data-feather="trello"></span>
                        <label role="button">Consultas</label>
                    </button>
                </div>
                <div id="collapse-example-a-menu" class="collapse {{ ($isExampleScreenAbout) ? 'show' : '' }}" aria-labelledby="heading-example-a-menu" data-parent="#accordion">
                    <div class="card-body">
                        <div class="list-group">
                            <a class="list-group-item list-group-item-action {{ ($isExampleScreenAbout && $screen == 'example-a') ? 'active' : '' }}" href="#">
                                <span data-feather="map-pin"></span>
                                Example A
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
@endsection
-->
