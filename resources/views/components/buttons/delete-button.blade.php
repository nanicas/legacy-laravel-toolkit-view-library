<form method="POST" action="{{ $route }}" class="delete-form d-inline-block">
    @method('DELETE')
    <button data-style="expand-right" class="btn btn-sm btn-danger ladda-button delete" type="submit">
        <i class="bi bi-trash3"></i><span class="ladda-label"> {{ isset($description) ? $description : '' }}</span>
    </button>
</form>
