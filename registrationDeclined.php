<?php
session_start();
$db = new mysqli("localhost", "root", "root", "mammykoker_db");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $db->real_escape_string($_POST['first_name']);
    $last_name = $db->real_escape_string($_POST['last_name']);
    $email = $db->real_escape_string($_POST['email']);
    $phone = $db->real_escape_string($_POST['phone']);
    $bio = $db->real_escape_string($_POST['bio']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Generate username
    $base_username = strtolower($first_name . $last_name);
    $random_digits = str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
    $username = $base_username . $random_digits;

    // Check if username already exists, if so, generate a new one
    $username_check = $db->query("SELECT username FROM users WHERE username = '$username'");
    while ($username_check->num_rows > 0) {
        $random_digits = str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
        $username = $base_username . $random_digits;
        $username_check = $db->query("SELECT username FROM users WHERE username = '$username'");
    }

    // Handle file upload
    $profile_picture = "";
    if(isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["profile_picture"]["name"];
        $filetype = $_FILES["profile_picture"]["type"];
        $filesize = $_FILES["profile_picture"]["size"];
    
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) {
            $error = "Error: Please select a valid file format.";
        } else {
            $maxsize = 5 * 1024 * 1024;
            if($filesize > $maxsize) {
                $error = "Error: File size is larger than the allowed limit.";
            } else {
                if(in_array($filetype, $allowed)) {
                    $new_filename = uniqid() . "." . $ext;
                    if(move_uploaded_file($_FILES["profile_picture"]["tmp_name"], "uploads/" . $new_filename)){
                        $profile_picture = "uploads/" . $new_filename;
                    } else {
                        $error = "Error: There was an error uploading your file.";
                    }
                } else {
                    $error = "Error: There was a problem uploading your file. Please try again."; 
                }
            }
        }
    }

    if (empty($error)) {
        $sql = "INSERT INTO users (first_name, last_name, username, email, phone, bio, password, profile_picture) 
                VALUES ('$first_name', '$last_name', '$username', '$email', '$phone','$bio', '$password', '$profile_picture')";

        if ($db->query($sql) === TRUE) {
            $success = "Registration successful. Please login with your email and password.";
        } else {
            $error = "Error: " . $sql . "<br>" . $db->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Mammy Koker</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/css/register.css">
</head>
<body>
    <header class="p-3" style="background-color: rgb(32 189 196);">
        <div class="container d-flex justify-content-between align-items-center">
            <img src="assets/images/logo.png" style="width: 70px; height: 60px;" alt="Mammy Koker Logo" class="logo">
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link text-white" href="login.html">login</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <section class="registration py-5">
        <div class="container">
            <h2 class="text-center mb-4">Register</h2>
            <?php
            if (!empty($error)) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
            if (!empty($success)) {
                echo "<div class='alert alert-success'>$success</div>";
            }
            ?>
<form id="registration-form" method="post" enctype="multipart/form-data" class="p-4 border rounded">                <div class="profile mb-3 text-center">
                    <img src="assets/images/placeholder.jpeg" alt="Profile Picture" class="profile-picture mb-3" id="profile-picture">
                    <input type="file" id="profile-picture-input" name="profile_picture" accept="image/*" style="display: none;"><br>
                    <button type="button" class="btn btn-secondary mb-3" onclick="document.getElementById('profile-picture-input').click()">Choose Picture</button>
                </div>

                <div class="mb-3">
                    <label for="first-name" class="form-label">First Name:</label>
                    <input type="text" class="form-control" id="first-name" name="first_name" required>
                </div>
                
                <div class="mb-3">
                    <label for="last-name" class="form-label">Last Name:</label>
                    <input type="text" class="form-control" id="last-name" name="last_name" required>
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                
                <div class="mb-3">
                    <label for="phone-number" class="form-label">Phone Number:</label>
                    <input type="tel" class="form-control" id="phone-number" name="phone" required>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" name="confirm-password" required>
                </div>
                
                <div class="mb-3">
                    <label for="bio" class="form-label">Bio:</label>
                    <textarea class="form-control" id="bio" name="bio" rows="4"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </section>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="register.js"></script>
</body>
</html>