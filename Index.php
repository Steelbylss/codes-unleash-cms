<!DOCTYPE html>
<html>
    <head>
        <title>Slide Navbar</title>
        <link rel="stylesheet" type="text/css" href="slide navbar style.css">
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            body {
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                font-family: 'Jost', sans-serif;
                background: linear-gradient(to bottom, #042b46, #1c5275, #057DCD);
            }

            .main {
                width: 350px;
                height: 500px;
                background: red;
                overflow: hidden;
                background: url("https://doc-08-2c-docs.googleusercontent.com/docs/securesc/68c90smiglihng9534mvqmq1946dmis5/fo0picsp1nhiucmc0l25s29respgpr4j/1631524275000/03522360960922298374/03522360960922298374/1Sx0jhdpEpnNIydS4rnN4kHSJtU1EyWka?e=view&authuser=0&nonce=gcrocepgbb17m&user=03522360960922298374&hash=tfhgbs86ka6divo3llbvp93mg4csvb38") no-repeat center/ cover;
                border-radius: 10px;
                box-shadow: 5px 20px 50px #000;
            }

            #chk {
                display: none;
            }

            .signup, .login {
                position: relative;
                width:100%;
                height: 100%;
            }

            label {
                color: #fff;
                font-size: 2.3em;
                justify-content: center;
                display: flex;
                margin: 60px;
                font-weight: bold;
                cursor: pointer;
                transition: .5s ease-in-out;
            }

            input {
                width: 60%;
                height: 20px;
                background: #e0dede;
                justify-content: center;
                display: flex;
                margin: 20px auto;
                padding: 10px;
                border: none;
                outline: none;
                border-radius: 5px;
            }

            button {
                width: 60%;
                height: 40px;
                margin: 10px auto;
                justify-content: center;
                display: block;
                color: #fff;
                background: #4971e0;
                font-size: 1em;
                font-weight: bold;
                margin-top: 20px;
                outline: none;
                border: none;
                border-radius: 5px;
                transition: .2s ease-in;
                cursor: pointer;
            }

            button:hover {
                background: #057DCD;
            }

            .CMS {
            color: #fff;
            font-size: 7px;
            justify-content: center;
            display: flex;
            margin: 10px;
            transition: .5s ease-in-out;
            margin-top: -50px;
        }

            .login {
                height: 460px;
                background: #eee;
                border-radius: 60% / 10%;
                transform: translateY(-180px);
                transition: .8s ease-in-out;
            }

            .login label {
                color: #057DCD;
                transform: scale(.6);
            }

            #chk:checked ~ .login {
                transform: translateY(-500px);
            }

            #chk:checked ~ .login label {
                transform: scale(1);
            }

            #chk:checked ~ .signup label {
                transform: scale(.6);
            }
        </style>

    </head>
    <body>
        <div class="main">
            <input type="checkbox" id="chk" aria-hidden="true">

            <div class="signup">
                <form id="signup-form">
                <center><label for="chk" aria-hidden="true">Welcome to CODES UNLEASH</label></center>
             <div class="CMS">
                 <center><label for="chk" aria-hidden="true">Content Management System of CODES UNLEASH Application</label></center>
            </div>
                </form>
            </div>

            <div class="login">
                <form id="login-form">
                    <label for="chk" aria-hidden="true">Login</label>
                    <input type="text" name="usernameOrEmail" placeholder="Username/Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
    </body>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if token exists in localStorage
            const token = localStorage.getItem('token');
            if (token) {
                window.location.href = 'Home.php'; // Redirect to Home.php if token exists
            }
            const signupForm = document.getElementById('signup-form');
            const loginForm = document.getElementById('login-form');

            signupForm.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(signupForm);

                fetch('http:/192.168.1.4/api/register', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Handle response from API
                    console.log(data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });

            loginForm.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(loginForm);

                fetch("http://192.168.1.7/api/login", {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    localStorage.setItem('token', data.results.token);
                    window.location.href = 'Home.php'
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });
    </script>
</html>