<!-- 
// Connect to the database
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "register";

 $conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 }

// Process user input (e.g., from an HTML form)
 $id=$_POST['id'];
 $name = $_POST['name'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $password = $_POST['password'];
 $options = $_POST['options'];

// Perform database operation (e.g., insert data)
$sql ="INSERT INTO registration (`name`, `email`, `phone`, `password`, `options`)
VALUES ('$name', '$email', '$phone', '$password', '$options')";
 if ($conn->query($sql) === TRUE) {
   header('Location: login.html');
 } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
 }

// Close the database connection
 $conn->close();



?> -->
<?php
   // Connect to the MySQL database
   $servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
   $username = "root"; // Your MySQL username
   $password = ""; // Your MySQL password
   $database = "registration"; // Your database name
   
   $conn = new mysqli($servername, $username, $password, $database);
   
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   
   // Process the registration form data
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $user_name = $_POST['user_name'];
       $email = $_POST['email'];
       $phone = $_POST['phone'];
       $course = $_POST['course'];
       $password = md5($_POST['password']);
   
       $sql = "INSERT INTO register (user_name, email, password,phone,course) VALUES ('$user_name', '$email', '$password','$phone','$course')";
   
       if ($conn->query($sql) === true) {
           echo "Registration successful!";
       } else {
           echo "Error: " . $sql . "<br>" . $conn->error;
       }
       header('Location:login.html');
   }
   
   $conn->close();
   ?>
   