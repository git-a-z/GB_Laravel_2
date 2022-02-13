@extends('layouts.main')

@section('title')
{{ __('labels.News') }} 
@endsection

@section('pageName')
{{ __('labels.News') }} 
@endsection

@section('content')
<div>
    @isset($card->title)
        <h5>{{ $card->title }}</h5>
    @endisset

    @isset($card->text)
        {{ $card->text }}
    @endisset

    @empty($card)
        {{ $noMoreNews }}
    @endempty    
</div>
@endsection