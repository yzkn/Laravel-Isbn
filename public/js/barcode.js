JOB.Init();
var localized = [];
var streaming = false;
JOB.StreamCallback = function (result) {
    if (result.length > 0) {
        var tempArray = [];
        for (var i = 0; i < result.length; i++) {
            // tempArray.push(result[i].Format + " : " + result[i].Value);
            if ($('#summary__isbn')) {
                if (result[i].Value.length == 13) {
                    if (result[i].Value.indexOf('97') == 0) {
                        $('#summary__isbn').val(result[i].Value);
                        StopDecode();
                        break;
                    }
                }
            }
        }
    }
};
JOB.SetLocalizationCallback(function (result) {
    localized = result;
});
JOB.SwitchLocalizationFeedback(true);
c = document.getElementById("videoCanvas");
ctx = c.getContext("2d");
video = document.createElement("video");
video.width = 640;
video.height = 480;

function draw() {
    try {
        ctx.drawImage(video, 0, 0, c.width, c.height);
        if (localized.length > 0) {
            ctx.beginPath();
            ctx.lineWIdth = "2";
            ctx.strokeStyle = "red";
            for (var i = 0; i < localized.length; i++) {
                ctx.rect(localized[i].x, localized[i].y, localized[i].width, localized[i].height);
            }
            ctx.stroke();
        }
        setTimeout(draw, 20);
    } catch (e) {
        if (e.name == "NS_ERROR_NOT_AVAILABLE") {
            setTimeout(draw, 20);
        } else {
            throw e;
        }
    }
}

// 旧
navigator.getUserMedia = (navigator.getUserMedia ||
    navigator.webkitGetUserMedia ||
    navigator.mozGetUserMedia ||
    navigator.msGetUserMedia);
if (navigator.getUserMedia) {
    navigator.getUserMedia({
            audio: false,
            video: {
                facingMode: {
                    exact: "environment"
                }
            }
        },
        function (localMediaStream) {
            video.srcObject = localMediaStream;
            video.play();
            draw();
            streaming = true;
        },
        function (err) {
            if (err.toString().indexOf('OverconstrainedError') != -1) {
                navigator.getUserMedia({
                        audio: false,
                        video: true
                    },
                    function (localMediaStream) {
                        video.srcObject = localMediaStream;
                        video.play();
                        draw();
                        streaming = true;
                    },
                    function (err) {
                        console.log("The following error occured: " + err);
                    }
                );
            } else {
                console.log("The following error occured: " + err);
            }
        }
    );
} else {
    console.log("getUserMedia not supported");
}

// 新
// navigator.mediaDevices = navigator.mediaDevices || ((navigator.mozGetUserMedia || navigator.webkitGetUserMedia) ? {
//     getUserMedia: function (c) {
//         return new Promise(function (y, n) {
//             (navigator.mozGetUserMedia ||
//                 navigator.webkitGetUserMedia).call(navigator, c, y, n);
//         });
//     }
// } : null);
// var constraints = {
//     audio: true,
//     video: {
//         facingMode: {
//             exact: "environment"
//         }
//     },
// };
// navigator.mediaDevices.getUserMedia(constraints)
//     .then(function (localMediaStream) {
//         video.srcObject = localMediaStream;
//         video.play();
//         draw();
//         streaming = true;
//     })
//     .catch(function (err) {});

function Decode() {
    if (!streaming) return;
    JOB.DecodeStream(video);
}

// タイマーのID
var intervalID = -1;

function StopDecode() {
    // タイマーが有効であれば止める
    if (intervalID != -1) {
        clearInterval(intervalID);
        intervalID = -1;
        return;
    }
}
window.onload = function () {
    intervalID = setInterval(function () {
        document.getElementById('decoding-badge').style.display = 'inline';
        Decode();
        setTimeout(function () {
            JOB.StopStreamDecode();
            document.getElementById('decoding-badge').style.display = 'none';
        }, 5000);
    }, 10000);
}
