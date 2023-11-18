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
            <h3 class="block-title">Students Attendance Report</h3>
            <button class="btn btn-primary float-left" id="printBtn">Print Report</button>
        </div>
        <div class="block-content">

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                    <tr>
                        <th style="width: 10%;">#</th>
                        <th style="width: 40%;">Name</th>
                        <th style="width: 30%;">Course</th>
                        <th style="width: 15%;">Attendance</th>
                        <th style="width: 15%;">Total lectures</th>
                        <th style="width: 15%;">Qualified for exams</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if (count($info) > 0)

                        @foreach ($info as $inf)
                            <tr>
                                <td class="fw-semibold fs-sm">
                                    <a href="">{{ ++$loop->index }}</a>
                                </td>
                                <td class="fw-semibold fs-sm">
                                    {{ $inf['student']->name }}
                                </td>
                                <td class="fs-sm">{{ $inf['lecture']->first()->course->title }}</em></td>

                                <td class="fw-semibold fs-sm">
                                    {{ $inf['score'] . "%" }}
                                </td>
                                <td class="fs-sm">{{ $inf['lecture']->count() }}</em></td>
                                <td class="fs-sm">{{ $inf['score'] >= 70 ? "TRUE" : "FALSE" }}</em></td>
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

<script>
    document.getElementById('printBtn').addEventListener('click', () => window.print());
</script>
