
<!doctype html>
<html lang="en">


<!-- Mirrored from www.wrraptheme.com/templates/lucid/hospital/light/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Feb 2021 16:45:32 GMT -->
<head>
<title>:: Lucid Hospital :: Login</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ asset('dashboard') }}/assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('dashboard') }}/assets/vendor/font-awesome/css/font-awesome.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{ asset('dashboard') }}/light/assets/css/main.css">
<link rel="stylesheet" href="{{ asset('dashboard') }}/light/assets/css/color_skins.css">
</head>

<body class="theme-cyan">
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main">
				<div class="auth-box">
                    <div class="top">
                        <img src="https://www.wrraptheme.com/templates/lucid/hospital/assets/images/logo-white.svg" alt="Lucid">
                    </div>
					<div class="card">
                        <div class="header">
                            <p class="lead">Login to your account</p>
                        </div>
                        <div class="body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input id="signin-email" type="email" class="form-control   @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Your email address">


                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input id="signin-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" autocomplete="current-password>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group clearfix mt-3">
                                    <label class="fancy-checkbox element-left">
                                        <input name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                        <span>Remember me</span>
                                    </label>								
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                                <div class="bottom mt-2">
                                    <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="{{ route('password.request') }}">Forgot password?</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
</html>
