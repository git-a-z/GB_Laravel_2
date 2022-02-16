@extends('layouts.admin')

@section('title')
{{ __('labels.СreateUser') }} 
@endsection

@section('pageName')
{{ __('labels.СreateUser') }} 
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        {{ Form::open(array('route' => 'admin::user::create')) }}
            <div class="form-group">
                <div class="form-group">
                    <label>{{ __('labels.Name') }}</label>
                    <input class="form-control" type="text" name="name">
                </div>
                <div class="form-group">
                    <label>{{ __('labels.Email') }}</label>
                    <input class="form-control" type="email" name="email">
                </div>
                <div class="form-group">
                    <label>{{ __('labels.Admin') }}</label>
                    <div><input type="checkbox" name="is_admin"></div>
                </div>
                <div class="form-group">
                    <label>{{ __('labels.Password') }}</label>
                    <input class="form-control" type="password" name="password">
                </div>
            </div>
            <div class="form-group">
                {{ Form::submit(__('labels.create'), ['class' => 'btn btn-success']) }}
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection