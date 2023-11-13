<?php     
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

$con = mysqli_connect($servername, $username, $password, $dbname);   
    $email = $_POST['email'];  
    $password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $email = stripcslashes($email);  
        $password = stripcslashes($password);  
        $email = mysqli_real_escape_string($con, $email);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select * from register where email = '$email' and password = '$password'";  
        $result = $con->query($sql);
        //$result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($result->num_rows > 0){  
            echo "Login successful ";  
        }  
        else{  
            header('Location:index1.html'); 
        }     
?>  