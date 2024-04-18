@php $time = uniqid() . time(); @endphp

<div class="card">
    <div class="card-header" id="heading-{{ $time }}">
        <h5 class="mb-0">
            <a class="btn btn-link" data-toggle="collapse" data-target="#collapse-{{ $time }}" aria-expanded="true" aria-controls="collapse-{{ $time }}">
                {{ ($isUpdate) ? '[ '. $data->getId() .' ]' : '' }} Endereço e/ou contato 
            </a>
        </h5>
    </div>

    <div id="collapse-{{ $time }}" class="collapse show" aria-labelledby="heading-{{ $time }}" data-parent="#accordion">
        
        <input type="hidden" class="form-control" name="unique_id[]" value="{{ $isUpdate ? $data->getId() : '' }}">
        
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="phone[]">Telefone</label>
                        <input maxlength="18" type="text" class="form-control" name="phone[]" value="{{ $isUpdate ? $data->getPhone() : '' }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="cellphone[]">Celular</label>
                        <input maxlength="18" type="text" class="form-control" name="cellphone[]" value="{{ $isUpdate ? $data->getCellphone() : '' }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="country[]">País</label>
                        <input maxlength="25" type="text" class="form-control" name="country[]" value="{{ $isUpdate ? $data->getCountry() : '' }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="state[]">Estado</label>
                        <input maxlength="25" type="text" class="form-control" name="state[]" value="{{ $isUpdate ? $data->getState() : '' }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="city[]">Cidade</label>
                        <input maxlength="25" type="text" class="form-control" name="city[]" value="{{ $isUpdate ? $data->getCity() : '' }}">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="number[]">Número</label>
                        <input maxlength="5" type="number" class="form-control" name="number[]" value="{{ $isUpdate ? $data->getNumber() : '' }}">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="zipcode[]">CEP</label>
                        <input maxlength="12" type="number" class="form-control" name="zipcode[]" value="{{ $isUpdate ? $data->getZipcode() : '' }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="street[]">Rua</label>
                        <input maxlength="25" type="text" class="form-control" name="street[]" value="{{ $isUpdate ? $data->getStreet() : '' }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="open_at[]">Aberto às</label>
                        <input type="time" class="form-control" name="open_at[]" value="{{ $isUpdate ? $data->getOpenAt() : '' }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="close_at[]">Fechado às</label>
                        <input type="time" class="form-control" name="close_at[]" value="{{ $isUpdate ? $data->getCloseAt() : '' }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="email[]">E-mail</label>
                        <input maxlength="60" type="text" class="form-control" name="email[]" value="{{ $isUpdate ? $data->getEmail() : '' }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="latitude[]">Latitude</label>
                        <input maxlength="30" type="text" class="form-control" name="latitude[]" value="{{ $isUpdate ? $data->getLatitude() : '' }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="longitude[]">Longitude</label>
                        <input maxlength="30" type="text" class="form-control" name="longitude[]" value="{{ $isUpdate ? $data->getLongitude() : '' }}">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="observation[]">
                            Observação
                        </label>
                        <textarea class="form-control" name="observation[]">{{ ($isUpdate) ? $data->getObservation() : '' }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>