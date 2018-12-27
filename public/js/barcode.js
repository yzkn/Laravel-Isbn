var result = document.getElementById("Result");
JOB.Init();
var localized = [];
var streaming = false;
JOB.StreamCallback = function (result) {
    if (result.length > 0) {
        var tempArray = [];
        for (var i = 0; i < result.length; i++) {
            tempArray.push(result[i].Format + " : " + result[i].Value);
        }
        Result.innerHTML = tempArray.join("<br />");
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
navigator.getUserMedia = (navigator.getUserMedia ||
    navigator.webkitGetUserMedia ||
    navigator.mozGetUserMedia ||
    navigator.msGetUserMedia);
if (navigator.getUserMedia) {
    navigator.getUserMedia({
            video: true,
            audio: true
        },
        function (localMediaStream) {
            video.src = window.URL.createObjectURL(localMediaStream);
            video.play();
            draw();
            streaming = true;
        },
        function (err) {
            console.log("The following error occured: " + err);
        }
    );
} else {
    console.log("getUserMedia not supported");
}

function Decode() {
    if (!streaming) return;
    JOB.DecodeStream(video);
}

function StopDecode() {
    JOB.StopStreamDecode();
}
