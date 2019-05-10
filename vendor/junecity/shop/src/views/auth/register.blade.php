@extends('junecity::layouts.auth')

@section('content')

<div class="register-box">
      <div class="register-logo">
        <a href="{{ url('/')}}"><b>Junecity</b></a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>

        {!! Form::open(['role'=>'form', 'route'=>'post-register']) !!}
        
            {!! csrf_field() !!} 

          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>  
        
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;">
                  <input type="checkbox" ><ins class="iCheck-helper"></ins></div> I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
          </div>
    {!! Form::close() !!}

        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using Google+</a>
        </div>

        <a href="{{ url('auth/login')}}" class="text-center">I already have a membership</a>
      </div><!-- /.form-box -->
    </div>

@endsection

