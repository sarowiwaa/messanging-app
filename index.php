<?php 
session_start();

// Redirect if user is already logged in
if (isset($_SESSION['username'])) {
    header("Location: home.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>messanging app- Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" 
          crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="icon" href="g/logo.png">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="w-400 p-5 shadow rounded">
        <form method="post" action="app/http/auth.php">
            <div class="d-flex justify-content-center align-items-center flex-column">
                
                <img src="g/logo.png" class="w-25">
            </div>

            <!-- Display Errors if Set in Session -->
            <?php 
            if (isset($_SESSION['error'])) { 
                echo '<div class="alert alert-warning" role="alert">'.$_SESSION['error'].'</div>';
                unset($_SESSION['error']); // Clear error after displaying
            }

            if (isset($_SESSION['success'])) { 
                echo '<div class="alert alert-success" role="alert">'.$_SESSION['success'].'</div>';
                unset($_SESSION['success']); // Clear success message
            }
            ?>
            
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            
            <button type="submit" class="btn btn-primary">LOGIN</button>
            <a href="signup.php">Sign Up</a>
        </form>
    </div>
</body>
</html>
