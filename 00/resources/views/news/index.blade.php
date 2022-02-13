@extends('layouts.main')

@section('title')
{{ __('labels.News') }} 
@endsection

@section('pageName')
{{ __('labels.News') }} 
@endsection

@section('content')
<div>
    @forelse ($news as $item)
        <div>
            <a href='{{ route('news::card', ['id' => $item->id]) }}'>
                {{ $item->title }}
            </a>
        </div>
    @empty
        {{ $noMoreNews }}
    @endforelse    
</div>
@endsection