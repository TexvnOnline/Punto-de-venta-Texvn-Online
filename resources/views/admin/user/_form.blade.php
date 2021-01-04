
<h3>Listado de roles</h3>
<div class="form-group">
 <ul class="list-unstyled">
     @foreach ($roles as $role)
        <li>
            <label>
                {!! Form::checkbox('roles[]', $role->id, null) !!}
                {{$role->name}}
                <em>({{$role->description}})</em>
            </label>
        </li>
     @endforeach
 </ul>
</div>