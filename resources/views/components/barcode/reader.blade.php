
<dt class="col-md-12">
    <Canvas id="videoCanvas" width="320" height="240"></Canvas>
</dt>
<dt class="col-md-12">
    <button id="decode" type="button" onclick="Decode()">Start decoding</button>
    <button id="stopDecode" type="button" onclick="StopDecode()">Stop decoding</button>
</dt>
<dt class="col-md-12">
    <p id="Result"></p>
</dt>

<script src="{{ asset('js/JOB.js') }}"></script>
<script src="{{ asset('js/barcode.js') }}"></script>
