@extends('layouts.main')

@section('title')
{{ __('labels.Categories') }} 
@endsection

@section('pageName')
{{ __('labels.Categories') }} 
@endsection

@section('content')
<div>
    @forelse ($category as $item)
        <div>
            <a href='{{ route('category::news', ['id' => $item->id]) }}'>
                {{ $item->title }}
            </a>
        </div>
    @empty
        {{ $noMoreCategory }}
    @endforelse    
</div>
@endsection