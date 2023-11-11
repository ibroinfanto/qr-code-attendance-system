<!-- Bootstrap Modal -->
<div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="attendanceModal" style="display: block;"
     aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="attendanceModal">Attendance Taking</h5>
                <a href="/">
                    <button type="button" class="close btn btn-secondary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </a>
            </div>
            <div class="modal-body">
                {{$message}}
            </div>
        </div>
    </div>
</div>
<!-- END Bootstrap Modal -->
