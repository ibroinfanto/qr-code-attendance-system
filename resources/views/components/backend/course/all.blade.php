<div class="p-2">
    <div class="p-2 block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">ALL COURSES</h3>
            <a href="{{ route('course.add') }}">
                <button class="float-left btn btn-primary">Add Course</button>
            </a>
            <div class="block-options">

            </div>
        </div>
        <div class="block-content">

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th style="width: 10%;">#</th>
                            <th style="width: 15%;"">Code</th>
                            <th style="width: 55%;">Title</th>
                            <th style="width: 10%;">unit</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($courses->count() > 0)
                            @foreach ($courses as $course)
                                <tr>
                                    <td class="fw-semibold fs-sm">
                                        <a href="">{{ ++$loop->index }}</a>
                                    </td>
                                    <td class="fw-semibold fs-sm">
                                        {{ $course->code }}
                                    </td>
                                    <td class="fs-sm">{{ $course->title }}</em></td>
                                    <td>
                                        {{ $course->unit }}
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <form action="{{ route('course.delete', ['id' => $course->id]) }}"
                                                method="POST">

                                                @method('DELETE')
                                                @csrf

                                                <button type="submit"
                                                    class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled"
                                                    data-bs-toggle="tooltip" aria-label="Delete"
                                                    data-bs-original-title="Delete">
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
