<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User profile</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        body {
            background: rgb(99, 39, 120)
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #682773
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }
    </style>
</head>

<body>

    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "alumni";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $mobile_number = $_POST["mobile_number"];
        $address = $_POST["address"];
        $state = $_POST["state"];
        $email = $_POST["email"];
        $education = $_POST["education"];
        $country = $_POST["country"];
        $region = $_POST["region"];
        $experience_designing = isset($_POST["experience_designing"]) ? $_POST["experience_designing"] : "";
        $additional_details = isset($_POST["additional_details"]) ? $_POST["additional_details"] : "";

        // Check for duplicate mobile number
        $check_sql = "SELECT * FROM `profile` WHERE mobileno = '$mobile_number'";
        $check_result = mysqli_query($conn, $check_sql);
        if (mysqli_num_rows($check_result) > 0) {
            echo "Error: Mobile number already exists!";
        } else {
            // Insert data into the database
            $sql = "INSERT INTO `profile` (`firstname`, `lastname`, `mobileno`, `address`, `state`, `email`, `education`, `country`, `city`, `experience`, `additionaldetails`)
        VALUES ('$firstname', '$lastname', '$mobile_number', '$address', '$state', '$email', '$education', '$country', '$region', '$experience_designing', '$additional_details')";

            if (mysqli_query($conn, $sql)) {
            // Redirect to the homepage after successful profile save
            header("Location: homepage.php");
            exit(); // Ensure script execution stops after redirection
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        }
    }
    ?>


    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span class="font-weight-bold">Kelvin Jagani</span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <form action="/alumni/profile.php" method="post">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Name</label>
                            <input type="text" class="form-control" placeholder="First Name" name="firstname" required>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Surname</label>
                            <input type="text" class="form-control" placeholder="Last Name" name="lastname" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Mobile Number</label>
                            <input type="text" class="form-control" placeholder="Enter Phone Number" name="mobile_number" required>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Address</label>
                            <input type="text" class="form-control" placeholder="Enter Address" name="address" required>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">State</label>
                            <input type="text" class="form-control" placeholder="Enter State" name="state" required>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Email ID</label>
                            <input type="text" class="form-control" placeholder="Enter Email ID" name="email" required>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Education</label>
                            <input type="text" class="form-control" placeholder="Education" name="education" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">Country</label>
                            <input type="text" class="form-control" placeholder="Country" name="country" required>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">College</label>
                            <input type="text" class="form-control" placeholder="State/Region" name="region" required>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience">
                        <span>Edit Experience</span>
                        <span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <label class="labels">Experience in Designing</label>
                        <input type="text" class="form-control" placeholder="Experience" name="experience_designing" required>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <label class="labels">Additional Details</label>
                        <input type="text" class="form-control" placeholder="Additional Details" name="additional_details" required>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>