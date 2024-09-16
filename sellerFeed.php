<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$db = new mysqli("localhost", "root", "root", "mammykoker_db");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $db->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller's Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

.profile-picture {
    width: 100px;
    height: 100px;
}

.new-gig {
    cursor: pointer;
    color: #007bff;
}

.new-gig .card-body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    font-size: 20px;
}

.gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .gallery img {
            width: 100%;
            height: auto;
        }
        .gallery-item {
            flex: 1 1 calc(33.333% - 10px);
        }

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar for Profile Details -->
            <div class="col-md-3 bg-light">
                <div class="profile-details text-center my-4">
                <img src="assets/images/esther.jpeg" alt="Profile Picture" class="profile-picture">   
                    <h2>Esther's Visual Arts</h2>
                    <p>estherkam23@gmail.com</p>
                    <p><strong>Sold :</strong>pending...</p>
                    <p><strong>Member since:</strong> Jul 2024</p>
                    <p><strong>Avg. Rating</strong> <strong>8.5</strong></p>
                    <button class="btn btn-primary btn-block">call: 078299204</button>
                </div>
                <div class="learn-section my-4">
                    <h3>learn.</h3>
                    <p>Online Freelancing Essentials: be...</p>
                </div>
            </div>

            <!-- Main Content for Gigs -->
            <div class="col-md-9">
                <h2 class="my-4">Active Gigs</h2>
                <div class="row">
                    <!-- Example of an Active Gig -->
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card">
                            <img src="assets/images/webdevelopment.png" class="card-img-top" alt="Gig Image">
                            <div class="card-body">
                                <p class="card-text">Web Development</p>
                                <p><strong>Buyer:</strong> Alice Fornah's Foundation </p>
                                <p><strong>Hours Available:</strong> 10 hours/week</p>
                                <p><strong>Days Available:</strong> Mon-Fri</p>
                                <p><strong>Price Range:</strong>    Nle2500 - Nle5000</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card">
                            <img src="assets/images/webdevelopment.png" class="card-img-top" alt="Gig Image">
                            <div class="card-body">
                                <p class="card-text">Web Development</p>
                                <p><strong>Buyer:</strong> Alice Fornah's Foundation </p>
                                <p><strong>Hours Available:</strong> 10 hours/week</p>
                                <p><strong>Days Available:</strong> Mon-Fri</p>
                                <p><strong>Price Range:</strong>    Nle2500 - Nle5000</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card">
                            <img src="assets/images/webdevelopment.png" class="card-img-top" alt="Gig Image">
                            <div class="card-body">
                                <p class="card-text">Web Development</p>
                                <p><strong>Buyer:</strong> Alice Fornah's Foundation </p>
                                <p><strong>Hours Available:</strong> 10 hours/week</p>
                                <p><strong>Days Available:</strong> Mon-Fri</p>
                                <p><strong>Price Range:</strong>    Nle2500 - Nle5000</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card">
                            <img src="assets/images/webdevelopment.png" class="card-img-top" alt="Gig Image">
                            <div class="card-body">
                                <p class="card-text">Web Development</p>
                                <p><strong>Buyer:</strong> Alice Fornah's Foundation </p>
                                <p><strong>Hours Available:</strong> 10 hours/week</p>
                                <p><strong>Days Available:</strong> Mon-Fri</p>
                                <p><strong>Price Range:</strong>    Nle2500 - Nle5000</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card">
                            <img src="assets/images/webdevelopment.png" class="card-img-top" alt="Gig Image">
                            <div class="card-body">
                                <p class="card-text">Web Development</p>
                                <p><strong>Buyer:</strong> Alice Fornah's Foundation </p>
                                <p><strong>Hours Available:</strong> 10 hours/week</p>
                                <p><strong>Days Available:</strong> Mon-Fri</p>
                                <p><strong>Price Range:</strong>    Nle2500 - Nle5000</p>
                            </div>
                        </div>
                    </div>

                <h2 class="my-4">Completed Gigs</h2>
                <div class="row">
                    <!-- Example of a Completed Gig -->
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card">
                            <img src="assets/images/webdevelopment.png" class="card-img-top" alt="Gig Image">
                            <div class="card-body">
                                <p class="card-text">Web Development</p>
                                <p><strong>Buyer:</strong> Alice Fornah's Foundation </p>
                                <p><strong>Hours Available:</strong> 10 hours/week</p>
                                <p><strong>Days Available:</strong> Mon-Fri</p>
                                <p><strong>Price Range:</strong>    Nle2500 - Nle5000</p>
                            </div>
                        </div>
                    </div>
                    <!-- Add more completed gigs as needed -->
                </div>
            </div>
        </div>

<div class="container">
        <h4>Gallery of Past Work</h4>
        <div class="row gallery">
            <div class="col-md-4 gallery-item">
                <img src="assets/images/esther/esthergallery2.jpeg" alt="Gallery Image 1" class="img-fluid">
            </div>
            <div class="col-md-4 gallery-item">
                <img src="assets/images/esther/esthergallery.jpeg" alt="Gallery Image 2" class="img-fluid">
            </div>
            <div class="col-md-4 gallery-item">
                <img src="assets/images/esther/esthergallery3.jpeg" alt="Gallery Image 3" class="img-fluid">
            </div>
            <div class="col-md-4 gallery-item">
                <img src="assets/images/Sellers/baker.jpeg" alt="Gallery Image 4" class="img-fluid">
            </div>
            <div class="col-md-4 gallery-item">
                <img src="assets/images/esther/esthergallery5.jpeg" alt="Gallery Image 5" class="img-fluid">
            </div>
            <div class="col-md-4 gallery-item">
                <img src="assets/images/esther/esthergallery.jpg" alt="Gallery Image 6" class="img-fluid">
            </div>
        </div>
    </div>  
    </div>

  

    </div>
    <footer class="bg-dark text-white text-center p-4 mt-5">
        <div class="container">
            <p>&copy; 2024 Mammy Koker. All rights reserved.</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#" class="text-white">Privacy Policy</a></li>
                <li class="list-inline-item"><a href="#" class="text-white">Terms of Service</a></li>
                <li class="list-inline-item"><a href="#" class="text-white">Contact Us</a></li>
            </ul>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
