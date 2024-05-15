<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unleash Kotlin - Home Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Existing styles */
        /* Styles for navigation bar */
        .sidebar {
          height: calc(100% - 60px); /* Adjusted height */
          width: 150px;
          position: fixed;
          top: 60px; /* Adjusted top position */
          left: 0;
          background-color: #057DCD; /* Changed background color */
          padding-top: 20px;
          font-family: Arial, sans-serif; /* Match font style */
        }
        .sidebar a {
          padding: 14px 10px; /* Adjusted padding */
          text-align: center;
          text-decoration: none;
          font-size: 18px; /* Increased font size */
          color: white;
          display: block;
        }
        .sidebar a:hover {
          background-color: #2298E6;
        }
        /* Rest of the existing styles */
        html, body {
          margin: 0;
          padding: 0;
          height: 100%; /* Set body height to 100% */
        }
        header {
          text-align: center;
          background-color: #035b96; /* Changed background color */
          color: white;
          padding: 0px 0; 
          font-size: 15px;
          position: fixed; /* Changed position to fixed */
          width: 100%; /* Added width */
          top: 0; /* Added top position */
          z-index: 1000; /* Added z-index to ensure it's above other elements */
          font-family: Arial, sans-serif; /* Set the font family */
        }
        nav {
        background-color: #035b96; /* Changed background color */
        overflow: hidden;
        width: 100%;
        text-align: right; /* Align text to the center */
        line-height: 60px; /* Set line height equal to the header height */
        }
        nav a, .logout-button {
          display: inline-block;
          color: white;
          padding: 0 20px; /* Adjusted padding */
          text-decoration: none;
          height: 40px; /* Increased height */
          font-size: 18px; /* Increased font size */
          line-height: 40px; /* Center text vertically */
        }
        nav a:hover,
        nav a.active {
          background-color: #2298E6; /* Selected navigation color */
        }
        .logout-button {
          background-color: #035b96; /* Changed background color */
          color: #fff;
          border: none;
          cursor: pointer;
          border-radius: 5px;
          margin-right: 20px; /* Added margin for spacing */
        }
        .logout-button:hover {
          background-color: #2298E6; /* Change color on hover */
        }
        main {
          margin-top: 100px; /* Adjusted margin */
        }
        .section {
          margin: 20px;
          display: none; /* Hide all sections initially */
        }
        .section.active {
          display: block; /* Show active section */
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
          margin-left: 150px; /* Adjusted margin */
          position: relative; /* Added relative positioning */
          padding-top: 20px; /* Adjusted padding top to move the content higher */
        }
        .content {
          margin: 20px;
          padding: 20px; /* Add padding for better appearance */
          background-color: #f0f0f0; /* Light gray background color */
          border-radius: 5px; /* Add border radius for rounded corners */
          border-style: solid;
        }
        /* Responsive button */
        @media only screen and (max-width: 600px) {
          .logout-button {
            margin-right: 10px; /* Adjusted margin for smaller screens */
          }
        }
        /* Styles for buttons */
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
        .create-new-button:hover, .edit-button:hover, .delete-button:hover {
          background-color: #2298E6;
        }
    </style>
</head>

<body>
    <header>
        <!-- Header content -->
    </header>

    <nav>
        <a href="#" onclick="showSection('Prog')">Programming Languages</a>
        <a href="Chapter.php" onclick="showSection('chapters')">Chapters</a>
        <a href="Lesson.php" onclick="showSection('lessons')">Lessons</a>
        <a href="Quiz.php" onclick="showSection('quizzes')">Quizzes</a>
        <a href="Exam.php" onclick="showSection('exams')">Exams</a>
        <a href="#" onclick="showSection('user')" class="active">Users</a>
        <a href="index.php"class="logout-button" onclick="localStorage.removeItem('token');">Logout</a>
    </nav>

    <div class="sidebar">
        <a href="#" class="active">Admin</a>
        <a href="#">User</a>
        <a href="#"></a>
        <a href="#"></a>
        <a href="#"></a>
    </div>

    <div class="content-container">
        <!-- Adjusted padding-top to move the content higher -->
        <div style="text-align: right; margin-right: 20px;">
            <button class="create-new-button" onclick="goToAddContentPage()">Create New</button>
            <button class="edit-button" onclick="goToEditContentPage()">Update</button>
            <button class="delete-button" onclick="deleteContent()">Delete</button>
        </div>

        <!-- User Section -->
        <div class="content section active" id="userSection">
            <h2>Exams</h2>
            <table>
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>User Name</th>
                </tr>
                </thead>
                <tbody id="examsBody">
                <tr>
                    <td>Sample Name</td>
                    <td>Sample Lastname</td>
                    <td>Sample UserName</td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</body>
</html>