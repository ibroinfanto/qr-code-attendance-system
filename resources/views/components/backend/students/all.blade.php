<div class="p-2">
    <div class="p-2 block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">STUDENT MANAGEMENT</h3>
            <a href="{{ route('students.add') }}" class="btn btn-primary">Add Student</a>
            <div class="block-options">

            </div>
        </div>
        <div class="block-content">

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                    <tr>
                        <th style="width: 10%;">#</th>
                        <th>Name</th>
                        <th style="width: 25%;">Matric</th>
                        <th style="width: 20%;">Level</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if($students->count() > 0)
                        @foreach($students as $student)
                            <tr>

                                <td class="fw-semibold fs-sm">
                                    <a href="">{{ ++$loop->index }}</a>
                                </td>
                                <td class="fw-semibold fs-sm">
                                    {{ $student->name }}
                                </td>
                                <td class="fs-sm">{{ $student->matric }}</em></td>
                                <td>
                                    {{ $student->level }}
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('students.view', ['id' => $student->id]) }}">
                                            <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" aria-label="View" data-bs-original-title="View">
                                                <i class="fa fa-fw fa-pencil-alt"></i>
                                            </button>
                                        </a>

                                        <form action="{{ route('students.delete', ['id' => $student->id]) }}" method="POST">

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
