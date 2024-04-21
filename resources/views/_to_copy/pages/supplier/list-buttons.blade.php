@php $id = $row->getPrimaryValue(); @endphp

@include($view_prefix . 'components.buttons.edit-button', ['route' => route('supplier.show', $id)])
@include($view_prefix . 'components.buttons.delete-button', ['route' => route('supplier.destroy', $id)])
