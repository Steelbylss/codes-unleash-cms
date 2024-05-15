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
            position: relative;
            display: inline-block;
            margin-bottom: 10px; /* Added margin for spacing */
        }

        .dropbtn {
            background-color: #057DCD;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
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
        <h1>Create - Content Management System</h1>
        <div style="text-align: right; margin-right: 20px; margin-top: -75px; padding: 20px;">
            <button class="create-new-button" onclick="window.location.href = 'Home.php'">Return</button>
        </div>
    </header>
    <nav>
        <a href="#" onclick="showSection('introduction')" class="active">Progamming Language</a>
        <a href="createChapter.php" onclick="showSection('chapters')">Chapters</a>
        <a href="createLessn.php" onclick="showSection('lessons')">Lessons</a>
        <a href="createQuiz.php" onclick="showSection('quizzes')">Quizzes</a>
        <a href="createExam.php" onclick="showSection('exams')">Exams</a>
    </nav>
    <div class="content-container">
        <!-- Form for introduction -->
        <div class="content section active" id="introductionSection">
            <form id="createProgrammingLanguageForm">
                <!-- KOTLIN INTRODUCTION -->
                <h2>Programming Language</h2>
                <label for="title" class="form-label">Name:</label>
                <input type="text" id="ProgRefNum" name="name" class="form-input" required>
                <!-- description -->
                <label for="description" class="form-label">Description:</label>
                <textarea type="text" id="Name" name="description" class="form-input" required></textarea>
                
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

            const createProgrammingLanguageForm = document.getElementById('createProgrammingLanguageForm');

            createProgrammingLanguageForm.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(createProgrammingLanguageForm);
                const token =localStorage.getItem('token');

                fetch('http://192.168.1.7/api/programming-language/create', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => {
                    if (response.ok) {
                        showAlert('Programming Language created successfully!');
                        // Handle success as needed, like redirecting or showing a success message
                        windows.location.href = 'Home.php';
                    } else {
                        // Handle errors, like showing an error message
                        showAlert('Failed to create introduction. Please try again.');
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
