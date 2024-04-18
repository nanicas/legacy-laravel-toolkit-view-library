<div class="card">
    @if(!empty($entity_data['image']))
        <img class="card-img-top" src="{{ url('image/entities') . '/' . $entity_data['image'] }}" alt="{{ $entity_data['image'] }}">
    @endif
    <div class="card-body">
        @if(!empty($entity_data['title']))
            <h5 class="card-title">{{ $entity_data['title'] }}</h5>
        @endif
        @if(!empty($entity_data['content']))
            <p class="card-text">{{ $entity_data['content'] }}</p>
        @endif
    </div>
    @if(!empty($entity_data['extra']))
        <div class="card-footer">
            <small class="text-muted">{{ json_encode($entity_data['extra']) }}</small>
        </div>
    @endif
</div>