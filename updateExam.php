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
        <a href="updateLesson.php" onclick="showSection('lessons')">Lessons</a>
        <a href="updateQuiz.php" onclick="showSection('quizzes')">Quizzes</a>
        <a href="#" onclick="showSection('exams')" class="active">Exams</a>
    </nav>
    <div class="content-container">
        <!-- Form for exam -->
        <div class="content section active" id="examsSection">
        <div class="dropdown" onclick="toggleDropdown()">
                <button class="dropbtn">Select Exam Number</button>
                <div class="dropdown-content" id="dropdownContent">
                </div>
            </div>
        <div style="text-align: right; margin-right: 25px; margin-top: 20px;">
                    <button class="create-new-button" id="deleteButton">Delete</button>
                </div> 
            <h2>Exam</h2>
            <form action="submit_exams.php" method="POST" onsubmit="showAlert('Exam created successfully!');">
                <label for="refNum" class="form-label">Reference Number:</label>
                <input type="text" id="refNum" name="reference_number" class="form-input" required>

                <label for="quizNum" class="form-label">Question Number :</label>
                <input type="text" id="quizNum" name="question_number" class="form-input" required>

                <label for="quizTitle" class="form-label">Question :</label>
                <input type="text" id="quizTitle" name="question" class="form-input" required>

                <label for="questions" class="form-label">Code Snippet:</label>
                <textarea id="code_snippet" name="code_snippet" class="form-input" rows="4"></textarea>

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
        const token = localStorage.getItem('token');

        document.addEventListener('DOMContentLoaded', function() {
            const deleteButton = document.getElementById('deleteButton');

            deleteButton.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default button behavior
                
                // Get the reference number of the programming language to delete
                const referenceNumber = document.getElementById('refNum').value;

                // Make the API call to delete the programming language
                fetch(`http://192.168.1.7/api/exam/delete/question/${referenceNumber}`, {
                    method: 'DELETE',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to delete question.');
                    }
                    showAlert('Question deleted successfully!'); // Show success message
                    window.location.href = 'Exam.php';
                })
                .catch(error => {
                    console.error('Error deleting lesson:', error);
                    showAlert('Failed to delete lesson. Please try again.'); // Show error message
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');

            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission
                
                // Get the updated name and description from the form fields
                const refNum = document.getElementById('refNum').value;
                const num = document.getElementById('quizNum').value;
                const name = document.getElementById('quizTitle').value;
                const exampleCode = document.getElementById('code_snippet').value;
                const choice1 = document.getElementById('choice1').value;
                const choice2 = document.getElementById('choice2').value;
                const choice3 = document.getElementById('choice3').value;
                const choice4 = document.getElementById('choice4').value;
                const answer = document.getElementById('answer').value;

                // Prepare the request body
                const requestBody = {
                    question_number: num,
                    question: name,
                    code_snippet: exampleCode,
                    choice_1: choice1,
                    choice_2: choice2,
                    choice_3: choice3,
                    choice_4: choice4,
                    correct_answer: answer
                };

                // Make the API call to update the programming language
                fetch(`http://192.168.1.7/api/exam/update/${refNum}`, {
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
                        throw new Error('Failed to update exam question.');
                    }
                    showAlert('Exam question updated successfully!'); // Show success message
                    window.location.href = 'Exam.php';
                })
                .catch(error => {
                    console.error('Error updating exam question:', error);
                    showAlert('Failed to update exam question. Please try again.'); // Show error message
                });
            });
        });
        fetch('http://192.168.1.7/api/exam', {
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
            data.results.forEach(exam => {
                console.log(exam)
                const option = document.createElement('a');
                option.href = "#";
                option.textContent = exam.programming_language + " Exam - Question Number "  + exam.question_number;
                option.onclick = function() {
                    // Set selected language in the dropdown button
                    document.querySelector('.dropbtn').textContent = exam.programming_language + " Exam - Question Number "  + exam.question_number;;
                    // Populate form fields with selected language details
                    document.getElementById('refNum').value = exam.reference_number;
                    document.getElementById('quizNum').value = exam.question_number;
                    document.getElementById('quizTitle').value = exam.question;
                    document.getElementById('code_snippet').value = exam.code_snippet;
                    document.getElementById('choice1').value = exam.choice_1;
                    document.getElementById('choice2').value = exam.choice_2;
                    document.getElementById('choice3').value = exam.choice_3;
                    document.getElementById('choice4').value = exam.choice_4;
                    document.getElementById('answer').value = exam.correct_answer;
                    toggleDropdown();
                };
                dropdownContent.appendChild(option);
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
