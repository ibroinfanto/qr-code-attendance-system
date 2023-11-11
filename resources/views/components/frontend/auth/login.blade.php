<!-- Page Content -->
<div class="hero-static d-flex align-items-center">
    <div class="content">
        <div class="row justify-content-center push">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <!-- Sign Up Block -->
                <div class="block block-rounded mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Sign In</h3>
                        
                    </div>
                    <div class="block-content">
                        <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
                           

                            <!-- Sign Up Form -->
                            <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js) -->
                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <form class="js-validation-signup" action="{{ route('login') }}" method="POST">

                                @csrf

                                <div class="py-3">
                                    <div class="mb-4">
                                        <input type="text"value="{{ old('email') }}" class="form-control form-control-lg form-control-alt" id="signup-username" name="email" placeholder="Email address">
                                        @if($errors->any('email'))
                                            <p style="color: red; font-size: medium">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>
                                    <div class="mb-4">
                                        <input type="password"value="{{ old('password') }}" class="form-control form-control-lg form-control-alt" id="signup-username" name="password" placeholder="Password">
                                        @if($errors->any('password'))
                                            <p style="color: red; font-size: medium">{{ $errors->first('password') }}</p>
                                        @endif
                                    </div>
                                   
                                  
                                 
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6 col-xl-5">
                                        <button type="submit" class="btn w-100 btn-primary">
                                             Sign In
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!-- END Sign Up Form -->
                        </div>
                    </div>
                </div>
                <!-- END Sign Up Block -->
            </div>
        </div>
        <div class="fs-sm text-muted text-center">
            <strong>Attendance System</strong> &copy; <span data-toggle="year-copy"></span>
        </div>
    </div>

</div>
<!-- END Page Content -->
