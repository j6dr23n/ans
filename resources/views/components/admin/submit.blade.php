@props(['action','data_id'])

<form class="float-left ml-1" action="{{ $action }}" method="post">
@csrf
@method('delete')
<a class="dltBtn text-blueGray-500 block py-1 px-3" data-id="{{ $data_id }}" type="submit">
    <i class="fas fa-trash-alt"></i>
</a>
</form>