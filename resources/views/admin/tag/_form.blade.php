<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name" value="{{$tag->name}}"
        class="form-control 
        @error('name') 
            is-invalid
        @enderror
        "
        required>
    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label for="description">Descripción</label>
    <textarea class="form-control 
                @error('description') 
                    is-invalid 
                @enderror
                "
                name="description" 
                id="description"
                rows="3" required>{{$tag->description}}</textarea>
    @error('description')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<button type="submit" class="btn btn-primary mr-2">{{ __($btnText) }}</button>
<a href="{{ URL::previous() }}" class="btn btn-light">
    Cancelar
</a>
