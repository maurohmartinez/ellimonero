@foreach(\Backpack\MenuCRUD\app\Models\MenuItem::getTree() as $item)
@if(count($item->children) > 0)
<li><a href="{{ $item->url() }}">{{ $item->name }}</a>
    <ul class="dropdown">
        @foreach($item->children as $children)
        <li><a href="{{ $children->url() }}">{{ $children->name }}</a></li>
        @endforeach
    </ul>
</li>
@else
<li><a href="{{ $item->url() }}">{{ $item->name }}</a></li>
@endif
@endforeach
@if(backpack_auth()->check())
<li><a class="text-primary d-block" href="{{ route('backpack.auth.logout') }}">Salir</a></li>
@endif