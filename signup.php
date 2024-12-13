<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link href="assets/styles2.css" rel="stylesheet">
</head>
<body>
    <div class="pt-5" style="margin-top: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="card card-body">
                        <center>
                            <h4 style="font-family: Noto Sans;"><b>Register to QUIZ</b></h4>
                        </center>
                        <form id="submitForm" action="register.php" method="post">
                            <br/>
                            <div class="form-group required">
                                <label for="username">Username</label>
                                <input type="text" class="form-control text-lowercase" id="username" required name="username" value="">
                            </div>
                            <div class="form-group required">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" required name="email" value="">
                            </div>
                            <div class="form-group required">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" required name="password" value="">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </form>
                        <p class="small text-center">Already have an account? <a href="index.php">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
