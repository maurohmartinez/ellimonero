@foreach(\Backpack\MenuCRUD\app\Models\MenuItem::getTree() as $item)
@if(count($item->children) > 0)
<div data-hover="1" data-delay="0" class="nav-dropdown w-dropdown">
    <div class="nav-dropdown-toggle w-dropdown-toggle">
        <a href="{{ $item->url() }}" class="nav-link-block on-dark w-inline-block">
            <div>{{ $item->name }}</div>
            <div class="dropdown-icon w-icon-dropdown-toggle"></div>
        </a>
    </div>
    <nav class="dropdown-list w-dropdown-list">
        @foreach($item->children as $children)
        <a href="{{ $children->url() }}" class="dropdown-link w-dropdown-link">{{ $children->name }}</a>
        @endforeach
    </nav>
</div>
@else
<a href="{{$item->url()}}" class="nav-link on-dark">{{ $item->name }}</a>
<!-- w--current -->
@endif
@endforeach