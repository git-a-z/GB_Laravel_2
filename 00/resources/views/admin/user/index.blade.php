@extends('layouts.admin')

@section('title')
{{ __('labels.Users') }} 
@endsection

@section('pageName')
{{ __('labels.Users') }} 
@endsection

@section('content')
<div>
    @forelse ($users as $item)
        <div>             
            <a href='{{ route('admin::user::edit', ['id' => $item->id]) }}'>
                {{ $item->name }}
            </a>
            <a href='{{ route('admin::user::delete', ['id' => $item->id]) }}'>
                (delete)
            </a>
            <a href='{{ route('admin::user::edit', ['id' => $item->id]) }}'>
                (edit)
            </a>
        </div>
    @empty
        {{ $noMoreUsers }}
    @endforelse    
</div>
@endsection