<!-- Page Content -->
<div class="pr-5 pl-5">
    <div class="content">
        <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _js/pages/be_forms_validation.js) -->
        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
        <form class="js-validation" action="{{ route('exam.add') }}" method="POST">
            @csrf
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Class Lecture Information</h3>
                </div>
                <div class="block-content block-content-full">
                    <!-- Regular -->
                    <div class="row items-push">
                        <div class="col-lg-4">
                            <p class="fs-sm text-muted">
                                Create new Class Lecture
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">

                            <div class="mb-4">
                                <label class="form-label" for="val-username">Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="exam_title"
                                    value="{{ old('exam_title') }}" id="val-username">

                                @if ($errors->any('exam_title'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('exam_title') }}</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="val-username">Course <span
                                        class="text-danger">*</span></label>
                                <select name="exam_course" id="" class="form-select">

                                    <option selected value=>Select course</option>

                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->any('exam_course'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('exam_course') }}</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="val-username">Class Date <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="exam_date"
                                    value="{{ old('exam_date') }}" id="val-username">

                                @if ($errors->any('exam_date'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('exam_date') }}</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="val-username">Start time <span
                                        class="text-danger">*</span></label>
                                <input type="time" class="form-control" name="exam_start_time"
                                    value="{{ old('exam_start_time') }}" id="val-username">

                                @if ($errors->any('exam_start_time'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('exam_start_time') }}</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="val-username">Stop time <span
                                        class="text-danger">*</span></label>
                                <input type="time" class="form-control" name="exam_stop_time"
                                    value="{{ old('exam_stop_time') }}" id="val-username">

                                @if ($errors->any('exam_stop_time'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('exam_stop_time') }}</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <input type="submit" class="btn btn-primary form-control bg-slate-500" value="Create Attendance">
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
