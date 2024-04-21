@extends($view_prefix . 'layouts.dashboard')

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
                @php $isAppointmentScreenAbout = (
                    in_array($screen, [
                        'treatment',
                        'supplier',
                    ]))
                @endphp
                <div class="card-header" id="heading-treatment-menu">
                    <button class="btn btn-link collapsed text-decoration-none" data-bs-toggle="collapse" data-bs-target="#collapse-treatment-menu" aria-expanded="{{ ($isAppointmentScreenAbout) ? 'true' : 'false' }}" aria-controls="collapse-treatment-menu">
                        <span data-feather="trello"></span>
                        <label role="button">Consultas</label>
                    </button>
                </div>
                <div id="collapse-treatment-menu" class="collapse {{ ($isAppointmentScreenAbout) ? 'show' : '' }}" aria-labelledby="heading-treatment-menu" data-parent="#accordion">
                    <div class="card-body">
                        <div class="list-group">
                            <a class="list-group-item list-group-item-action {{ ($isAppointmentScreenAbout && $screen == 'treatment') ? 'active' : '' }}" href="#">
                                <span data-feather="map-pin"></span>
                                Atendimentos
                            </a>
                            <a class="list-group-item list-group-item-action {{ ($isAppointmentScreenAbout && $screen == 'supplier') ? 'active' : '' }}" href="{{ route('supplier.index') }}">
                                <span data-feather="map-pin"></span>
                                Fornecedores
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
@endsection
