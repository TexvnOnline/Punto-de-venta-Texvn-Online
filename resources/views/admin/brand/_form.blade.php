<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" 
            name="name" 
            id="name" 
            value="{{old('name', $brand->name)}}"
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
            <textarea 
            class="form-control 
            @error('description') 
                is-invalid 
            @enderror" 
            name="description" 
            id="description" 
            rows="3" 
            required
            >{{old('description',$brand->description)}}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">

        <div class="form-group">
            <label for="file">Imagen de marca</label><br>
            <div class="kv-avatar">
                <div class="file-loading">
                    <input id="file" name="file" type="file">
                </div>
            </div>
            <div class="kv-avatar-hint mb-3">
                <small id="fileHelpId" class="form-text text-muted">Se recomienda que el tamaño de la imagen sea de <strong>260x65</strong> a <strong>270x75</strong>px.</small>
            </div>
            @error('file')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
            <div id="kv-avatar-errors-1" class="center-block" ></div>
        </div>
    </div>
</div>
 <button type="submit" class="btn btn-primary mr-2">{{ __($btnText) }}</button>
 <a href="{{ URL::previous() }}" class="btn btn-light">
    Cancelar
 </a>