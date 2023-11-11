<div class="p-5">
    <div class="p-5 block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">STAFF MANAGEMENT</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option">
                    Add Staff
                    <i class="si si-plus"></i>
                </button>
            </div>
        </div>
        <div class="block-content">

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                    <tr>
                        <th style="width: 10%;">#</th>
                        <th>Name</th>
                        <th style="width: 15%;">Email</th>
                        <th style="width: 30%;">Role</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if($users)
                        @foreach($users as $user)
                            <tr>

                                <td class="fw-semibold fs-sm">
                                    <a href="">{{ ++$loop->index }}</a>
                                </td>
                                <td class="fw-semibold fs-sm">
                                    {{ $user->name }}
                                </td>
                                <td class="fs-sm">{{ $user->email }}</em></td>
                                <td>
                                    {{ $user->role }}
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('staff.view', ['id' => $user->id]) }}">
                                            <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" aria-label="View" data-bs-original-title="View">
                                                <i class="fa fa-fw fa-pencil-alt"></i>
                                            </button>
                                        </a>

                                        <form action="{{ route('staff.delete', ['id' => $user->id]) }}" method="POST">

                                            @method('DELETE')
                                            @csrf

                                            <button type="submit" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" aria-label="Delete" data-bs-original-title="Delete">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    @else
                        <tr>

                            <td class="fw-semibold text-center" colspan="5">
                                <h5>NO DATA FOUND</h5>
                            </td>

                        </tr>
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
