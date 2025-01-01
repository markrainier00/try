<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wound Classification</title>
    <link rel="stylesheet" href="indexstyle.css">
</head>
<body>
    <header class="header">
        <div class="logo">Wound Classification</div>
        <button class="headerButton" onclick="window.location.href='signin.php'">Sign In</button>
    </header>

    <!-- capture image -->    
    <div class="container" id="capture" style="margin-top: 100px;">
        <div class="subContainer">
            <h2 class="form-title">Take a Photo</h2>
            <video id="video" autoplay muted></video>
            <div>
                <button class="button-group" id="open-camera-btn">Open Camera</button>
                <button class="button-group" id="stop-camera-btn" style="display: none;">Stop Camera</button>
                <button class="button-group" id="capture-btn" style="display: none;">Capture Image</button>
            </div>
            <canvas id="canvas" style="display: none;"></canvas>
            <img id="captured-photo" alt="Captured Photo" style="display: none; margin-top: 20px; border: 2px solid #870000;">
            <div class="prediction" id="capture-prediction"></div>
            <h5>or</h5>
            <button id="uploadbtn">Upload a Photo</button>
        </div>
        
    </div>

    <!-- upload an image -->
    <div class="container" id="upload" style="display: none; margin-top: 100px;">
        <div class="subContainer">
            <h2 class="form-title" style="margin-bottom:25px;">Upload a Photo</h2>
                <label for="file-upload" class="button-group">Choose File</label>
                <input id="file-upload" type="file" accept="image/*" style="display: none">
                <img id="uploaded-photo" src="" alt="Uploaded Photo" style="display: none;">
                <div class="prediction" id="upload-prediction"></div>
                <h5>or</h5>
                <button id="capturebtn">Take a Photo</button>
        </div>
    </div>

    <div class="container" style="padding-left:50px; padding-right:50px;">
        <h2 style="margin-bottom:20px;">Description</h2>
        <p style="text-indent:20px;">
            This wound detection tool uses advanced image processing and AI algorithms to analyze wounds. 
            By uploading an image or using your camera, it identifies key wound characteristics and provides predictions 
            such as the presence of infection or severity.

        </p>
        <p style="text-indent:20px;">
            The prediction is designed to aid healthcare professionals or individuals in identifying potential concerns.
            Always consult a medical professional for accurate diagnosis and treatment.
        </p>
    </div>

    <div class="container" style="padding-left:60px; padding-right:60px;">
        <h2 style="margin-bottom:20px;">How to Use</h2>
        <ol>
            <li>Navigate to the <strong>Camera</strong> section to capture a live image of the wound.</li>
            <li>Alternatively, go to the <strong>Photo</strong> section to upload an image of the wound from your device.</li>
            <li>Once the image is processed, the tool will display a prediction about the wound's condition.</li>
            <li>Visit the <strong>Description</strong> section to understand how the predictions are generated and what they mean.</li>
            <li>Always consult a medical professional for further evaluation and treatment.</li>
        </ol>
    </div>

    <div class="container" id="account_policy" style="margin-bottom:40px; padding-left:60px; padding-right:60px;">
        <h2 style="margin-bottom:20px;">Account Creation Policy</h2>
        <p>
            To ensure the security of data and history on our website, account creation is strictly limited to the following roles:
        </p>
        <ol style="margin-bottom:20px;">
            <li>Administrator of the website</li>
            <li>School Nurse</li>
            <li>CRCY Member</li>
        </ol>
        <p>
            If you are eligible, you may proceed to the school clinic and start the registration process.
        </p>
        <p>
            Only the <strong>Administrator</strong> has the authority to create and delete accounts. 
            This measure ensures that all sensitive information remains secure and managed responsibly.
        </p>
        <p>
            If you have questions regarding account creation, please contact the website administrator directly.
        </p>
    </div>

<script src="index_switch_mode.js"></script>
<script src="index_photo_process.js"></script>
<script src="index_go_to-sign_in.js"></script>
</body>
</html>