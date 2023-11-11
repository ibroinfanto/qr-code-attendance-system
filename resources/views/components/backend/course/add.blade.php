<!-- Page Content -->
<div class="pr-5 pl-5">
    <div class="content">
        <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _js/pages/be_forms_validation.js) -->
        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
        <form class="js-validation" action="{{ route('course.add') }}" method="POST">

            @csrf

            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Course Information</h3>
                </div>
                <div class="block-content block-content-full">
                    <!-- Regular -->
                    <div class="row items-push">
                        <div class="col-lg-4">
                            <p class="fs-sm text-muted">
                                Add new course
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">

                            <div class="mb-4">
                                <label class="form-label" for="val-username">Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="course_title"
                                    value="{{ old('course_title') }}" id="val-username">

                                @if ($errors->any('course_title'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('course_title') }}</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="val-username">Code <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="course_code"
                                    value="{{ old('course_code') }}" id="val-username">

                                @if ($errors->any('course_code'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('course_code') }}</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="val-username">Unit <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="course_unit"
                                    value="{{ old('course_unit') }}" id="val-username">

                                @if ($errors->any('course_unit'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('course_unit') }}</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <input type="submit" class="form-control bg-slate-500" value="Save">
                            </div>

                        </div>
                    </div>
                    <!-- END Regular -->
                </div>
            </div>
        </form>
        <!-- jQuery Validation -->
    </div>
    <!-- END Page Content -->
</div>
