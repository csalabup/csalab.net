@extends('junecity::layouts.auth')

@section('content')


<div class="login-box">
      <div class="login-logo">
        <a href="{{ url('/')}}"><b>Level 1 Uptime Optimization</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        {!! Form::open(['role'=>'form', 'route'=>'post-login']) !!}
            {!! csrf_field() !!}
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" autocomplete="off" name="email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" autocomplete="off" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox"></ins></div> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        {!! Form::close() !!}

        
        <a href="#">I forgot my password</a><br>
        <a href="{{ url('auth/register')}}" class="text-center">Register a new membership</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

@endsection





