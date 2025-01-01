<?php 

include 'connect.php';

if (isset($_POST["Delete"])){
    $id = $_POST['id'];
    $adminUsername=$_POST['adminUsername'];
    $adminPassword=$_POST['adminPassword'];
    $adminPassword=md5($adminPassword);
    
    $sql="SELECT * FROM users WHERE username='$adminUsername' and password='$adminPassword'";
    $result=$conn->query($sql);

    if($result->num_rows==1){
        $sql = "DELETE FROM users WHERE id='$id'";
        $result=$conn->query($sql);
        
        if ($result)
        {
            echo "<script>
            alert('Account deleted.');
            window.location.href = 'home.php#accountsRegister';
            </script>";
        } 
    }
    else{
        echo "<script>
        alert('Administrator account not found. Account deletion failed.');
        window.location.href = 'home.php#accountsRegister';
        </script>";
        
    }
}

?>