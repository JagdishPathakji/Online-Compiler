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
        
        $sql = "SELECT EMAIL,PASSWORD FROM LOGIN_DETAILS";

        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($email == $row["EMAIL"] and $password == $row["PASSWORD"]) {
                    echo "<script> alert('Login Successfull'); </script>";
                    echo "<script> window.location.href = 'editor.php'; </script>";
                    exit();
                }
            }
        }   
        
        echo "<script> alert('No such username or password exists'); </script>";
        echo "<script> window.location.href = 'index.php'; </script>";
        
    }

    $conn->close();
?>