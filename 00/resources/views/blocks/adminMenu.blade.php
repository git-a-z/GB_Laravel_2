<div class="menu">
    @forelse ($adminMenu as $item)
        <a href='{{ route($item['alias']) }}'>
            {{ $item['title'] }}
        </a>
    @empty
        <a href='/home'>home</a>
    @endforelse
    <span class="locale">
        <a href='{{ route('locale', ['lang' => 'ru']) }}'>
            ru
        </a>
        <a href='{{ route('locale', ['lang' => 'en']) }}'>
            en
        </a>
    </span>
</div>