<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" 
            class="form-control
            @error('name') 
                is-invalid 
            @enderror
            " 
            name="name" 
            id="name" 
            value="{{old('name', $provider->name)}}"
            required>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input 
            type="email" 
            class="form-control
            @error('email') 
                is-invalid 
            @enderror
            " 
            name="email" 
            id="email" 
            value="{{old('email', $provider->email)}}"
            required>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="ruc_number">Numero de RUC</label>
            <input 
            type="number" 
            class="form-control
            @error('ruc_number') 
                is-invalid 
            @enderror
            "
            name="ruc_number" 
            id="ruc_number" 
            value="{{old('ruc_number', $provider->ruc_number)}}"
            required>
            @error('ruc_number')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label for="address">Dirección</label>
            <input type="text" 
            class="form-control
            @error('address') 
                is-invalid 
            @enderror
            " 
            name="address" 
            id="address" 
            value="{{old('address', $provider->address)}}"
            required>
            @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="phone">Numero de contacto</label>
            <input 
            type="text" 
            class="form-control
            @error('phone') 
                is-invalid 
            @enderror
            " 
            name="phone" 
            id="phone" 
            value="{{old('phone', $provider->phone)}}"
            required>
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary mr-2">{{ __($btnText) }}</button>
<a href="{{route('providers.index')}}" class="btn btn-light">
    Cancelar
</a>
