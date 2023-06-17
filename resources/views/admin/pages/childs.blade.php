<ul>
    @foreach ($childs as $child)
        <li class="row">
            {{ '🍃 ' . $child->title }}

            {{-- <form action="{{ route('admin.departament.update', $child->id) }}" method="POST">
                <input class="form-control input1" aria-label="Small" id='title' name="title">
                @csrf
            </form> --}}

            {{-- <form action="{{ route('admin.departament.delete', $child->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit">
                    <i class="bi bi-trash3-fill" style="padding-left: 10px"></i>
                </button>
            </form> --}}

            @if (count($child->childs))
                @include('admin.pages.childs', ['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ul>
