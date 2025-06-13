<?php

    include 'login.php';

    if(isset($_POST['signUp'])){
        $firstName=$_POST['fName'];
        $lastName=$_POST['lName'];
        $email=$_POST['email'];
        $password=md5($_POST['password']);
        $nickname=$_POST['nickname'];
        $petname=$_POST['petname'];
        $hobby=$_POST['hobby'];
    
        $checkEmail="SELECT * FROM users WHERE email='$email'";
        $result=$conn->query($checkEmail);
    
        if($result->num_rows>0){
            echo "Email Address Already Exists!";
        } else {
            $insertQuery="INSERT INTO users (firstName, lastName, email, password, nickname, petname, hobby) 
                          VALUES ('$firstName', '$lastName', '$email', '$password', '$nickname', '$petname', '$hobby')";
            if($conn->query($insertQuery) === TRUE){
                header("location:login.php");
            } else {
                echo "Error: " . $conn->error;
            }
        }
    }
    

    if(isset($_POST['signIn'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $password=md5($password);

        $sql="SELECT * FROM users Where email='$email' and password='$password'";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            session_start();
            $rows= $result->fetch_assoc();
            $_SESSION['email']=$row['email'];
            header("Location: index.php");
            exit();
        }
        else{
            echo "Not Found, Incorrect Email or Password";
        }
    }
?>
