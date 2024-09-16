<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$db = new mysqli("localhost", "your_username", "your_password", "your_database_name");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$user_id = $_SESSION['user_id'];
$result = $db->query("SELECT * FROM users WHERE id = $user_id");
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Feed</title>
</head>
<body>
    <h1>Welcome to the General Feed, <?php echo $user['first_name']; ?>!</h1>
    <img src="<?php echo $user['profile_picture']; ?>" alt="Profile Picture" style="width: 100px; height: 100px;">
    <p>Your email: <?php echo $user['email']; ?></p>
    <p>Your bio: <?php echo $user['bio']; ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>