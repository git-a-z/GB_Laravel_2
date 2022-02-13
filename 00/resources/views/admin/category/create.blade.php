@extends('layouts.admin')

@section('title')
{{ __('labels.СreateCategory') }} 
@endsection

@section('pageName')
{{ __('labels.СreateCategory') }} 
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        {{ Form::open(array('route' => 'admin::category::create')) }}
            <div class="form-group">
                <label class="form-label">
                    {{ __('labels.CategoryTitle') }}: 
                </label>
                {{ Form::text('title', '', ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::submit(__('labels.create'), ['class' => 'btn btn-success']) }}
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection