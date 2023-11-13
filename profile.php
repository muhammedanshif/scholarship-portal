<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

// Create connection
$conn = new mysqli($servername, 
	$username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: "
		. $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aadhar = $_POST['aadhar'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $mob = $_POST['mob'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $education = $_POST['r2'];
    $marital = $_POST['r1'];
    $name = $_POST['name'];
}
$sql = "INSERT INTO profile (aadhar, name, email,mob,age,gender,education,marital) VALUES ('$aadhar', '$name', '$email','$mob','$age','$gender','$education','$marital')";

if ($conn->query($sql) === TRUE) {
$profileInfo="Aadhar No : ".$aadhar."<br/>Name : ".$name.'<br/>Email : '.$email."<br/>Mobile No : ".$mob."<br/>DOB : ".$dob."<br/>Age : ".$age."<br/>Gender : ".$gender."<br/>Education : <br/>".$education."<br/>Status : ".$marital;
 header("Location: address.html");
	
	
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
