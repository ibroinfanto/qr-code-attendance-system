@if (session('info'))
    <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
        <div class="alert alert-secondary alert-dismissible alert-danger" role="alert">
            <p class="mb-0">
                {{ session()->get('info') }} !
            </p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </nav>
@endif
<div class="p-2">
    <div class="p-2 block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">ALL ATTENDANCES</h3>
            <div class="block-options">

            </div>
        </div>
        <div class="block-content">

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th style="width: 10%;">#</th>
                            <th style="width: 15%;">Title</th>
                            <th style="width: 30%;">Class</th>
                            <th style="width: 25%;">Period</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($attendances->count() > 0)

                            @foreach ($attendances as $attendance)
                                <tr>
                                    <td class="fw-semibold fs-sm">
                                        <a href="">{{ ++$loop->index }}</a>
                                    </td>
                                    <td class="fw-semibold fs-sm">
                                        {{ $attendance->lectureClass->course->code . ' ATTENDANCE' }}
                                    </td>
                                    <td class="fs-sm">{{ $attendance->lectureClass->title }}</em></td>
                                    <td>
                                        {{ $attendance->lectureClass->start_time . ' - ' . $attendance->lectureClass->stop_time }}
                                    </td>
                                    <td>
                                        <a href="{{ route('attendance.report', ['id' => $attendance->id]) }}">View
                                            Report</a>
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
