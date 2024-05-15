<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unleash Kotlin - Home Page</title>
    <link rel="stylesheet" href="styles.css">
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    <style>
        /* Existing styles */
        /* Styles for navigation bar */
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
          margin-left: 1px; /* Adjusted margin */
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
        <!-- Header content -->
    </header>

    <nav>
        <a href="Home.php" onclick="showSection('Prog')">Programming Languages</a>
        <a href="Chapter.php" onclick="showSection('chapters')">Chapters</a>
        <a href="Lesson.php" onclick="showSection('lessons')">Lessons</a>
        <a href="Quiz.php" onclick="showSection('quizzes')">Quizzes</a>
        <a href="Exam.php" onclick="showSection('exams')">Exams</a>
        <a href="#" onclick="showSection('user')" class="active">Users</a>
        <a href="index.php"class="logout-button" onclick="localStorage.removeItem('token');">Logout</a>
    </nav>

    <div class="content-container">

        <!-- User Section -->
        <div class="content section active" id="userSection">
                <div class="dropdown" onclick="toggleDropdown()">
                    <button class="dropbtn">Select Account</button>
                    <div class="dropdown-content" id="dropdownContent">
                        <a href="User.php">Admin</a>
                        <a href="#">User</a>
                    </div>
                    
                </div>
            <h2>User</h2>
            <table>
                <thead>
                <tr>
                    <th>UserName::</th>
                    <th>Email:</th>
                    <th>Password:</th>
                    <th>Email Verified At:</th>
                    <th>OTP:</th>
                </tr>
                </thead>
                <tbody id="adminBody">
                <tr>
                    <td>Sample USername</td>
                    <td>Sample Email</td>
                    <td>Sample Password</td>
                    <td>Sample VErified Email</td>
                    <td>Sample OTP</td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>

    <script>
        function toggleDropdown() {
            var dropdownContent = document.getElementById("dropdownContent");
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        }
    </script>
</body>
</html>