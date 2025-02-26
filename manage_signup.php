<?php

    $servername = "localhost";
    $database = "MINIPROJECT";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername,$username,$password,$database);

    if($conn->connect_error) {
        echo "<script> alert('Error occured in database connection'); </script>";
        die("Error occured in database connection");
    }


    if(isset($_POST["submit"])) {

        if(isset($_POST["fname"])) {
            $fname = $_POST["fname"];
        }
        else {
            echo "<script> alert('FullName is missing'); </script>";
            exit;
        }

        if(isset($_POST["dob"])) {
            $dob = $_POST["dob"];
        }
        else {
            echo "<script> alert('Date of Birth is missing'); </script>";
            exit;
        }

        if(isset($_POST["email"])) {
            $email = $_POST["email"];
        }
        else {
            echo "<script> alert('Email is missing'); </script>";
            exit;
        }

        if(isset($_POST["password"])) {
            $password = $_POST["password"];
        }
        else {
            echo "<script> alert('Password is missing'); </script>";
            exit;
        }
        
    }

    
    $sql = "SELECT EMAIL FROM LOGIN_DETAILS";
    
    $result = $conn->query($sql);
    
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($email == $row["EMAIL"]) {
                echo "<script> alert('User Already exists'); </script>";
                echo "<script> window.location.href = 'index.php'; </script>";
                exit();
            }
        }
    }   
    
    $sql = "INSERT INTO LOGIN_DETAILS (FULLNAME,DOB,EMAIL,PASSWORD) VALUES ('$fname','$dob','$email','$password');";

    if($conn->query($sql) === TRUE) {
        echo "<script> alert('Data saved successfully'); </script>";
        echo "<script> window.location.href = 'editor.php'; </script>";
        exit(); 
    }

    $conn->close();

?>