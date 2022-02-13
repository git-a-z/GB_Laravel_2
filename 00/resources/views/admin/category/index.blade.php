@extends('layouts.admin')

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
            <a href='{{ route('admin::category::delete', ['id' => $item->id]) }}'>
                (delete)
            </a>
            <a href='{{ route('admin::category::edit', ['id' => $item->id]) }}'>
                (edit)
            </a>
        </div>
    @empty
        {{ $noMoreCategory }}
    @endforelse    
</div>
@endsection