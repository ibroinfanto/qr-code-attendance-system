<div class="p-2">
    <div class="p-2 block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">CLASS LECTURES</h3>
            <a href="{{ route('exam.add') }}" class="btn btn-primary float-left">Create Class Lecture</a>
            <div class="block-options">

            </div>
        </div>
        <div class="block-content">

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                    <tr>
                        <th style="width: 10%;">#</th>
                        <th style="width: 35%;">Title</th>
                        <th style="width: 25%;">Course</th>
                        <th style="width: 15%;">Date</th>
                        <th style="width: 15%;">Start</th>
                        <th style="width: 15%;">Stop</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if($exams->count() > 0)
                        @foreach($exams as $exam)
                            <tr>

                                <td class="fw-semibold fs-sm">
                                    <a href="">{{ ++$loop->index }}</a>
                                </td>
                                <td class="fw-semibold fs-sm">
                                    {{ $exam->title }}
                                </td>
                                <td class="fs-sm">{{ $exam->course->code }}</em></td>
                                <td>
                                    {{ $exam->date }}
                                </td>
                                <td>
                                    {{ $exam->start_time }}
                                </td>
                                <td>
                                    {{ $exam->stop_time }}
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" style="margin-bottom: 5%">
                                        <a class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" href="{{ route("class.attendance.qr", ['id' => $exam->id]) }}">
                                            Get QR Code
                                        </a>
                                    </div>
                                    <div class="btn-group">

                                        <form action="{{ route('exam.delete', ['id' => $exam->id]) }}" method="POST">

                                            @method('DELETE')
                                            @csrf

                                            <button type="submit" class="btn btn-sm btn-alt-danger js-bs-tooltip-enabled" data-bs-toggle="tooltip" aria-label="Delete" data-bs-original-title="Delete">
                                                Delete
                                            </button>
                                        </form>

                                    </div>
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
