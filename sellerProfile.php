<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Seller Information - Mammy Koker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .profile-picture {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
        }
        .gallery img {
            width: 100%;
            height: auto;
        }
        .form-container {
            max-width: 800px;
            margin: 0 auto;
        }
        .selected-pill {
            background-color: #007bff;
            color: white;
        }
        .selected-item {
            display: inline-block;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        .navbar-brand img {
        max-height: 50px; 
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img style="margin-right: 15px;" src="assets/images/logo.png" alt="Mammy Koker Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <form class="d-flex mx-auto flex-grow-1">
                    <input class="form-control me-2 flex-grow-1" type="search" placeholder="Search for a job you want get done" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="margin-left: 30px; margin-right: 30px; margin-top: 10px;"  href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                            <li><a class="dropdown-item" href="#">Graphics & Design</a></li>
                            <li><a class="dropdown-item" href="#">Home Tutoring</a></li>
                            <li><a class="dropdown-item" href="#">Accounting</a></li>
                            <li><a class="dropdown-item" href="#">Digital Marketing</a></li>
                            <li><a class="dropdown-item" href="#">Writing & Translation</a></li>
                            <li><a class="dropdown-item" href="#">Video Editing</a></li>
                            <li><a class="dropdown-item" href="#">Web Design & Development</a></li>
                            <li><a class="dropdown-item" href="#">Photography</a></li>
                            <li><a class="dropdown-item" href="#">Music & Audio</a></li>
                            <li><a class="dropdown-item" href="#">Programming & Tech</a></li>
                            <li><a class="dropdown-item" href="#">Data</a></li>
                            <li><a class="dropdown-item" href="#">Business</a></li>
                            <li><a class="dropdown-item" href="#">Personal Growth & Hobbies</a></li>
                            <li><a class="dropdown-item" href="#">End-to-End Projects</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="assets/images/Sellers/esther.jpeg" alt="Profile Picture" class="profile-picture">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="sellerProfile.html">Become a Seller</a></li>
                            <li><a class="dropdown-item" href="#">Messages</a></li>
                            <li><a class="dropdown-item" href="#">Insights</a></li>
                            <li><a class="dropdown-item" href="#">Learn a New Skill</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5 form-container">
        <h2 class="text-center mb-4">Edit Seller Information</h2>
        <form id="seller-form" enctype="multipart/form-data" class="p-4 border rounded">
            <div class="mb-3 text-center">
             <p>   <img src="assets/images/Sellers/esther.jpeg" alt="Profile Picture" class="profile-picture mb-3" id="profile-picture" style="height: 120px; width: 120px;">
                <input type="file" id="profile-picture-input" accept="image/*" style="display: none;">
            </div>
            
            <div class="mb-3">
                <label for="categories" class="form-label">Categories:</label>
                <div class="nav nav-pills mb-3" id="categories" role="tablist">
                    <button class="nav-link" id="graphics-design-tab" type="button" role="tab" aria-controls="graphics-design" aria-selected="false">Graphics & Design</button>
                    <button class="nav-link" id="home-tutoring-tab" type="button" role="tab" aria-controls="home-tutoring" aria-selected="false">Home Tutoring</button>
                    <button class="nav-link" id="accounting-tab" type="button" role="tab" aria-controls="accounting" aria-selected="false">Accounting</button>
                    <button class="nav-link" id="digital-marketing-tab" type="button" role="tab" aria-controls="digital-marketing" aria-selected="false">Digital Marketing</button>
                    <button class="nav-link" id="writing-translation-tab" type="button" role="tab" aria-controls="writing-translation" aria-selected="false">Writing & Translation</button>
                    <button class="nav-link" id="video-editing-tab" type="button" role="tab" aria-controls="video-editing" aria-selected="false">Video Editing</button>
                    <button class="nav-link" id="web-design-development-tab" type="button" role="tab" aria-controls="web-design-development" aria-selected="false">Web Design & Development</button>
                    <button class="nav-link" id="photography-tab" type="button" role="tab" aria-controls="photography" aria-selected="false">Photography</button>
                    <button class="nav-link" id="music-audio-tab" type="button" role="tab" aria-controls="music-audio" aria-selected="false">Music & Audio</button>
                    <button class="nav-link" id="programming-tech-tab" type="button" role="tab" aria-controls="programming-tech" aria-selected="false">Programming & Tech</button>
                    <button class="nav-link" id="data-tab" type="button" role="tab" aria-controls="data" aria-selected="false">Data</button>
                    <button class="nav-link" id="business-tab" type="button" role="tab" aria-controls="business" aria-selected="false">Business</button>
                    <button class="nav-link" id="personal-growth-hobbies-tab" type="button" role="tab" aria-controls="personal-growth-hobbies" aria-selected="false">Personal Growth & Hobbies</button>
                    <button class="nav-link" id="end-to-end-projects-tab" type="button" role="tab" aria-controls="end-to-end-projects" aria-selected="false">End-to-End Projects</button>
                </div>
                <div id="selected-categories" class="mb-2"></div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="custom-category" placeholder="Add custom category">
                    <button class="btn btn-outline-secondary" type="button" id="add-category-button">Add</button>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            
            <div class="mb-3">
                <label for="availability-days" class="form-label">Days Available:</label>
                <div id="availability-days" class="btn-group" role="group" aria-label="Days Available">
                    <button type="button" class="btn btn-outline-primary" data-value="Monday">Monday</button>
                    <button type="button" class="btn btn-outline-primary" data-value="Tuesday">Tuesday</button>
                    <button type="button" class="btn btn-outline-primary" data-value="Wednesday">Wednesday</button>
                    <button type="button" class="btn btn-outline-primary" data-value="Thursday">Thursday</button>
                    <button type="button" class="btn btn-outline-primary" data-value="Friday">Friday</button>
                    <button type="button" class="btn btn-outline-primary" data-value="Saturday">Saturday</button>
                    <button type="button" class="btn btn-outline-primary" data-value="Sunday">Sunday</button>
                </div>
                <div id="selected-days" class="mt-2"></div>
            </div>

            <div class="mb-3">
                <label for="availability-hours" class="form-label">Hours Available:</label>
                <div id="availability-hours" class="btn-group" role="group" aria-label="Hours Available">
                    <button type="button" class="btn btn-outline-primary" data-value="morning">Morning</button>
                    <button type="button" class="btn btn-outline-primary" data-value="afternoon">Afternoon</button>
                    <button type="button" class="btn btn-outline-primary" data-value="evening">Evening</button>
                    <button type="button" class="btn btn-outline-primary" data-value="night">Night</button>
                </div>
                <div id="selected-hours" class="mt-2"></div>
            </div>

            <div class="mb-3">
                <label for="price-range" class="form-label">Price Range:</label>
                <select class="form-select" id="price-range" name="price-range">
                    <option value="0-50">NLe0 - NLe500</option>
                    <option value="50-100">NLe750 - NLe1000</option>
                    <option value="100-200">NLe1000 - NLe5000</option>
                    <option value="200-500">NLe5000 - NLe10000</option>
                    <option value="500+">NLe10000+</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="gallery" class="form-label">Upload A Valid ID:</label>
                <input type="file" class="form-control" id="identification" name="identification" accept="image/*" multiple>
            </div>
            <div class="mb-3">
                <label for="gallery" class="form-label">Portfolio Gallery:</label>
                <input type="file" class="form-control" id="gallery" name="gallery[]" accept="image/*" multiple>
            </div>

          <a href="estherselfview.html" style="background-color:blue; padding:10px; color:white; text-decoration:none;">Save Changes</button> </a>
        </form>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const profilePictureInput = document.getElementById('profile-picture-input');
            const profilePicture = document.getElementById('profile-picture');
            const selectedCategories = document.getElementById('selected-categories');
            const categoryPills = document.querySelectorAll('#categories .nav-link');
            const addCategoryButton = document.getElementById('add-category-button');
            const customCategoryInput = document.getElementById('custom-category');
            const selectedDays = document.getElementById('selected-days');
            const daysButtons = document.querySelectorAll('#availability-days button');
            const selectedHours = document.getElementById('selected-hours');
            const hoursButtons = document.querySelectorAll('#availability-hours button');

            profilePicture.addEventListener('click', () => {
                profilePictureInput.click();
            });

            profilePictureInput.addEventListener('change', (event) => {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        profilePicture.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });

            const appendSelectedCategory = (category) => {
                const selectedCategoryElement = document.createElement('span');
                selectedCategoryElement.classList.add('badge', 'bg-primary', 'me-2', 'selected-item');
                selectedCategoryElement.textContent = category;
                selectedCategories.appendChild(selectedCategoryElement);
            };

            categoryPills.forEach(pill => {
                pill.addEventListener('click', () => {
                    pill.classList.toggle('selected-pill');
                    const selectedCategory = pill.textContent.trim();
                    if (pill.classList.contains('selected-pill')) {
                        appendSelectedCategory(selectedCategory);
                    } else {
                        const categories = selectedCategories.querySelectorAll('.selected-item');
                        categories.forEach(category => {
                            if (category.textContent === selectedCategory) {
                                category.remove();
                            }
                        });
                    }
                });
            });

            addCategoryButton.addEventListener('click', () => {
                const customCategory = customCategoryInput.value.trim();
                if (customCategory) {
                    appendSelectedCategory(customCategory);
                    customCategoryInput.value = '';
                }
            });

            daysButtons.forEach(button => {
                button.addEventListener('click', () => {
                    button.classList.toggle('btn-primary');
                    button.classList.toggle('btn-outline-primary');
                    const selectedDay = button.getAttribute('data-value');
                    const selectedDayElement = document.createElement('span');
                    selectedDayElement.classList.add('badge', 'bg-primary', 'me-2', 'selected-item');
                    selectedDayElement.textContent = selectedDay;

                    if (button.classList.contains('btn-primary')) {
                        selectedDays.appendChild(selectedDayElement);
                    } else {
                        const days = selectedDays.querySelectorAll('.selected-item');
                        days.forEach(day => {
                            if (day.textContent === selectedDay) {
                                day.remove();
                            }
                        });
                    }
                });
            });

            hoursButtons.forEach(button => {
                button.addEventListener('click', () => {
                    button.classList.toggle('btn-primary');
                    button.classList.toggle('btn-outline-primary');
                    const selectedHour = button.getAttribute('data-value');
                    const selectedHourElement = document.createElement('span');
                    selectedHourElement.classList.add('badge', 'bg-primary', 'me-2', 'selected-item');
                    selectedHourElement.textContent = selectedHour;

                    if (button.classList.contains('btn-primary')) {
                        selectedHours.appendChild(selectedHourElement);
                    } else {
                        const hours = selectedHours.querySelectorAll('.selected-item');
                        hours.forEach(hour => {
                            if (hour.textContent === selectedHour) {
                                hour.remove();
                            }
                        });
                    }
                });
            });

            document.getElementById('seller-form').addEventListener('submit', (event) => {
                event.preventDefault();
                // Perform form validation and AJAX request to submit the form data
                console.log("Form submitted");
                // You can add your AJAX code here to send data to the server
            });
        });
    </script>
</body>
</html>
