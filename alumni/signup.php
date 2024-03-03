<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    include 'partials/_dbconnect.php';

    // Get form data and sanitize it
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $cpassword = mysqli_real_escape_string($conn, $_POST["c-password"]);

    // Check if passwords match
    if ($password !== $cpassword) {
        $showError = "Passwords do not match.";
    } else {
        // Check if the username already exists
        $existSql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $existSql);
        if (mysqli_num_rows($result) > 0) {
            $showError = "Username already exists.";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user data into the database
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
            if (mysqli_query($conn, $sql)) {
                // Redirect to the login page
                header("Location: homepage.php");
                exit;
            } else {
                $showError = "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up - Alumni nexus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(signupback.jpeg);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f7f7f7;
        }

        body center {
            font-size: 40px;
            padding-bottom: 1cm;
            width: 100%;
            color: lightsalmon;
        }

        .container {
            display: flex;
            align-items: center;
            width: 100%;
            max-width: 1131px;
        }

        .signup-form {
            font-family: "Roboto Mono", "Courier New", monospace;
            width: 100%;
            max-width: 500px;
            margin-left: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .signup-form h2 {
            font-size: 1px;
            padding-top: 0px;
            padding-bottom: 0px;
            color: black;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="tel"] {
            width: 92%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            align-items: center;
            margin: auto;
            justify-content: center;
            text-decoration: none;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .signup-img {
            border-radius: 4px;
            padding-left: 0px;
            width: 419px;
            height: 300px;
        }
    </style>

</head>

<body>

    <center><b>Alumni Nexus - Simplyfying Alumni management</b></center>
    <div class="container">
        <img src="signup.jpg" alt="Sign Up Image" class="signup-img">
        <form class="signup-form" action="signup.php" method="post">

            <h2 class="sign">
                <center class="sign">Sign Up</center>
            </h2>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="c-password">Confirm Password:</label>
                <input type="password" id="c-password" name="c-password" required>
            </div>
            <button type="submit" class="btn">Sign Up</button>
        </form>
    </div>

</body>

</html>