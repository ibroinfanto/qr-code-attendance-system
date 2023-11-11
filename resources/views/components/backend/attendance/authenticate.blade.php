<!-- Page Content -->
<div class="pr-5 pl-5">
    <div class="content">
        <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _js/pages/be_forms_validation.js) -->
        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
        <form class="js-validation" action="{{ route('attendance.authenticate') }}" method="POST">

            @csrf

            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Mark Attendance</h3>
                </div>
                @if (session('info'))
                    <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <div class="alert alert-secondary alert-dismissible alert-danger" role="alert">
                            <p class="mb-0">
                                {{ session()->get('info') }} !
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    </nav>
                @endif
                @if (session('success'))
                    <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <div class="alert alert-secondary alert-dismissible alert-success" role="alert">
                            <p class="mb-0">
                                {{ session()->get('success') }} !
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    </nav>
                @endif
                <div class="block-content block-content-full">
                    <!-- Regular -->
                    <div class="row items-push">
                        <div class="col-lg-4">
                            <p class="fs-sm text-muted">
                                Authenticate Student
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">

                            <div class="mb-4">
                                <label class="form-label" for="val-username">Matric Number <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="matric" value="{{ old('matric') }}"
                                    id="val-username">

                                @if ($errors->any('matric'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('matric') }}</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="val-username">Select attendance <span
                                        class="text-danger">*</span></label>

                                <select name="attendance" class="form-select" id="">
                                    <option selected value=>select one..</option>
                                    @foreach ($attendances as $attendance)
                                        <option value="{{ $attendance->id }}">{{ $attendance->title }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->any('attendance'))
                                    <p style="color: red; font-size: medium">{{ $errors->first('attendance') }}</p>
                                @endif
                            </div>


                            <div class="mb-4">
                                <input type="submit" class="form-control btn btn-primary bg-slate-500"
                                    value="Verify Student">
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
