<!-- Page Content -->
<div class="pr-5 pl-5">
<div class="content">
    <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _js/pages/be_forms_validation.js) -->
    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
    <form class="js-validation" action="{{ route('staff.update', ['id' => $user->id]) }}" method="POST">

        @csrf
        @method('PATCH')

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Staff Information</h3>
            </div>
            <div class="block-content block-content-full">
                <!-- Regular -->
                <div class="row items-push">
                    <div class="col-lg-4">
                        <p class="fs-sm text-muted">
                            <strong>NOTE:</strong><br>
                            Updating user role will change your own role from an <strong>ADMIN</strong> to an <strong>INVIGILATOR</strong>
                        </p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <div class="mb-4">
                            <label class="form-label" for="val-username">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="{{ $user->name ?? old('name') }}" id="val-username" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="val-email">Email <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="{{ $user->email ?? old('email') }}" id="val-email" disabled>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="example-select">Role</label>
                            <select class="form-select" id="example-select" name="role">
                                <option selected value="{{ $user->role }}">{{ $user->role ?? old('role') }}</option>
                                @foreach(\App\Utils\Utility::USER_ROLES as $key => $value)
                                    @if($user->role != $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- END Regular -->
                <!-- Submit -->
                <div class="row items-push">
                    <div class="col-lg-7 offset-lg-4">
                        <button type="submit" class="btn btn-alt-primary">Update Role</button>
                    </div>
                </div>
                <!-- END Submit -->
            </div>
        </div>
    </form>
    <!-- jQuery Validation -->
</div>
<!-- END Page Content -->
</div>
