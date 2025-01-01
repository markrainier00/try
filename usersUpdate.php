<?php 

include 'connect.php';

if (isset($_POST["Update"])){
    $id = $_POST['id'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $role = $_POST['role'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password=md5($password);
    $adminUsername=$_POST['adminUsername'];
    $adminPassword=$_POST['adminPassword'];
    $adminPassword=md5($adminPassword);
    
    $sql="SELECT * FROM users WHERE username='$adminUsername' and password='$adminPassword'";
    $result=$conn->query($sql);

    if($result->num_rows==1){
        $checkUsername="SELECT * FROM users WHERE username='$username'";
        $result=$conn->query($checkUsername);
        
        if($result->num_rows>1){
            echo "<script>
            alert('Account already exists.');
            window.location.href = 'home.php';
            </script>";
        }
        else{
            $sql = "UPDATE users SET firstname ='{$firstName}', lastname='{$lastName}', role='{$role}', username='{$username}',
            password='{$password}' WHERE id = '{$id}'";
            $result = mysqli_query($conn, $sql);
            
            if ($result){
                echo "<script>
                alert('Account updated.');
                window.location.href = 'home.php#accountsRegister';
                </script>";
            }
        }
    }
    else{
        echo "<script>
        alert('Administrator account not found. Account update failed.');
        window.location.href = 'home.php';
        </script>";
        
    }
}
?>