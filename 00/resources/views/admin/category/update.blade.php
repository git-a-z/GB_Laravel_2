@extends('layouts.admin')

@section('title')
{{ __('labels.EditCategory') }} 
@endsection

@section('pageName')
{{ __('labels.EditCategory') }} 
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        {{ Form::open(array('route' => array('admin::category::update', $category->id))) }}
            <div class="form-group">
                <label class="form-label">
                    {{ __('labels.CategoryTitle') }}: 
                </label>
                {{ Form::text('title', $category->title, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::submit(__('labels.update'), ['class' => 'btn btn-success']) }}
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection