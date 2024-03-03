<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
     
    // $sql = "Select * from users where username='$username' AND password='$password'";
    $sql = "Select * from users where username='$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            
            if (password_verify($password, $row['password'])){ 
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: homepage.php");
            } 
            else{
                $showError = "Invalid Credentials";
            }
        }
        
    } 
    else{
        $showError = "Invalid Credentials";
    }
}
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta HTTP-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Alumni Nexus</title>
    <style>
        body {
            background-image: url("alumni.jpg");
            background-size: cover;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: white;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
        }

        .headingsContainer {
            text-align: center;
        }

        .mainContainer {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 50px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .subcontainer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .forgotpsd {
            margin: 0;
        }

        .register {
            text-align: center;
        }
    </style>
</head>

<body>

<?php
    if ($login) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if ($showError) {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> ' . $showError . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>


    <h1>Alumni Nexus - Simplyfying alumni management
    </h1>
    <form action="/alumni/login.php" method="post">
        <!-- Headings for the form -->
        <div class="headingsContainer">
            <h3>Log In
            </h3>
        </div>

        <!-- The Wrapper contains all the inputs -->
        <div class="mainContainer">
            <!-- Username -->
            <label for="username">Username</label>
            <input type="text" placeholder="Enter Your Username Here" name="username" required id="username">

            <br><br>

            <!-- Password -->
            <label for="pswrd">Password</label>
            <input type="password" placeholder="Enter Your Password Here" name="password" required id="password">

            <!-- sub-container for the checkbox and forgot password link -->
            <div class="subcontainer">
                <label>
                    <input type="checkbox" checked="checked" name="remember">Keep me signed in
                </label>

            </div>


            <!-- Submit button -->
            <button type="submit" id="btn">Login</button>

            <!-- Sign up link -->
            <p class="register">Not a member?<a href="signup.php">Sign Up here!</a></p>

        </div>

    </form>

</body>

</html>
