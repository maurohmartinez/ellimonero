@foreach (\Backpack\MenuCRUD\app\Models::getTree(); as $item)
  <a class="no-underline hover:underline p-3"
     href="{{$item->url()}}">
     {{ $item->name }}
  </a> 
@endforeach 