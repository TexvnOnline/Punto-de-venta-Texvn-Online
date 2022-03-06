<div class="form-group">
    <label for="name">Nombre</label>
    <input 
    type="text" 
    name="name" 
    id="name" 
    value="{{old('name', $social_media->name)}}" 
    class="form-control 
    @error('name') 
        is-invalid 
    @enderror"
    required>
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="url">Enlace de la pagina</label>
    <input 
    type="url" 
    name="url" 
    id="url" 
    value="{{old('url', $social_media->url)}}" 
    class="form-control 
    @error('name') 
        is-invalid 
    @enderror"
    required>
    @error('url')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group" >
    <div id="icon_div">
        <label for="icon">Icono</label>
        <select class="form-control" name="icon" id="icon">
            <option value="" selected>-- Seleccione un icono --</option>
            @foreach (getIconsArray() as $icon)
            <option value="{{$icon}}"
            {{ old('icon', $social_media->icon) == $icon ? 'selected' : ''}}
            >{{$icon}}</option>
            @endforeach
        </select>
    </div>
</div>

 <button type="submit" class="btn btn-primary mr-2">{{ __($btnText) }}</button>
 <a href="{{ URL::previous() }}" class="btn btn-light">
    Cancelar
 </a>