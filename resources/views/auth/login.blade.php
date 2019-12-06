@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fas fa-user-lock"></i> <b>LOGIN</b></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            

                            <div class="col-md-8 col-md-offset-2">
                                <div class="absoluteRightTop text-right">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <input id="email" type="email" style="width: 100%" class="search_iput" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <small><span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span></small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            

                            <div class="col-md-8 col-md-offset-2">
                                <div class="absoluteRightTop text-right">
                                    <i class="fas fa-key"></i>
                                </div>
                                <input id="password" type="password" style="width: 100%" class="search_iput" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <small><strong>{{ $errors->first('password') }}</strong></small>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>  <b>REMEMBER ME</b>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    <small><strong>Forgot Your Password?</strong></small>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
