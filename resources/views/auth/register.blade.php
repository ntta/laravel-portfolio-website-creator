@extends('layouts.app_login')

@section('content')

      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
          {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name">Name</label>
              <input class="form-control" id="name" name="name" type="text" placeholder="Enter name" required autofocus>
              @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
            </div>
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">Email address</label>
            <input class="form-control" id="email" name="email" type="email" placeholder="Enter email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="form-row">
              <div class="col-md-6">
                <label for="password">Password</label>
                <input class="form-control" id="password" name="password" type="password" placeholder="Password" required>
                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
              </div>
              <div class="col-md-6">
                <label for="password-confirm">Confirm password</label>
                <input class="form-control" id="password-confirm" name="password_confirmation" type="password" placeholder="Confirm password" required>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">
                                    Register
                                </button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="{{ route('login') }}">Login Page</a>
          <a class="d-block small" href="{{ route('password.request') }}">Forgot Password?</a>
        </div>
      </div>

@endsection
