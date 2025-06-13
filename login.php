<?php
    $host="localhost";
    $user="root";
    $pass="";
    $db="login";
    $conn =new mysqli($host,$user,$pass,$db);
    if($conn->connect_error){
        echo "Failed to connect db".$conn->connect_error;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register and Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container" id="signUp" style="display: none;">
        <h1 class="form-title">Register</h1>
        <form method="post" action="registration.php">

        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="fName" id="fName" placeholder="First Name" required>
            <label for="fName">First Name</label>
        </div>
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="lName" id="lName" placeholder="Last Name" required>
            <label for="lName">Last Name</label>
        </div>
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="email" required>
            <label for="email">Email</label>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="password" required>
            <label for="password">Password</label>
        </div>
            <!--Updated code for Questions-->
        <div class="input-group">
            <i class="fa-solid fa-person-circle-question"></i>
            <input type="text" name="nickname" id="nickname" placeholder="Enter your nickname" required>
            <label for="nickname">What is your nickname?</label>
        </div>
        <div class="input-group">
            <i class="fa-solid fa-person-circle-question"></i>
            <input type="text" name="petname" id="petname" placeholder="Enter your pet's name" required>
            <label for="petname">What is your pet's name?</label>
        </div>
        <div class="input-group">
            <i class="fa-solid fa-person-circle-question"></i>
            <input type="text" name="hobby" id="hobby" placeholder="Enter your hobby" required>
            <label for="hobby">What is your hobby?</label>
        </div>

        <input type="submit" class="btn" value="Sign up" name="signUp" >
    </form>
    
    <div class="links">
        <p>Already Have Account ?</p>
        <button id="signInButton">Sign In</button>
    </div>
    </div>


    <div class="container" id="signIn" style="display: block;">
        <h1 class="form-title">Sign In</h1>
        <form method="post" action="registration.php">
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="email" required>
            <label for="email">Email</label>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="password" required>
            <label for="password">Password</label>
        </div>
        <p class="recover">
            <a href="recover_password.php" id="Recover_password">Recover Password</a>
        </p>
        <input type="submit" class="btn" value="Sign In" name="signIn">
    </form>
    
    <div class="links">
        <p>Don't have account yet?</p>
        <button id="signUpButton">Sign Up</button>
    </div>
    </div>
    <script src="login.js"></script>
</body>
</html>

