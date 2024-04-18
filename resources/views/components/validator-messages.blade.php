@if (!empty($messages))
    <div class="alert alert-danger" role="alert">
        <ul class="mb-0">
            @foreach ($messages as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif
