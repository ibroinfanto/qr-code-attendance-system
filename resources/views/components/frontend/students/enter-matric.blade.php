<!-- Page Content -->
<div class="hero-static d-flex align-items-center">
    <div class="content">
        <div class="row justify-content-center push">
            <div class="col-md-8 col-lg-6 col-xl-6">
                <!-- Sign Up Block -->
                <div class="block block-rounded mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">ENTER MATRIC NUMBER</h3>

                    </div>
                    <div class="block-content">
                        <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
                            <form class="js-validation-signup"
                                  action="{{ route('students.enter.matric', ['attendance' => $attendance, 'lecture' => $lecture]) }}"
                                  method="POST">

                                @csrf

                                <div class="mb-4">
                                    <input type="text" value="{{ old('matric') }}"
                                           class="form-control form-control-lg form-control-alt" id="signup-email"
                                           name="matric" placeholder="Matriculation number">
                                    @if($errors->any('matric'))
                                        <p style="color: red; font-size: medium">{{ $errors->first('matric') }}</p>
                                    @endif
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-alt-success">
                                            Submit
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
