@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                                <div class="row margin-top-20">
                                    <div class="col-md-6">
                                        <a href="{{ route("socialite.redirect", ['provider' => 'github']) }}" class="btn btn-block btn-social btn-github">
                                            <span class="fa fa-github"></span> Sign in with Github
                                        </a>
                                        <a href="{{ route("socialite.redirect", ['provider' => 'facebook']) }}" class="btn btn-block btn-social btn-facebook">
                                            <span class="fa fa-facebook"></span> Sign in with Facebook
                                        </a>
                                        <a href="{{ route("socialite.redirect", ['provider' => 'twitter']) }}" class="btn btn-block btn-social btn-twitter">
                                            <span class="fa fa-twitter"></span> Sign in with Twitter
                                        </a>
                                        <a href="{{ route("socialite.redirect", ['provider' => 'google']) }}" class="btn btn-block btn-social btn-google">
                                            <span class="fa fa-google"></span> Sign in with Google
                                        </a>

                                        <a href="{{ route("socialite.redirect", ['provider' => 'zerotouch']) }}" class="btn btn-block btn-social btn-openid">
                                            <span class="fa fa-universal-access"></span> Sign in with ZeroTouch
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!--
Below we include the Login Button social plugin. This button uses
the JavaScript SDK to present a graphical Login button that triggers
the FB.login() function when clicked.
-->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Facebook Javascript Login</div>
                <div class="panel-body">


                    <!-- <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
                    </fb:login-button> -->

                    <div id="status">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer_scripts')
<script>

    $("body").facebookAutoLogon({client_id: '<?php echo config('services.facebook.client_id'); ?>'});

</script>




@endsection
