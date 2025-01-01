<?php

include 'connect.php';

$username=$_POST['username'];
$password=$_POST['password'];
$password=md5($password);

$sql="SELECT * FROM users WHERE username='$username' and password='$password'";
$result=$conn->query($sql);
if($result->num_rows==1){
    session_start();
    $row=$result->fetch_assoc();
    $_SESSION['username']=$row['username'];
    header("Location: home.php");
    exit();
}
else{
    echo "<script>
    alert('Account not found. Please try again.');
    window.location.href = 'signin.php';
    </script>";
    
}
?>