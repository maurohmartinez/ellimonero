@if($flash = Session::get('flash'))
<div class="alert alert-{{ $flash['type'] ?? 'success' }}"><i class="la {{ $flash['icon'] ?? 'la-check' }}-circle mr-2"></i>{{ $flash['text'] }}
    @if(isset($flash['action_label']))
    <a href="{{ $flash['action_url'] }}"><u>{{ $flash['action_label'] }}</u></a>
    @endif
</div>
@endif