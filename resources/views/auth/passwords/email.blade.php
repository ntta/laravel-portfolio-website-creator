@extends('layouts.app_login')

@section('content')
<div class="card-header">Reset Password</div>
      <div class="card-body">
        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
        <div class="text-center mt-4 mb-5">
          <h4>Forgot your password?</h4>
          <p>Enter your email address and we will send you instructions on how to reset your password.</p>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input class="form-control" id="email" name="email" type="email" value="{{ old('email') }}" placeholder="Enter email address" required>

            @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
          </div>
          <button type="submit" class="btn btn-primary btn-block">
                                    Send Password Reset Link
                                </button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="{{ route('register') }}">Register an Account</a>
          <a class="d-block small" href="{{ route('login') }}">Login Page</a>
        </div>
      </div>
@endsection
