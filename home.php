<?php
session_start();
 include("connect.php");

$sql = "SELECT id, firstname, lastname, role FROM users";
$result = $conn->query($sql);

if (isset($_SESSION['username'])){
    $username=$_SESSION['username'];
    $query=mysqli_query($conn, "SELECT users.* FROM users WHERE users.username='$username'");
    while($row=mysqli_fetch_array($query)){
        $fname = ucwords(strtolower($row['firstName']));
        $lname = ucwords(strtolower($row['lastName']));
    }
}

if (isset($_SESSION['username'])){
    $username=$_SESSION['username'];
    $query=mysqli_query($conn, "SELECT users.* FROM users WHERE users.username='$username'");
    while($row=mysqli_fetch_array($query)){
        if($row['role'] === 'crcy member'){
            $roles= strtoupper(substr($row['role'], 0, 6)).substr($row['role'], 6);
        }
        else{
            $roles= ucwords(strtolower($row['role']));
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="homestyle.css">

    <?php
        if (isset($_SESSION['username'])){
            $username=$_SESSION['username'];
            $query=mysqli_query($conn, "SELECT users.* FROM users WHERE users.username='$username'");
            while($row=mysqli_fetch_array($query)){
                if ($row['role'] != "administrator"){
                    echo "<style>
                    #accounts, #accountsRegister, #adashboard, #aaccounts, #aaccountsRegister{
                        display:none;
                    }
                    </style>";
                }
            }
        }
    ?>
</head>
<body>
    <header class="header">
        <div class="logo">Wound Classification</div>
        <nav class="nav" id="navMenu">
            <ul class="navLinks">
              <li><a href="#home">Home</a></li>
              <li><a id="adashboard" href="#dashboard">Dashboard</a></li>
              <li><a href="hhistory">History</a></li>
              <li><a id="aaccountsRegister" href="#accountsRegister">Accounts</a></li>
              <li><a id="aaccounts" href="#accounts">Register</a></li>
              <button id="logoutButton" class="headerButton" onclick="if (confirm('Are you sure you want to log out?')) { window.location.href='logout.php'; } return false;">Log Out</button>
            </ul>
        </nav>
    </header>
    
    <div class="container" id="home" style="margin-top: 100px;">
        <h1 style="font-weight:bold;">
            <?php
                echo $fname.' '.$lname;
            ?>
        </h1>
        <h4>
            <?php
                echo $roles;
            ?>
        </h4>
    </div>

    <!-- capture image -->    
    <div class="container" id="capture"  style="margin-bottom:20px;">
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
    <div class="container" id="upload" style="display: none; margin-bottom:20px;">
        <h2 class="form-title">Upload a Photo</h2>
        <div class="subContainer">
            <label for="file-upload" class="button-group">Choose File</label>
            <input id="file-upload" type="file" accept="image/*" style="display:none;">
            <img id="uploaded-photo" src="" alt="Uploaded Photo" style="display: none;">
            <div class="prediction" id="upload-prediction"></div>
            <h5>or</h5>
            <button id="capturebtn">Take a Photo</button>
        </div>
    </div>
    
    <!-- Accounts containers(only for administrator)-->
    '<div class="container" id="accounts" style="margin-bottom:20px;">
        <h2 class="form-title">Register</h2>
        <div class="accounts-container">
        <form method="post" action="register.php">
            <div class="input-group">
                <input type="firstname" name="firstname" id="firstname" placeholder="Firstname" required>
            </div>
            <div class="input-group">
                <input type="lastname" name="lastname" id="lastname" placeholder="Lastname" required>
            </div>
            <div class="input-group">
                <input type="username" name="username" id="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <div style="justify-items: center">
            <label for="role" style="margin-right: 13px">Role</label>
            <select id="role" name="role" style="width: 400px">
                <option value="crcy member">CRCY Member</option>
                <option value="school nurse">School Nurse</option>
                <option value="administrator">Administrator</option>
            </select>
            </div>
            <div class="input-group">
                <input type="username" name="adminUsername" id="adminUsername" placeholder="Administrator Username" required style="margin-top: 1.5rem">
            </div>
            <div class="input-group">
                <input type="password" name="adminPassword" id="adminPassword" placeholder="Administrator Password" required>
            </div>
            <input type="submit" class="button-group" value="Register" name="Register">
        </form>
        </div>
    </div>'
    <div class="container" id="accountsRegister" style="margin-bottom:40px;">
        <h2 class="form-title">Accounts</h2>
        <div class="accounts-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Role</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data for each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                            echo "<td>" . ucwords(strtolower(htmlspecialchars($row["firstname"]))) . "</td>";
                            echo "<td>" . ucwords(strtolower(htmlspecialchars($row["lastname"]))) . "</td>";
                            if($row["role"] === "crcy member"){
                                $echoRole = strtoupper(substr(htmlspecialchars($row["role"]), 0, 6)).substr(htmlspecialchars($row["role"]), 6);
                            }
                            else{
                                $echoRole = ucwords(strtolower(htmlspecialchars($row["role"])));
                            } 
                            echo "<td>" . $echoRole  . "</td>";
                            echo "<td><a class='tableButton' href='update.php?id={$row['id']}' style='background-color: #021845';
                            text-decoration: none;'>Update</a>
                            <a class='tableButton' href='delete.php?id={$row['id']}' style='background-color: #870000;'>Delete</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No records found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    

<script src="index_switch_mode.js"></script>
<script src="index_photo_process.js"></script>
<script src="home_switch_page.js"></script>
</body>
</html>
<?php
$conn->close();
?>