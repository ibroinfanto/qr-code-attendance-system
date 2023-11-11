@php use Illuminate\Support\Facades\Storage; @endphp
<div class="p-2">
    <div class="p-2 block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">ATTENDANCE MANAGEMENT</h3>
        </div>
        <div class="block-content" id="content-qr">

            <!-- Add a QR code display section -->
            <div class="text-center mb-4">
                <img src="{{ $url . $data }}" alt="QR Code" id="qr-code-image">
            </div>

            <!-- Add a "Print QR Code" button -->

        </div>
    </div>
</div>


