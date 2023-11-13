<?php   
// Connect to the MySQL database (similar to registration script)
// ...
   // Connect to the MySQL database
   $servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
   $username = "root"; // Your MySQL username
   $password = ""; // Your MySQL password
   $database = "registration"; // Your database name
   
   $conn = new mysqli($servername, $username, $password, $database);
   
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the database to fetch user data
    $sql = "SELECT * FROM register WHERE email = '$email'";
    $result = $conn->query($sql);
    

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];
        if (md5($password)==$hashed_password) {
            echo "Login successful!";
            // Redirect the user to a welcome page or dashboard
            header("Location: index1.html");
        } else {
            echo "Incorrect username/email or password.";
        }
    } else {
        echo "User not found.";
    }
}

$conn->close();
?> 
<!--   
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
      
        $sql = "select * from registration where email = '$email' and password = '$password'";  
        $result = $con->query($sql);
        //$result = mysqli_query($con, $sql);  
        
        // $count = mysqli_num_rows($result);  
          
        if($result> 0){  
            
            header('Location:index1.html'); 
        }  
        else{  
            echo "Login unsuccessful "; 
        }     
?>   -->
