<?php
session_start();

unset($_SESSION['SESS_MEMBER_ID']);

require "connection.php";

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    $str = "SELECT * FROM user WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $str);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) != 1) {
        echo "<center><h3><script>alert('Invalid Username or Password')</script></h3></center>";
        header("refresh:0;url=index.php");
        exit();
    } else {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['SESS_MEMBER_ID'] = $row['uid'];

        header('Location: home.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="assets/styles.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <center>
            <h2>Online Quiz System</h2>
        </center>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <h4 style="font-family: 'Noto Sans';"><b>Login to Quiz</b></h4>
                        </center>
                        <form method="post" action="">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control text-lowercase" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="register.php">Don't have an account? Register here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
