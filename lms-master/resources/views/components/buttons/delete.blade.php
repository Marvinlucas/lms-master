<div class="m-1">
    <form class="delete-item" action="{{ route($path , $itemId) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="dropdown-item ">
            <span class="fa-solid fa-trash-can pr-2" style="color: red;"></i></span>
            @lang('Delete')
        </button>
    </form>


</div>

