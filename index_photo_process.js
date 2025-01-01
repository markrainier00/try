const video = document.getElementById('video');
const openCameraButton = document.getElementById('open-camera-btn');
const stopCameraButton = document.getElementById('stop-camera-btn');
const captureButton = document.getElementById('capture-btn');
const canvas = document.getElementById('canvas');
const capturedPhoto = document.getElementById('captured-photo');
const capturePrediction = document.getElementById('capture-prediction');
const fileInput = document.getElementById('file-upload');
const uploadedPhoto = document.getElementById('uploaded-photo');
const uploadPredictionText = document.getElementById('upload-prediction');

// Open the camera
openCameraButton.addEventListener('click', () => {
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            mediaStream = stream;
            video.srcObject = stream;
            openCameraButton.style.display = 'none';
            stopCameraButton.style.display = 'inline-block';
            captureButton.style.display = 'inline-block';
        })
        .catch(err => {
            console.error("Error accessing webcam: ", err);
            alert("Unable to access the camera. Please check permissions.");
        });
});

// Stop the camera
stopCameraButton.addEventListener('click', () => {
    if (mediaStream) {
        const tracks = mediaStream.getTracks();
        tracks.forEach(track => track.stop());
        video.srcObject = null;
        openCameraButton.style.display = 'inline-block';
        stopCameraButton.style.display = 'none';
        captureButton.style.display = 'none';
        capturedPhoto.style.display = 'none';
    }
    capturePrediction.textContent = "";
});

// Capture image
captureButton.addEventListener('click', () => {
    const context = canvas.getContext('2d');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    context.drawImage(video, 0, 0, canvas.width, canvas.height);
    // document.body.appendChild(canvas);

    const imageData = canvas.toDataURL('image/png');
    capturedPhoto.src = imageData;
    capturedPhoto.style.display = 'block';
    capturePrediction.textContent = "Prediction: No Wound Detected";
});

// Upload image file
fileInput.addEventListener('change', function () {
    const file = fileInput.files[0];
    const reader = new FileReader();

    reader.onloadend = function () {
        const imageData = reader.result; 
        uploadedPhoto.src = imageData; 
        uploadedPhoto.style.display = 'block'; 

        // Simulate a prediction
        simulatePhotoPrediction(imageData);
    };

    if (file) {
        reader.readAsDataURL(file); 
    } else {
        uploadedPhoto.src = '';
        uploadedPhoto.style.display = 'none';
    }
});

function simulatePhotoPrediction(imageData) {
    uploadPredictionText.textContent = "Prediction: No Wound Detected"; 
    console.log("Image Data for Prediction: ", imageData); // For debugging purposes
}