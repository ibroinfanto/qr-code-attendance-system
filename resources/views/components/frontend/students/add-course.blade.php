<!-- Page Content -->
<div class="hero-static d-flex align-items-center">
    <div class="content">
        <div class="row justify-content-center push">
            <div class="col-md-8 col-lg-6 col-xl-6">
                <!-- Sign Up Block -->
                <div class="block block-rounded mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">SELECT COURSES</h3>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary">Cancel</a>


                    </div>
                    <div class="block-content">
                        <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
                            <form class="js-validation-signup"
                                  action="{{ route('students.store.course', ['id' => $student]) }}" method="POST"
                                  enctype="multipart/form-data">

                                @csrf

                                <div class="mb-4">
                                    <label class="form-label">Select courses as applied to this student.</label>
                                    @foreach ($courses as $course)

                                        <div class="space-y-2">
                                            <div class="form-check">
                                                <input type="checkbox" value="{{ $course->id }}" class="form-checkbox "
                                                       id="{{ $course->id }}" name="courses[]">
                                                <label class="form-check-label"
                                                       for="{{ $course->id }}">{{ $course->title }}</label>
                                            </div>
                                        </div>
                                    @endforeach


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
