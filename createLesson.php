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
    </style>
</head>
<body>
    <header>
        <h1>Create - Content Management System</h1>
        <div style="text-align: right; margin-right: 20px; margin-top: -75px; padding: 20px;">
            <button class="create-new-button" onclick="window.location.href = 'Home.php'">Return</button>
        </div>
    </header>
    <nav>
        <a href="createProg.php" onclick="showSection('introduction')">Progamming Language</a>
        <a href="createChapter.php" onclick="showSection('chapters')">Chapters</a>
        <a href="#" onclick="showSection('lessons')" class="active">Lessons</a>
        <a href="createQuiz.php" onclick="showSection('quizzes')">Quizzes</a>
        <a href="createExam.php" onclick="showSection('exams')">Exams</a>
    </nav>
    <div class="content-container">
        <!-- Form for lessons -->
        <div class="content section active" id="lessonsSection">
        <h2>Lesson</h2>
            <form id="lessonForm">
                <label for="createlessonRefNum" class="form-label">Chapter Reference Number:</label>
                <input type="text" id="createlessonRefNum" name="chapter_reference_number" class="form-input" required>

                <label for="LessonNum" class="form-label">Lesson Number:</label>
                <input type="text" id="LessonNum" name="lesson_number" class="form-input" required>

                <label for="LessonTitle" class="form-label">Lesson Title:</label>
                <input type="text" id="LessonTitle" name="lesson_title" class="form-input" required>

                <label for="lessonDesc" class="form-label">Description:</label>
                <textarea id="lessonDesc" name="lesson_description" class="form-input" rows="4" required></textarea>

                <label for="video" class="form-label">Video:</label>
                <input type="file" id="video" name="video_input" accept="video/*" class="form-input">
                <input type="hidden" id="videoUrl" name="lesson_video" class="form-input">

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

            lessonForm.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(lessonForm);
                formData.delete('video_input');

                fetch('http://192.168.1.7/api/lesson/create', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Authorization': 'Bearer ' + token
                    }
                })
                .then(response => {
                    if (response.ok) {
                        showAlert('Lesson created successfully!');
                        // Handle success as needed, like redirecting or showing a success message
                        window.location.href = 'Lesson.php';
                    } else {
                        // Handle errors, like showing an error message
                        showAlert('Failed to create lesson. Please try again.');
                    }
                })
                .then(data => {
                    // Handle response from API
                    console.log(data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });
        function showAlert(message) {
            // You can implement your alert logic here, like showing a toast or modal
            alert(message);
        }
    </script>
</body>
</html>
