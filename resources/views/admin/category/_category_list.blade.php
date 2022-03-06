{{--  <tr class="treegrid-{{$category->id}}">  --}}
{{--  <tr class="treegrid-{{$subcategory_1->id}} treegrid-parent-{{$category->id}}">  --}}
{{--  <tr class="treegrid-{{$subcategory_2->id}} treegrid-parent-{{$subcategory_1->id}}">  --}}
<tr
@if ($form_number == '0')
class="treegrid-{{$category->id}}"
@elseif ($form_number == '1')
class="treegrid-{{$subcategory_1->id}} treegrid-parent-{{$category->id}}"
@elseif ($form_number == '2')
class="treegrid-{{$subcategory_2->id}} treegrid-parent-{{$subcategory_1->id}}"
@endif
>
    <td>
        <a class="text-primary" href="{{route('categories.show',$item)}}">{{$item->name}}</a>
    </td>
    <td>
        @if ($form_number == '0')
        <label class="badge badge-warning badge-pill">
            {{$item->category_type()}}
        </label>
        @endif
    </td>
    <td>
        <label class="badge badge-success badge-pill">
            ({{$item->item_numbers()}}) {{$item->counter_text()}}
        </label>
    </td>
    <td>{{$item->description}}</td>
    <td style="width: 20%;">
    <form method="POST" action="{{route('categories.destroy', $item)}}" id="delete-item_{{$item->id}}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <a href="{{route('categories.edit', $item)}}" class="btn btn-outline-info" title="Editar">
            <i class="far fa-edit"></i>
        </a>
        <button class="btn btn-outline-danger" title="Eliminar"
        type="button" onclick="confirmDelete('delete-item_{{$item->id}}')"
        >
            <i class="far fa-trash-alt"></i>
        </button>
    </form>
    </td>
</tr>