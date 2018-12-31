
<dt class="col-md-6">
    <Canvas id="videoCanvas" width="320" height="240" style="background:transparent;z-index:1"></Canvas>
</dt>
<dt class="col-md-6">
    <button id="decode" type="button" onclick="Decode()">
        Start
        <span class="badge badge-pill badge-danger" id="decoding-badge" style="display:none;">Decoding</span>
    </button>
    <button id="stopDecode" type="button" onclick="StopDecode()">Stop decoding</button>
</dt>

<script src="{{ asset('js/JOB.js') }}"></script>
<script src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-3.3.7.min.js') }}"></script>
<script src="{{ asset('js/barcode.js') }}"></script>
