@extends('layouts.main')

@section('title')
{{ __('labels.Home') }} 
@endsection

@section('pageName')
{{ __('labels.Home') }} 
@endsection

@section('content')
    <div>
        <div><a href='{{ route('news::catalog') }}'>News</a></div> 
        <div><a href='{{ route('category::catalog') }}'>Categories</a></div> 
    </div>
@endsection