<?php

include 'connect.php';

if(isset($_POST['Register'])){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $password=md5($password);
    $role=$_POST['role'];
    $adminUsername=$_POST['adminUsername'];
    $adminPassword=$_POST['adminPassword'];
    $adminPassword=md5($adminPassword);
    
    $sql="SELECT * FROM users WHERE username='$adminUsername' and password='$adminPassword'";
    $result=$conn->query($sql);

    if($result->num_rows==1){
        $checkUsername="SELECT * FROM users WHERE username='$username'";
        $result=$conn->query($checkUsername);
        
        if($result->num_rows>0){
            echo "<script>
            alert('Account already exists.');
            window.location.href = 'home.php#accounts';
            </script>";
        }
        else{
            $insertQuery="INSERT INTO users(firstname,lastname,username,password,role) 
            VALUES ('$firstname','$lastname','$username','$password','$role')";
            
            if($conn->query($insertQuery)==TRUE){
                echo "<script>
                alert('Account created.');
                window.location.href = 'home.php#accountsRegister';
                </script>";
            }
            else{
                echo "Error:".$conn->error;
            }
        }
    }
    else{
        echo "<script>
        alert('Administrator account not found. Account creation failed.');
        window.location.href = 'home.php#accounts';
        </script>";
        
    }
}
?>