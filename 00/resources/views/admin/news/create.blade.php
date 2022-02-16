@extends('layouts.admin')

@section('title')
{{ __('labels.СreateNews') }} 
@endsection

@section('pageName')
{{ __('labels.СreateNews') }} 
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        {{ Form::open(array('route' => 'admin::news::create')) }}
            <div class="form-group">
                <label class="form-label">
                    {{ __('labels.NewsTitle') }}: 
                </label>
                {{ Form::text('title', '', ['class' => 'form-control']) }}
                <label class="form-label">
                    {{ __('labels.NewsText') }}: 
                </label>
                {{ Form::textarea('text', '', ['class' => 'form-control']) }}
                <label class="form-label">
                    {{ __('labels.NewsCategory') }}: 
                </label>
                {{ Form::select('category_id', $categoryArray, '', ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::submit(__('labels.create'), ['class' => 'btn btn-success']) }}
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection