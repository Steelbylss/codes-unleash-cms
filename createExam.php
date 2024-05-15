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
        <a href="createLesson.php" onclick="showSection('lessons')">Lessons</a>
        <a href="createQuiz.php" onclick="showSection('quizzes')">Quizzes</a>
        <a href="#" onclick="showSection('exams')" class="active">Exams</a>
    </nav>
    <div class="content-container">
        <!-- Form for exam -->
        <div class="content section active" id="examsSection">
            <h2>Exam</h2>
            <form id="examForm">
                <label for="createexamRefNum" class="form-label">Programming Language Reference Number:</label>
                <input type="text" id="createexamRefNum" name="programming_language_reference_number" class="form-input" required>

                <label for="quizNum" class="form-label">Question Number :</label>
                <input type="text" id="quizNum" name="question_number" class="form-input" required>

                <label for="quizTitle" class="form-label">Question :</label>
                <input type="text" id="quizTitle" name="question" class="form-input" required>

                <label for="questions" class="form-label">Code Snippet:</label>
                <textarea id="questions" name="code_snippet" class="form-input" rows="4"></textarea>

                <label for="choice1" class="form-label">Option 1:</label>
                <input type="text" id="choice1" name="choice_1" class="form-input" rows="4" required>

                <label for="choice2" class="form-label">Option 2:</label>
                <input type="text" id="choice2" name="choice_2" class="form-input" rows="4" required>

                <label for="choice3" class="form-label">Option 3:</label>
                <input type="text" id="choice3" name="choice_3" class="form-input" rows="4" required>

                <label for="choice4" class="form-label">Option 4:</label>
                <input type="text" id="choice4" name="choice_4" class="form-input" rows="4" required>

                <label for="answer" class="form-label">Correct Answer(1-4):</label>
                <input type="number" id="answer" name="correct_answer" class="form-input" required>

                <div style="text-align: right; margin-right: 20px;">
                    <button class="create-new-button" onclick="window.location.href = '#'">Submit</button>
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

            const examForm = document.getElementById('examForm');

            examForm.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(examForm);
                const token =localStorage.getItem('token');

                fetch('http://192.168.1.7/api/exam/create', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => {
                    if (response.ok) {
                        showAlert('Exam Question created successfully!');
                        // Handle success as needed, like redirecting or showing a success message
                        window.location.href = 'Exam.php';
                    } else {
                        // Handle errors, like showing an error message
                        showAlert('Failed to create exam question. Please try again.');
                    }
                })
                .then(data => {
                    // Handle response from API
                    console.log(data);
                })
                .catch(error => {
                    console.error('Error:', error);
                    showAlert(error)
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
