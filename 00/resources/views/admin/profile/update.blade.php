@extends('layouts.main')

@section('title')
{{ __('labels.UserProfile') }}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>{{ __('labels.UserProfile') }}</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('admin::profile::update')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>{{ __('labels.Name') }}</label>
                    <input class="form-control" type="text" name="name"
                           value="{{$user->name ?? old('name')}}">
                </div>
                <div class="form-group">
                    <label>{{ __('labels.Email') }}</label>
                    <input class="form-control" type="email" name="email"
                           value="{{$user->email ?? old('email')}}">
                </div>
                <div class="form-group">
                    <label>{{ __('labels.NewPassword') }}</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="form-group">
                    <label>{{ __('labels.CurrentPassword') }}</label>
                    <input class="form-control" type="password" name="current_password">
                </div>
                <div class="form-group">
                    {{ Form::submit(__('labels.update'), ['class' => 'btn btn-success']) }}
                </div>
            </form>
        </div>
    </div>
@endsection