<?php
$insert= false;
if (isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "patient_db";

    $con = mysqli_connect($server, $username, $password, $database);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $date = $_POST['date'];

    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO `patient` (`name`, `E-mail`, `password`, `address`, `date`) VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $password, $address, $date);
    
    if (mysqli_stmt_execute($stmt)) {
        $insert = true;
    } else {
        echo "Unsuccessful: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Patient Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                        <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="logo" width="100">
                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">Patient Registration</h1>
                            <form method="POST" class="needs-validation" novalidate="" autocomplete="off">
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="name">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                                    <div class="invalid-feedback">
                                        Name is required    
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="" required>
                                    <div class="invalid-feedback">
                                        Email is invalid
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="password">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="address">Address</label>
                                    <input id="address" type="text" class="form-control" name="address" required>
                                    <div class="invalid-feedback">
                                        Address is required
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="DOB">Date of Birth</label>
                                    <input id="DOB" type="date" class="form-control" name="DOB" value="" required>
                                    <div class="invalid-feedback">
                                        DOB is invalid
                                    </div>
                                </div>

                                <p class="form-text text-muted mb-3">
                                    By registering you agree with our terms and condition.
                                </p>

                                <div class="align-items-center d-flex">
                                    <button type="submit" class="btn btn-primary ms-auto">
                                        Register    
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer py-3 border-0">
                            <div class="text-center">
                                Already have an account? <a href="index.html" class="text-dark">Login</a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5 text-muted">
                        Copyright &copy; 2017-2021 &mdash; Your Company 
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/login.js"></script>
</body>
</html>
