@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
    @lang('auth/form.title') :: @parent
@stop

{{-- Page content --}}
@section('content')

<div class="row header">
    <div class="col-md-12">
		<h3>@lang('auth/form.signin_account')</h3>
	</div>
</div>

<div class="row form-wrapper">

	<form method="post" action="{{ route('signin') }}" class="form-horizontal">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />

			<div class="form-group">
				<label class="col-md-6 control-label"></label>
					<div class="col-md-5">
						<br><a href="{{ route('forgot-password') }}" class="btn btn-link">@lang('auth/form.forgot_password')</a>
					</div>
				</div>

			<!-- Email -->
			<div class="form-group{{ $errors->first('email', ' error') }}">
				<label for="email" class="col-md-3 control-label">@lang('auth/form.email')</label>
					<div class="col-md-5">
						<input class="form-control" type="email" name="email" id="email" value="{{ Input::old('email') }}" />
						{{ $errors->first('email', '<span class="alert-msg"><i class="icon-remove-sign"></i> :message</span>') }}
					</div>
			</div>

			<!-- Password -->
			<div class="form-group{{ $errors->first('password', ' error') }}">
				<label for="password" class="col-md-3 control-label">@lang('auth/form.password')</label>
					<div class="col-md-5">
						<input class="form-control" type="password" name="password" id="password" value="{{ Input::old('password') }}" />
						{{ $errors->first('password', '<span class="alert-msg"><i class="icon-remove-sign"></i> :message</span>') }}
					</div>
			</div>

			 <div class="field-box">
				<label class="col-md-3 control-label checkbox-inline"></label>
				  <input type="checkbox" name="remember-me" id="remember-me" value="1" /> <label for="remember-me">@lang('auth/form.remember')</a>
				</label>
			</div>

			<!-- Form actions -->
				<div class="form-group">
				<label class="col-md-6 control-label"></label>
					<div class="col-md-5">
						<a class="btn btn-link" href="{{ route('home') }}">@lang('general.cancel')</a>
						<button type="submit" class="btn btn-success"><i class="icon-ok icon-white"></i> @lang('auth/form.signin')</button>
					</div>
				</div>





	</form>
</div>
@stop
