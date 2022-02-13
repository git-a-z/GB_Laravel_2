<div class="menu">
    @forelse ($menu as $item)
        <a href='{{ route($item['alias']) }}'>
            {{ $item['title'] }}
        </a>
    @empty
        <a href='/home'>home</a>
    @endforelse
</div>