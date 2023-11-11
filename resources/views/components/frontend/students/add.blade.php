<!-- Page Content -->
<div class="hero-static d-flex align-items-center">
    <div class="content">
        <div class="row justify-content-center push">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <!-- Sign Up Block -->
                <div class="block block-rounded mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Add New Student</h3>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary">Cancel</a>

                    </div>
                    <div class="block-content">
                        <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
                            <p class="fw-medium text-muted">
                                Please fill the following details to create a new student record.
                            </p>

                            <!-- Sign Up Form -->
                            <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js) -->
                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <form class="js-validation-signup" action="{{ route('students.store') }}" method="POST">

                                @csrf

                                <div class="py-3">
                                    <div class="mb-4">
                                        <input type="text"value="{{ old('name') }}" class="form-control form-control-lg form-control-alt" id="signup-username" name="name" placeholder="Full Name">
                                        @if($errors->any('name'))
                                            <p style="color: red; font-size: medium">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>

                                    <div class="mb-4">
                                        <input type="text" value="{{ old('matric') }}" class="form-control form-control-lg form-control-alt" id="signup-email" name="matric" placeholder="Matriculation number">
                                        @if($errors->any('matric'))
                                            <p style="color: red; font-size: medium">{{ $errors->first('matric') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-floating mb-4">
                                        <select class="form-select" id="school" name="level" aria-label="Floating label select example">
                                            <option selected value="">Select Level</option>
                                            @foreach($levels as $key => $level)
                                                <option value="{{ $level }}">{{ $level }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->any('level'))
                                            <p style="color: red; font-size: medium">{{ $errors->first('level') }}</p>
                                        @endif
                                        <label for="school">Select level</label>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <select class="form-select" id="school" name="school" aria-label="Floating label select example">
                                            <option selected value="">Select school</option>
                                            @foreach($schools as $school)
                                                <option value="{{ $school->id }}">{{ $school->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->any('school'))
                                            <p style="color: red; font-size: medium">{{ $errors->first('school') }}</p>
                                        @endif
                                        <label for="school">Select School</label>
                                    </div>

                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-alt-success">
                                            Get Started
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
            <strong>OneUI 5.5</strong> &copy; <span data-toggle="year-copy"></span>
        </div>
    </div>
</div>
<!-- END Page Content -->
