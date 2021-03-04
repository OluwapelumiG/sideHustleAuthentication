<?php   session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: auth.php");
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index - Auth application</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
   <h1>Welcome, <?php echo ucfirst($_SESSION['username']); ?></h1>
    <h5>You are logged in.</h5>
    <p>click <a href="logout.php">here to logout.</a></p>
    </div>
    
</body>
</html>