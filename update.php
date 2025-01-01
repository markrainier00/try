<?php
session_start();
    include("connect.php");
    $id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wound Classification</title>
    <style>
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:"poppins",sans-serif;}
    .header{/* for header */
            display: flex;
            position:fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background-color: #870000;
            color: #fff;
            padding: 1rem;}
        .logo{
            font-size: 1.5rem;
            font-weight: bold;}/* header end */
        .container{
            background-color: #021845;
            width:450px;
            height: 50%;
            padding:1.5rem;
            margin:90px auto;
            border-radius: 10px;}
        form{
            margin:0 2rem;
            align-items: center;}
        .form-title{
            text-align: center;
            font-weight: bold;
            text-align: center;
            padding: 1.3rem;
            margin-bottom: 0.4rem;}
        .input{
            color: black;
            width:100%;
            background-color: white;
            border: none;
            border-bottom:1px solid #757575;
            padding-top: .5rem;
            padding-bottom: .5rem;
            padding-left:.5rem;
            font-size: 15px;
            margin-bottom: 1rem;}
        .update, .cancel{
            font-size: 1rem;
            padding: 8px 0;
            border-radius: 5px;
            border: none;
            width: 100%;
            cursor: pointer;}
    </style>
</head>

<body style="background-color: white; color: white;">
<?php
$sql = "SELECT * FROM `users` WHERE id = $id";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
?>

<header class="header" style="margin-left: 0px;">
    <div class="logo">Wound Classification</div>
</header>

<div class="container" id="accounts">
    <h2 class="form-title">Update</h2>
    <h3 class="form-title"><?php
        $query=mysqli_query($conn, "SELECT users.* FROM users WHERE users.id='$id'");
        while($row=mysqli_fetch_array($query)){
            echo ucwords(strtolower($row['firstName'])).' '.ucwords(strtolower($row['lastName']));
    }?></h3>
    <div class="accounts-container">
    <form method="post" action="usersUpdate.php">
        <div class="input-group">
            <label for="id" style="margin-right: 13px">ID</label>
            <input class="input" type="id" name="id" id="id" readonly value=<?php echo $id?>>
        </div>
        <div class="input-group">
            <input class="input" type="firstname" name="firstname" id="firstname" placeholder="Firstname" required>
        </div>
        <div class="input-group">
            <input class="input" type="lastname" name="lastname" id="lastname" placeholder="Lastname" required>
        </div>
        <div class="input-group">
            <input class="input" type="username" name="username" id="username" placeholder="Username" required>
        </div>
        <div class="input-group">
            <input class="input" type="password" name="password" id="password" placeholder="Password" required>
        </div>
        <div style="justify-items: center">
        <label for="role" style="margin-right: 13px">Role</label>
        <select id="role" name="role" style="width: 340px; padding: .5rem">
            <option value="crcy member">CRCY Member</option>
            <option value="school nurse">School Nurse</option>
            <option value="administrator">Administrator</option>
        </select>
        </div>
        <div class="input-group">
            <input class="input" type="username" name="adminUsername" id="adminUsername" placeholder="Administrator Username" required style="margin-top: 2.5rem">
        </div>
        <div class="input-group">
            <input class="input" type="password" name="adminPassword" id="adminPassword" placeholder="Administrator Password" required>
        </div>
        <div>
            <input type="submit" class="update" name="Update" value="Update"
            style="background-color: white; color: #870000; margin-top: 30px;">
            <button id="cancel" class="cancel" onclick="window.location.href='home.php#accountsRegister'" 
            style="background-color: #870000; color: white; margin-top: 10px; margin-bottom: 20px;">Cancel</button>
        </div>
    </form>
    </div>
</div>
</body>
</html>