


<!DOCTYPE html>
@langrtl
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @endlangrtl
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-Council</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
    <style>
body{
    font-family:Cairo;
}
.imgDiv{
    background-image: url("{{ asset('img/frontend/course/01.svg') }}");
    background-repeat: no-repeat;
    background-size: 100% 100%;
    margin-left: -3.5%;
    
}
.imgDivReg{
    background-image: url("{{ asset('img/frontend/course/02.svg') }}");
    background-repeat: no-repeat;
    background-size: 100% 100%;
    margin-left: -3.5%;
    
}

.formDiv{
    
    height: 100vh;
    margin-left: 3%;
}

.loginBtn{
    background-color: #52ADE1;
    height: 50px;
}

.facebookBtn{
    background-color: #289AEC;
    height: 50px;
}

.facebookBtn img{
    background-size: cover;
    margin-right: 10px;
}


.googleBtn img{
    background-size:cover;
    margin-right: 10px;
}

.googleBtn{
    background-color: #CF2D48;
    height: 50px;
}

@media(max-width : 991px){
    .imgDiv{
        display: none;
    } 
    .imgDivReg{
        display: none;
    } 
}
</style>
</head>
<body>
@if(!auth()->check())

<div class="container-fluid">
      <div class="row">
       
        <div class="formDiv col-lg-6 text-md-left text-center">
        <div class="row col-lg-8"> 
       
          <div class="col-md-10 offset-md-1 text-right">
            <img class="img-fluid"  src="{{ asset('img/frontend/course/E-Council.png') }}">
          </div>
          <div class="col-md-10 offset-md-1 mb-3 text-right">
            <h2>@lang('labels.frontend.login.welcome')</h2>
          <h6 class="text-muted">@lang('labels.frontend.login.please_login')</h6>
          </div>
          <div class="col-md-10 offset-md-1 text-right">
          <span class="success-response text-success">{{(session()->get('flash_success'))}}</span>
          <form id="loginForm" action="{{route('frontend.auth.login.post')}}"
                                  method="POST" enctype="multipart/form-data">
                                  @csrf
            <div class="form-group text-right">
              <label for="exampleInputEmail1">@lang('labels.frontend.login.user_name')</label>
              <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <span id="login-email-error" class="text-danger"></span>
            </div>
            <div class="form-group text-right">
              <label for="exampleInputPassword1">@lang('labels.frontend.login.password')</label>
              <input name="password" type="password" class="form-control" id="exampleInputPassword1">
              <span id="login-password-error" class="text-danger"></span>
            </div>
            <div class="row">
              <div class="col-md-6 text-right">
                <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">@lang('labels.frontend.login.remember')</label>
              </div>
              </div>
              <div class="col-md-6">
                <a  href="{{ route('frontend.auth.password.reset') }}" class="text-muted">@lang('labels.frontend.login.forgot')</a>
              </div>
              @if(config('access.captcha.registration'))
                                    <div class="contact-info mb-2 text-center">
                                        {!! Captcha::display() !!}
                                        {{ html()->hidden('captcha_status', 'true') }}
                                        <span id="login-captcha-error" class="text-danger"></span>

                                    </div>
                                @endif
            </div>
            <button type="submit"  value="Submit" class="btn loginBtn text-white col-12 mt-5">@lang('labels.frontend.login.login')</button>
          </form>
          <h5 class="mt-5"> @lang('labels.frontend.login.login_with') </h5>
          <div class="row mt-3 ">
            <div class="col-md-6">
              <a  href="{{ url('login/facebook') }}" class="btn btn-block facebookBtn text-white"><img src="{{ asset('img/frontend/course/facebook.svg') }}">@lang('labels.frontend.login.facebook')</a>
            </div>
            <div class="col-md-6 mt-3 mt-md-0">
              <a   class="btn btn-block googleBtn text-white"><img src="{{ asset('img/frontend/course/google.svg') }}">@lang('labels.frontend.login.google')</a>
            </div>
          </div>
            <div><a href="{{ route('registerrtl.indexrtl') }}" class="text-dark col-12 d-flex justify-content-center mt-5">@lang('labels.frontend.login.sign_up')</a></div>
            <div class="mb-2"><a href="#" class="text-dark col-12 d-flex justify-content-center mt-3">@lang('labels.frontend.login.terms_of_use')</a></div>
        
        </div>  
        </div>
        
      </div>
      <div  class="col-md-6 imgDiv">
        </div>
    </div>


    @endif
 @push('after-scripts')




    <script src="{{asset('assets/js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/jarallax.js')}}"></script>
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/lightbox.js')}}"></script>
    <script src="{{asset('assets/js/jquery.meanmenu.js')}}"></script>
    <script src="{{asset('assets/js/scrollreveal.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/js/gmap3.min.js')}}"></script>

    <script src="{{asset('assets/js/switch.js')}}"></script>
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function () {
                $(document).on('click', '.go-login', function () {
                    $('#register').removeClass('active').addClass('fade')
                    $('#login').addClass('active').removeClass('fade')

                });
                $(document).on('click', '.go-register', function () {
                    $('#login').removeClass('active').addClass('fade')
                    $('#register').addClass('active').removeClass('fade')
                });

                $(document).on('click', '#openLoginModal', function (e) {
                    $.ajax({
                        type: "GET",
                        url: "{{route('frontend.auth.login')}}",
                        success: function (response) {
                            $('#socialLinks').html(response.socialLinks)
                            $('#myModal').modal('show');
                        },
                    });
                });

                $('#loginForm').on('submit', function (e) {
                    e.preventDefault();

                    var $this = $(this);
                    $('.success-response').empty();
                    $('.error-response').empty();

                    $.ajax({
                        type: $this.attr('method'),
                        url: $this.attr('action'),
                        data: $this.serializeArray(),
                        dataType: $this.data('type'),
                        success: function (response) {
                            $('#login-email-error').empty();
                            $('#login-password-error').empty();
                            $('#login-captcha-error').empty();

                            if (response.errors) {
                                if (response.errors.email) {
                                    $('#login-email-error').html(response.errors.email[0]);
                                }
                                if (response.errors.password) {
                                    $('#login-password-error').html(response.errors.password[0]);
                                }

                                var captcha = "g-recaptcha-response";
                                if (response.errors[captcha]) {
                                    $('#login-captcha-error').html(response.errors[captcha][0]);
                                }
                            }
                            if (response.success) {
                                $('#loginForm')[0].reset();
                                if (response.redirect == 'back') {
                                    window.location.href = "{{url('/')}}"
                                } else {
                                    window.location.href = "{{route('admin.dashboard')}}"
                                }
                            }
                        },
                        error: function (jqXHR) {
                            var response = $.parseJSON(jqXHR.responseText);
                            console.log(jqXHR)
                            if (response.message) {
                                $('#login').find('span.error-response').html(response.message)
                            }
                        }
                    });
                });

                $(document).on('submit','#registerForm', function (e) {
                    e.preventDefault();
                    console.log('he')
                    var $this = $(this);

                    $.ajax({
                        type: $this.attr('method'),
                        url: "{{  route('frontend.auth.register.post')}}",
                        data: $this.serializeArray(),
                        dataType: $this.data('type'),
                        success: function (data) {
                            $('#first-name-error').empty()
                            $('#last-name-error').empty()
                            $('#email-error').empty()
                            $('#password-error').empty()
                            $('#captcha-error').empty()
                            if (data.errors) {
                                if (data.errors.first_name) {
                                    $('#first-name-error').html(data.errors.first_name[0]);
                                }
                                if (data.errors.last_name) {
                                    $('#last-name-error').html(data.errors.last_name[0]);
                                }
                                if (data.errors.email) {
                                    $('#email-error').html(data.errors.email[0]);
                                }
                                if (data.errors.password) {
                                    $('#password-error').html(data.errors.password[0]);
                                }

                                var captcha = "g-recaptcha-response";
                                if (data.errors[captcha]) {
                                    $('#captcha-error').html(data.errors[captcha][0]);
                                }
                            }
                            if (data.success) {
                                $('#registerForm')[0].reset();
                                $('#register').removeClass('active').addClass('fade')
                                $('.error-response').empty();
                                $('#login').addClass('active').removeClass('fade')
                                $('.success-response').empty().html("@lang('labels.frontend.modal.registration_message')");
                            }
                        }
                    });
                });
            });

        });
    </script>


  
</body>
</html>    