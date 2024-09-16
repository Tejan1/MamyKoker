<?php
session_start();
$db = new mysqli("localhost", "root", "root", "mammykoker_db");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $db->real_escape_string($_POST['first_name']);
    $last_name = $db->real_escape_string($_POST['last_name']);
    $email = $db->real_escape_string($_POST['email']);
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
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        if(in_array($filetype, $allowed)) {
            $new_filename = uniqid() . "." . $ext;
            if(move_uploaded_file($_FILES["profile_picture"]["tmp_name"], "uploads/" . $new_filename)){
                $profile_picture = "uploads/" . $new_filename;
            } else {
                echo "Error: There was an error uploading your file.";
            }
        } else {
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    }

    $sql = "INSERT INTO users (first_name, last_name, username, email, bio, password, profile_picture) 
    VALUES ('$first_name', '$last_name', '$username', '$email', '$bio', '$password', '$profile_picture')";

if ($db->query($sql) === TRUE) {
$_SESSION['registration_success'] = "Registration successful. Please login with your email and password.";
header("Location: login.php");
exit();
} else {
echo "Error: " . $sql . "<br>" . $db->error;
}

$db->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form action="registration.php" method="post" enctype="multipart/form-data">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br><br>

        <label for="bio">Bio:</label>
        <textarea id="bio" name="bio" required></textarea><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="password">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="profile_picture">Profile Picture:</label>
        <input type="file" id="profile_picture" name="profile_picture" accept="image/*" required><br><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>