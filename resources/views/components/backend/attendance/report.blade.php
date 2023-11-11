<div class="p-2">
    <div class="p-2 block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">ALL ATTENDANCES</h3>
            <button class="btn btn-primary float-left" id="printBtn">Print Report</button>
            <div class="block-options">

            </div>
        </div>
        <div class="block-content">

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th style="width: 10%;">#</th>
                            <th style="width: 35%;"">Student Name</th>
                            <th style="width: 30%;">Matric No.</th>
                            <th style="width: 25%;">Attended</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($students->count() > 0)

                            @foreach ($students as $student)
                                <tr>
                                    <td class="fw-semibold fs-sm">
                                        <a href="">{{ ++$loop->index }}</a>
                                    </td>
                                    <td class="fw-semibold fs-sm">
                                        {{ $student->name }}
                                    </td>
                                    <td class="fs-sm">{{ $student->matric }}</em></td>
                                    <td>
                                        True
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
<script>
    document.getElementById('printBtn').addEventListener('click', () => window.print());
</script>
