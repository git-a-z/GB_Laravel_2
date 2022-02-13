@extends('layouts.admin')

@section('title')
{{ __('labels.EditNews') }} 
@endsection

@section('pageName')
{{ __('labels.EditNews') }} 
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        {{ Form::open(array('route' => array('admin::news::update', $news->id))) }}
            <div class="form-group">
                <label class="form-label">
                    {{ __('labels.NewsTitle') }}: 
                </label>
                {{ Form::text('title', $news->title, ['class' => 'form-control']) }}
                <label class="form-label">
                    {{ __('labels.NewsText') }}: 
                </label>
                {{ Form::textarea('text', $news->text, ['class' => 'form-control']) }}
                <label class="form-label">
                    {{ __('labels.NewsCategory') }}: 
                </label>
                {{ Form::select('category_id', $categoryArray, $news->category_id, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::submit(__('labels.update'), ['class' => 'btn btn-success']) }}
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection