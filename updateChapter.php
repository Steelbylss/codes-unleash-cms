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
        <a href="#" onclick="showSection('chapters')" class="active">Chapters</a>
        <a href="updateLesson.php" onclick="showSection('lessons')">Lessons</a>
        <a href="updateQuiz.php" onclick="showSection('quizzes')">Quizzes</a>
        <a href="updateExamp.php" onclick="showSection('exams')">Exams</a>
    </nav>
    <div class="content-container">
        
        <!-- Form for chapters -->
        <div class="content section active" id="chaptersSection">
        <div class="dropdown" onclick="toggleDropdown()">
                <button class="dropbtn">Select Chapter</button>
                <div class="dropdown-content" id="dropdownContent">
                </div>
            </div>
        <div style="text-align: right; margin-right: 25px; margin-top: 20px;">
                    <button class="delete-button" id="deleteButton">Delete</button>
                </div> 
            <h2>Chapters</h2>
            <form>
                <label for="chapterName" class="form-label">Programming Language Reference Number:</label>
                <input type="text" id="chapRefNum" name="programmingLanguage" class="form-input" readonly>
                <label for="chapterName" class="form-label">Chapter Name:</label>
                <input type="text" id="ChapTitle" name="chapter_name" class="form-input" required>

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
                const referenceNumber = document.getElementById('chapRefNum').value;
                const name = document.getElementById('ChapTitle').value;

                // Prepare the request body
                const requestBody = {
                    chapter_name: name
                };

                // Make the API call to update the programming language
                fetch(`http://192.168.1.7/api/chapter/update/${referenceNumber}`, {
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
                        throw new Error('Failed to update chapter.');
                    }
                    showAlert('Chapter updated successfully!'); // Show success message
                    window.location.reload(); // Reload the page to reflect the changes
                })
                .catch(error => {
                    console.error('Error updating chapter:', error);
                    showAlert('Failed to update chapter. Please try again.'); // Show error message
                });
            });
        });
        fetch('http://192.168.1.7/api/chapter', {
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
            data.results[0].chapters.forEach(chapter => { // accessing the chapters array within the first (and only) result
                const option = document.createElement('a');
                option.href = "#";
                option.textContent = chapter.chapter_name; // accessing the chapter_name directly
                option.onclick = function() {
                    // Set selected language in the dropdown button
                    document.querySelector('.dropbtn').textContent = chapter.programming_language; // accessing the programming_language from the result
                    // Populate form fields with selected chapter details
                    document.getElementById('chapRefNum').value = chapter.reference_number;
                    document.getElementById('ChapTitle').value = chapter.chapter_name; // programming language, assuming this is correct
                    // You might need to add the description field if it exists in your data structure
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
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButton = document.getElementById('deleteButton');

            deleteButton.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default button behavior
                
                // Get the reference number of the programming language to delete
                const referenceNumber = document.getElementById('chapRefNum').value;

                // Make the API call to delete the programming language
                fetch(`http://192.168.1.7/api/chapter/delete/${referenceNumber}`, {
                    method: 'DELETE',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to delete chapter.');
                    }
                    showAlert('Chapter deleted successfully!'); // Show success message
                    window.location.reload(); // Reload the page after deletion
                })
                .catch(error => {
                    console.error('Error deleting Chapter:', error);
                    showAlert('Failed to delete Chapter. Please try again.'); // Show error message
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
