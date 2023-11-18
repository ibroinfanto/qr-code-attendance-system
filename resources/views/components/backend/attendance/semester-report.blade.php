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
            <h3 class="block-title">All Lecture Classes</h3>
            <button class="btn btn-primary float-left" id="printBtn">Print Report</button>
        </div>
        <div class="block-content">

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                    <tr>
                        <th style="width: 10%;">#</th>
                        <th style="width: 10%;">Title</th>
                        <th style="width: 20%;">Course</th>
                        <th style="width: 10%;">Student average performance</th>
                        <th style="width: 15%;">Date</th>
                        <th style="width: 15%;">Period</th>
                        <th style="width: 20%;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if (count($lectureInfo) > 0)

                        @foreach ($lectureInfo as $info)
                            <tr>
                                <td class="fw-semibold fs-sm">
                                    <a href="">{{ ++$loop->index }}</a>
                                </td>
                                <td class="fw-semibold fs-sm">
                                    {{ $info['lecture']->title }}
                                </td>
                                <td class="fw-semibold fs-sm">
                                    {{ $info['lecture']->course->title }}
                                </td>
                                <td class="fs-sm">{{ $info['performance'] . "%"}}</em></td>
                                <td class="fs-sm">{{ $info['lecture']->date }}</em></td>
                                <td>
                                    {{ $info['lecture']->start_time . ' - ' . $info['lecture']->stop_time }}
                                </td>
                                <td>
                                    <a href="{{ route('attendance.semester.course', ['course' => $info['lecture']->course->id]) }}">View
                                        Student Performance</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>

                            <td class="fw-semibold text-center" colspan="7">
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

<script>
    document.getElementById('printBtn').addEventListener('click', () => window.print());
</script>
