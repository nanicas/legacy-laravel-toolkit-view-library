@if(empty($message))
    @php
    $isUpdate = (isset($data['row']) && !empty($data['row']));
    $component = $data['component'];
    @endphp

    <div class="row">
        <div class="col">
            <table class="table w-100 table-bordered table-striped">
                <thead></thead>
                <tbody>
                    @php $data = ($isUpdate) ? $data['row']->getData() : [] @endphp

                    @if($component->hasTitle())
                    <tr>
                        <td>Título</td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" value="{{ ($isUpdate && !empty($data['title'])) ? $data['title'] : '' }}">
                            </div>
                        </td>
                    </tr>
                    @endif
                    @if($component->hasImage())
                    <tr>
                        <td>Imagem</td>
                        <td>
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="image" value="">
                                    </div>
                                </div>
                                <div class="col-4">
                                    @if($isUpdate && !empty($data['image']))
                                        <img id="uploaded-entity-image" src="{{ url('image/entities') . '/' . $data['image'] }}" />
                                        <input type="hidden" name="selected-image" value="{{ $data['image'] }}"/>
                                    @endif
                                </div>
                            </div>
                            
                        </td>
                    </tr>
                    @endif
                    @if($component->hasContent())
                    <tr>
                        <td>Conteúdo</td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" name="content" value="{{ ($isUpdate && !empty($data['content'])) ? $data['content'] : '' }}">
                            </div>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    @if($component->hasExtra())
    <div class="row">

        <div class="col">
            <div class="form-group">
                <label for="template">
                    Dados extras
                </label>
                <textarea rows="10" class="form-control" name="extra">{{ ($isUpdate && !empty($data['extra'])) ? $data['extra'] : '' }}</textarea>
            </div>
        </div>
    </div>
    @endif

@else
    <div class="alert alert-danger">{{ $message }}</div>
@endif