document.addEventListener("DOMContentLoaded", function () {
    intervalID = setInterval(function () {
        document.getElementById('decoding-badge').style.display = 'inline';
        //Start

        setTimeout(function () {
            // Stop

            document.getElementById('decoding-badge').style.display = 'none';
        }, 5000);
    }, 10000);
});
