<form method="POST" action="{{ $route }}" class="delete-form d-inline-block">  
    @method('DELETE')
    <button data-style="expand-right" class="btn btn-sm btn-danger ladda-button delete" type="submit">
        <span data-feather="trash-2"></span><span class="ladda-label"> {{ (isset($description)) ? $description : '' }}</span>
    </button>
</form>