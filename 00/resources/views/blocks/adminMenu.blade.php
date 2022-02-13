<div class="menu">
    @forelse ($adminMenu as $item)
        <a href='{{ route($item['alias']) }}'>
            {{ $item['title'] }}
        </a>
    @empty
        <a href='/home'>home</a>
    @endforelse
</div>