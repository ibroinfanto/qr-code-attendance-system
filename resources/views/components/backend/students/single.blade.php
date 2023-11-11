<!-- Page Content -->
<div class="pr-5 pl-5">
<div class="content">
    <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _js/pages/be_forms_validation.js) -->
    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
    {{-- <form class="js-validation" action="" method="POST"> --}}

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Student Information</h3>

                @can('isInvigilator', \App\Models\User::class)
                    <form action="{{ route('attendance.mark', ['id' => $student->id]) }}" method="POST">
                        @csrf
                        <input type="text" value="{{ session()->get('attendance') }}" name="attendance" id="" hidden>
                        <button type="submit" class="btn btn-success float-left">Mark Attendance</button>
                    </form>
                @endcan
                
            </div>
            <div class="block-content block-content-full">
                <!-- Regular -->
                <div class="row items-push">
                    <div class="col-lg-4">
                        <p class="fs-sm text-muted">
                            View Student information
                        </p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <div class="col-md-6 col-xl-3">
                            <a class="block block-rounded block-link-pop text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <img class="img-avatar-rounded" style="width: 100%; height: 100%" src="{{ Storage::disk('s3')->url($student->image) }}" alt="">
                                </div>
                            </a>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="val-username">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="{{ $student->name ?? old('name') }}" id="val-username" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="val-email">Matric <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="{{ $student->matric ?? old('matric') }}" id="val-email" disabled>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="val-email">Level <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="{{ $student->level ?? old('level') }}" id="val-email" disabled>
                        </div>

                    </div>
                </div>
                <!-- END Regular -->
                <div class="row g-3">

                    <h5 class="content-baseline border-bottom mb-2 pb-2">REGISTERED COURSES</h5>

                    <div class="d-flex flex-wrap">
                        @foreach($student->courses as $course)

                            <div class="form-check">
                                <p class="form-check-label">{{ "(" . ++$loop->index . ")" . " " . $course->title }}</p>
                            </div>

                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    {{-- </form> --}}
    <!-- jQuery Validation -->
</div>
<!-- END Page Content -->
</div>
