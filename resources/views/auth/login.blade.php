<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/theme/img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/theme/assets/bootstrap/css/bootstrap.min.css">
    <!-- icon css-->
    <link rel="stylesheet" href="/theme/assets/elagent-icon/style.css">
    <link rel="stylesheet" href="/theme/assets/animation/animate.css">
    <link rel="stylesheet" href="/theme/css/style.css">
    <link rel="stylesheet" href="/theme/css/responsive.css">
    <title>Sign in - IntelPS Docs</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>

<body data-scroll-animation="true">
    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="round_spinner">
                <div class="spinner"></div>
                <div class="text">
                    <img src="/theme/img/spinner_logo.png" alt="">
                    <h4><span>IntelliSAS</span></h4>
                </div>
            </div>
            <h2 class="head">Did You Know?</h2>
            <p></p>
        </div>
    </div>
    <div class="body_wrapper">
        <section class="signup_area">
            <div class="row ml-0 mr-0">
                <div class="sign_left signin_left">
                    <h2>We are design changers do what matters.</h2>
                    <img class="position-absolute top" src="/theme/img/signup/top_ornamate.png" alt="top">
                    <img class="position-absolute bottom" src="/theme/img/signup/bottom_ornamate.png" alt="bottom">
                    <img class="position-absolute middle" src="/theme/img/signup/door.png" alt="bottom">
                    <div class="round"></div>
                </div>
                <div class="sign_right signup_right">
                    <div class="sign_inner signup_inner">
                        <div class="text-center">
                            <h3>Sign in to KbDoc platform</h3>
                            <p>Don’t have an account yet? <a href="signup.html">Sign up here</a></p>
                            <a href="#" class="btn-google"><img src="img/signup/gmail.png" alt=""><span class="btn-text">Sign in with Gmail</span></a>
                        </div>
                        <div class="divider">
                            <span class="or-text">or</span>
                        </div>
                        <form  id="login-form" class="row login_form">
                            <div class="col-lg-12 form-group">
                                <div class="small_text">Your email/Phone</div>
                                <input type="email" class="form-control" id="email" name="email_or_phone" placeholder="Email/Phone">
                            </div>
                            <div class="col-lg-12 form-group">
                                <div class="small_text">Password</div>
                                <div class="confirm_password">
                                    <input id="confirm-password" name="password" type="password" class="form-control" placeholder="******" autocomplete="off">
                                    <a href="#" class="forget_btn">Forgotten password?</a>
                                </div>
                            </div>

                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn action_btn thm_btn">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/theme/js/jquery-3.2.1.min.js"></script>
    <script src="/theme/js/pre-loader.js"> </script>
    <script src="/theme/assets/bootstrap/js/popper.min.js"></script>
    <script src="/theme/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/theme/js/parallaxie.js"></script>
    <script src="/theme/js/TweenMax.min.js"></script>
    <script src="/theme/assets/wow/wow.min.js"></script>
    <script src="/theme/js/main.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

	<script>
    
		$(document).ready(function() {
			$('#login-form').submit(function(event) {
				event.preventDefault();
				var submitButton = $(this).find('button[type="submit"]');
				submitButton.prop('disabled', true).html(
					'<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
				);

				var formData = new FormData(this);

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: '/login',
					type: 'POST',
					data: formData,
					processData: false,
					contentType: false,
					success: function(response) {
						submitButton.prop('disabled', false).text('Login');

						if (response.success) {
							toastr.success('Login successful. Redirecting to dashboard...');
							setTimeout(function() {
								window.location.href = response.redirect_url;
							}, 200);
						} else {
							toastr.danger('Invalid credentials.');
						}
					},
					error: function(xhr, status, error) {
						submitButton.prop('disabled', false).text('Login');

						var response = xhr.responseJSON;
						if (response && response.errors && response.errors.login_error) {
							toastr.danger(response.errors.login_error[0]);
						} else if (response && response.message) {
							toastr.error(response.message);
						} else {
							toastr.error('An error occurred. Please try again.');
						}
					}
				});
			});
		});
	</script>
</body>

</html>