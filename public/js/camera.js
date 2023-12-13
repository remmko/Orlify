var video = null;
var canvas = null;
var photo = null;
var startbutton = null;
var streaming = false;
var width = 200;
var height = 200;
var hidden = null;

function startup() {
    video = document.getElementById('video');
    canvas = document.getElementById('canvas');
    photo = document.getElementById('photo');
    startbutton = document.getElementById('startbutton');

    navigator.mediaDevices
        .getUserMedia({ video: true, audio: false })
        .then(function (stream) {
            video.srcObject = stream;
            video.play();
        })
        .catch(function (err) {
            console.log('An error occurred: ' + err);
        });

    video.addEventListener(
        'canplay',
        function (ev) {
            if (!streaming) {
                height = video.videoHeight / (video.videoWidth / width);

                if (isNaN(height)) {
                    height = width / (4 / 3);
                }

                video.setAttribute('width', width);
                video.setAttribute('height', height);
                canvas.setAttribute('width', width);
                canvas.setAttribute('height', height);
                streaming = true;
            }
        },
        false,
    );

    startbutton.addEventListener(
        'click',
        function (ev) {
            takepicture();
            ev.preventDefault();
        },
        false,
    );

    clearphoto();
}

var hidden = document.getElementById('hidden');

function clearphoto() {
    var context = canvas.getContext('2d');
    context.fillStyle = '#AAA';
    context.fillRect(0, 0, canvas.width, canvas.height);

    var data = canvas.toDataURL('image/png');
    photo.setAttribute('src', data);
}

function takepicture() {
    var context = canvas.getContext('2d');
    if (width && height) {
        canvas.width = width;
        canvas.height = height;
        context.drawImage(video, 0, 0, width, height);

        var data = canvas.toDataURL('image/png');
        photo.setAttribute('src', data);
        hidden.value = data;
    } else {
        clearphoto();
    }
}

function stopCamera() {
    const stream = video.srcObject;
    const tracks = stream.getTracks();

    tracks.forEach(function (track) {
        track.stop();
    });

    video.srcObject = null;
}

function showModal() {
    var imageModal = document.getElementById('image-modal');
    imageModal.classList.remove('hidden');
    startup();
}

function hideModal() {
    var imageModal = document.getElementById('image-modal');

    imageModal.classList.add('hidden');
    stopCamera();
}

document
    .querySelector('[data-modal-target="image-modal"]')
    .addEventListener('click', showModal);

document
    .querySelector('[data-modal-hide="image-modal"]')
    .addEventListener('click', hideModal);
