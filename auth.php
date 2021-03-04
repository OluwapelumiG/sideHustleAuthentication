<?php
    session_start();
    $regError = "";
    $loginDisplay = "";
    $loginError = "";

    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password1 = $_POST['password'];
        $password2 = $_POST['confirmPassword'];

        if ($password1 == $password2) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password1;
        } else {
            $regError = "Passwords do not match";
        }
    }

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // isset($_SESSION['username']) ? $dbUser = $_SESSION['username'] : $dbUser = null;
        // isset($_SESSION['password']) ? $dbPass = $_SESSION['password'] : $dbPass = null;
        if (isset($_SESSION['username'])) {
            // echo $_SESSION['username'];
        
        if (($username == $_SESSION['username']) && ($password == $_SESSION['password'])) {
            header("Location: index.php");
        } else {
            $loginError = "Incorrect login details";
        }
    } else {
        $loginError = "You must register first";
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication app</title>
    <link rel="stylesheet" href="style.css">
    <style>
    <?php if ($regError == "") { ?>
        div#register {
            display: none;
        }
        <?php }
        
        if ($regError != "") { ?>

            div#login {
            display: none;
        }

        <?php } ?>
    </style>
</head>
<body>
    <div class="container">
        <!-- Login form -->
        <div id="login" class="row login">
            <div class="heading">
            <h3>Login Form</h3>
            <p class="error"><?php echo $loginError; ?></p>
            </div>
            <div class="form">
            <form action="auth.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="Enter your username">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" placeholder="Enter your password">
                </div>
                <input type="submit" value="Login" name="login">
                <p>Your don't have account? <a href="#" onclick="showRegister();">Register here.</a></p>
                

            </form>
            </div>
        </div>

        <!-- Register form -->
        <div id="register" class="row register">
            <div class="heading">
            <h3>Registeration Form</h3>
            <p class="error"><?php echo $regError; ?></p>
            </div>
            <div class="form">
            <form action="auth.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="Choose a username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" placeholder="Choose password" required>
                </div>
                <div class="form-group">
                    <label for="password">Confirm Password:</label>
                    <input type="password" name="confirmPassword" placeholder="Confirm your password" required>
                </div>
                <input type="submit" value="Register" name="register">
                <p>Already have an account? <a href="#" onclick="showLogin();">Login here.</a></p>
                

            </form>
            </div>
        </div>

    </div>
    <script>
    function showLogin() {
        document.getElementById("register").style.display = ("none");
        document.getElementById("login").style.display = ("block");
    }
    function showRegister() {
        document.getElementById("register").style.display = ("block");
        document.getElementById("login").style.display = ("none");
    }
    </script>
</body>
</html>