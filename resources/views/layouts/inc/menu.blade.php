@foreach(\Backpack\MenuCRUD\app\Models\MenuItem::getTree() as $item)
@if(count($item->children) > 0)
<li><a href="{{ $item->url() }}">{{ $item->name }}</a>
    <ul class="dropdown">
        @foreach($item->children as $children)
        <li><a href="homepage.html">Home</a></li>
        @endforeach
    </ul>
</li>
@else
<li><a href="home-sidebar-minimal.html">{{ $item->name }}</a></li>
@endif
@endforeach