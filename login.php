<?php
session_start();
if (isset($_SESSION['user_id'])) {
    // Redirect to home page if already logged in
    header('Location: home.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>School System Login</title>
    <style>
        body {
            background-color: #f4f4f9;
            font-family: Arial, sans-serif;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
            margin: 150px auto;
            background-color: #fff;
            padding: 30px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            color: #22464f;
        }
        .form-control {
            margin-bottom: 15px;
            border-radius: 5px;
            padding: 10px;
        }
        .btn-login {
            background-color: #22464f;
            color: white;
            width: 100%;
            padding: 12px;
            border-radius: 5px;
        }
        .btn-login:hover {
            background-color: #1a3d47;
        }
        .alert {
            color: red;
            font-size: 14px;
            text-align: center;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #7c7c7c;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Access Your School Dashboard</h2>
        <form action="authenticate.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
            </div>
            <button type="submit" class="btn-login">Login</button>
        </form>
        <?php if (isset($_GET['error'])): ?>
         <div class="alert alert-danger"><?php echo htmlspecialchars($_GET['error']); ?></div>
        <?php endif; ?>
    </div>



</body>
</html>
