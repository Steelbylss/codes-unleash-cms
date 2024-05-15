<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unleash Kotlin - Home Page</title>
    <link rel="stylesheet" href="styles.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        html, body {
            margin: 0;
            padding: 0;
        }
        header {
            text-align: center;
            background-color: #035b96;
            color: white;
            padding: 0px 0; 
            font-size: 15px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        nav {
            background-color: #057DCD;
            overflow: hidden;
            width: 150px;
            height: 100%;
            position: fixed;
            padding-top: 0px; 
            margin-top:-11px;
        }
        nav a {
            display: block;
            color: white;
            padding: 14px 10px;
            text-decoration: none;
        }
        nav a:hover {
            background-color: #2298E6;
        }
        nav a.active {
            background-color: #2298E6;
        }
        main {
            margin-left: 150px;
            margin-top: 27px;
            padding-top: 50px;
            margin-left: 150px;
        }
        .section {
            margin: 20px;
            display: none;
        }
        .section.active {
            display: block;
        }
        .section h2 {
            margin-bottom: 10px;
        }
        .section p {
            margin-bottom: 20px;
        }
        .section table {
            width: 100%;
            border-collapse: collapse;
        }
        .section th, .section td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .section th {
            background-color: #e2dfdf;
        }
        .content-container {
            margin-top: 85px;
            margin-left: 145px;
        }
        .content {
            margin: 20px;
            padding: 30px;
            padding-top: 1px;
            background-color: #f0f0f0;
            border-style: solid;
            border-radius: 5px;
        }
        /* Style for form elements */
        .form-label {
            display: block;
            margin-top: 10px;
        }
        .form-input {
            width: 98%;
            padding: 8px;
            margin-top: 6px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;

            box-sizing: border-box;
        }
        .button-container {
          position: absolute;
          top: 10px; /* Adjusted top position to move the container higher */
          right: 20px; /* Adjusted right position for spacing */
        }
        .create-new-button, .edit-button, .delete-button {
          background-color: #057DCD;
          color: #fff;
          border: none;
          padding: 10px 20px;
          cursor: pointer;
          border-radius: 5px;
          margin-right: 10px;
        }
                        /* Dropdown button styles */
                        .dropdown {
            position: absolute;
            display: inline-block;
            margin-bottom: 10px; /* Added margin for spacing */
            margin-top: 20px;
        }

        .dropbtn {
            background-color: #057DCD;
            color: white;
            padding: 10px 20px;
            font-size: 14px; /* Adjusted font size */
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .dropbtn:hover {
            background-color: #2298E6;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 5px;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        /* Adjust dropdown arrow */
        .dropdown .dropbtn:after {
            content: "\25BC";
            font-size: 16px;
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Update - Content Management System</h1>
        <div style="text-align: right; margin-right: 20px; margin-top: -75px; padding: 20px;">
            <button class="create-new-button" onclick="window.location.href = 'Home.php'">Return</button>
        </div>
    </header>
    <nav>
        <a href="updateProg.php" onclick="showSection('introduction')">Progamming Language</a>
        <a href="updateChapter.php" onclick="showSection('chapters')">Chapters</a>
        <a href="#" onclick="showSection('lessons')" class="active">Lessons</a>
        <a href="updateQuiz.php" onclick="showSection('quizzes')">Quizzes</a>
        <a href="updateExam.php" onclick="showSection('exams')">Exams</a>
    </nav>
    <div class="content-container">
        <!-- Form for lessons -->
        <div class="content section active" id="lessonsSection">
        <div class="dropdown" onclick="toggleDropdown()">
                <button class="dropbtn">Select Lesson</button>
                <div class="dropdown-content" id="dropdownContent">
                </div>
            </div>
        <div style="text-align: right; margin-right: 25px; margin-top: 20px;">
                    <button class="create-new-button" id="deleteButton">Delete</button>
                </div> 
        <h2>Lesson</h2>
        <form>
                
                <label for="refNum" class="form-label">Reference Number:</label>
                <input type="text" id="refNum" name="chapter_reference_number" class="form-input" readonly>

                <label for="chapNum" class="form-label">Chapter Reference Number(Change what chapter lesson is under.):</label>
                <input type="text" id="chapNum" name="chapter_reference_number" class="form-input" required>

                <label for="LessonNum" class="form-label">Lesson Number:</label>
                <input type="text" id="LessonNum" name="lesson_number" class="form-input" required>

                <label for="LessonTitle" class="form-label">Lesson Title:</label>
                <input type="text" id="LessonTitle" name="lesson_title" class="form-input" required>

                <label for="lessonDesc" class="form-label">Description:</label>
                <textarea id="lessonDesc" name="lesson_description" class="form-input" rows="4" required></textarea>

                <label for="video" class="form-label">Update Video:</label>
                <input type="file" id="video" name="video_input" accept="video/*" class="form-input">
                <label for="videoUrl" class="form-label">Video Path:</label>
                <input type="text" id="videoUrl" name="lesson_video" class="form-input" readonly>

                <label for="exampleCode" class="form-label">Example Code:</label>
                <textarea id="exampleCode" name="lesson_example_code" class="form-input" rows="4" required></textarea>

                <label for="output" class="form-label">Output:</label>
                <textarea id="output" name="lesson_output" class="form-input" rows="4" required></textarea>

                <label for="explanation" class="form-label">Explanation:</label>
                <textarea id="explanation" name="lesson_explanation" class="form-input" rows="4" required></textarea>

                <div style="text-align: right; margin-right: 20px;">
                    <button class="create-new-button" type="submit">Submit</button>
                </div>  
            </form>
         </div>
    </div>
    <script>
        const token =localStorage.getItem('token');

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');

            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission
                
                // Get the updated name and description from the form fields
                const refNum = document.getElementById('refNum').value;
                const referenceNumber = document.getElementById('chapNum').value;
                const num = document.getElementById('LessonNum').value;
                const name = document.getElementById('LessonTitle').value;
                const description = document.getElementById('lessonDesc').value;
                const exampleCode = document.getElementById('exampleCode').value;
                const output = document.getElementById('output').value;
                const explanation = document.getElementById('explanation').value;
                const video = document.getElementById('videoUrl').value;

                // Prepare the request body
                const requestBody = {
                    chapter_reference_number: referenceNumber,
                    lesson_number: num,
                    lesson_title: name,
                    lesson_description: description,
                    lesson_example_code: exampleCode,
                    lesson_output: output,
                    lesson_explanation: explanation,
                    lesson_video: video
                };

                // Make the API call to update the programming language
                fetch(`http://192.168.1.7/api/lesson/update/${refNum}`, {
                    method: 'PUT', // Assuming you're using PUT method for updating
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + token,
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(requestBody)
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to update lesson.');
                    }
                    showAlert('Lesson updated successfully!'); // Show success message
                    window.location.href = 'Lesson.php'; 
                })
                .catch(error => {
                    console.error('Error updating lesson:', error);
                    showAlert('Failed to update lesson. Please try again.'); // Show error message
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            // Check if token exists in localStorage
            const token = localStorage.getItem('token');
            if (!token) {
                window.location.href = 'Index.php'; // Redirect to Home.php if token exists
            }

            const lessonForm = document.getElementById('lessonForm');
            const videoInput = document.getElementById('video');

            // Event listener for file input change
            videoInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    uploadVideo(file);
                }
            });

            function uploadVideo(file) {
                const formData = new FormData();
                formData.append('video', file);

                fetch('http://192.168.1.7/api/lesson/upload-video', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => {
                    return response.text();
                })
                .then(data => {
                    showAlert('Video uploaded successfully!');
                    // Set the video URL to the lesson_video input field
                    document.getElementById('videoUrl').value = data;
                })
                .catch(error => {
                    console.error('Error:', error);
                    showAlert('An error occurred while uploading the video.');
                });
            }
        });
        fetch('http://192.168.1.7/api/lesson', {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer ' + token,
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            const dropdownContent = document.getElementById('dropdownContent');

            // Populate dropdown menu with programming language options
            data.results.forEach(result => {
                result.lessons.forEach(lesson => {
                    const option = document.createElement('a');
                    option.href = "#";
                    option.textContent = result.chapter + " - " + lesson.lesson_number + " " + lesson.lesson_title;
                    option.onclick = function() {
                        // Set selected lesson in the dropdown button
                        document.querySelector('.dropbtn').textContent = lesson.lesson_number + " " + lesson.lesson_title;
                        // Populate form fields with selected lesson details
                        document.getElementById('refNum').value = lesson.reference_number;
                        document.getElementById('chapNum').value = lesson.chapter_reference_number;
                        document.getElementById('LessonNum').value = lesson.lesson_number;
                        document.getElementById('LessonTitle').value = lesson.lesson_title;
                        document.getElementById('lessonDesc').value = lesson.lesson_description;
                        document.getElementById('exampleCode').value = lesson.lesson_example_code;
                        document.getElementById('output').value = lesson.lesson_output;
                        document.getElementById('explanation').value = lesson.lesson_explanation;
                        document.getElementById('videoUrl').value = lesson.lesson_video;
                        toggleDropdown();
                    };
                    dropdownContent.appendChild(option);
                });
            });

        })
        .catch(error => console.error('Error fetching programming languages:', error));
        function toggleDropdown() {
            var dropdownContent = document.getElementById("dropdownContent");
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const deleteButton = document.getElementById('deleteButton');

            deleteButton.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default button behavior
                
                // Get the reference number of the programming language to delete
                const referenceNumber = document.getElementById('refNum').value;

                // Make the API call to delete the programming language
                fetch(`http://192.168.1.7/api/lesson/delete/${referenceNumber}`, {
                    method: 'DELETE',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to delete lesson.');
                    }
                    showAlert('Lesson deleted successfully!'); // Show success message
                    window.location.href = 'Lesson.php'; 
                })
                .catch(error => {
                    console.error('Error deleting lesson:', error);
                    showAlert('Failed to delete lesson. Please try again.'); // Show error message
                });
            });
        });

        function showAlert(message) {
                // Show alert message to the user
                alert(message);
            }
        // Function to prevent the form submission when clicking inside the dropdown
        window.onload = function () {
            document.getElementById('dropdownContent').onclick = function (event) {
                event.stopPropagation();
            }
        }
    </script>
</body>
</html>
