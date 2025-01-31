<?php
include "../lib/koneksi.php";

if (isset($_POST["customer"])) {
    $username_customer = $_POST['username_customer'];
    $password_customer = $_POST['password_customer'];

    // Validasi input harus alfanumerik
    if (!ctype_alnum($username_customer) || !ctype_alnum($password_customer)) {
        echo '<div class="login_wrapper">
        <div class="alert alert-danger" role="alert">';
        echo "Username atau password hanya boleh berisi karakter alfanumerik.";
        echo '</div></div>';
        exit;
    }

    // Gunakan prepared statement untuk keamanan
    $stmt = $con->prepare("SELECT * FROM pelanggan2 WHERE username_customer = ? AND password_customer = ?");
    $stmt->bind_param("ss", $username_customer, $password_customer);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Login berhasil
        $r = $result->fetch_assoc();
        session_start();
        $_SESSION['id_pelanggan'] = $r['id_pelanggan'];
        $_SESSION['username_customer'] = $r['username_customer'];
        $_SESSION['password_customer'] = $r['password_customer'];
		$_SESSION['nama_pelanggan'] = $r['nama_pelanggan'];
        $id_pelanggan = $_SESSION['id_pelanggan'];
        header("location:../index.php?id_pelanggan=$id_pelanggan");
    } else {
        // Login gagal
        echo '<div class="login_wrapper">
        <div class="alert alert-danger" role="alert">';
        echo "Akun atau Username Anda salah!";
        echo '</div></div>';
    }

    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<link rel="shortcut icon" href="../upload/app.png">
	<title>Login Pelanggan</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="../upload/app.png" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Login Pelanggan</h1>
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">Username</label>
									<input class="form-control" name="username_customer" value="" required autofocus>
									<div class="invalid-feedback">
										Username is invalid
									</div>
								</div>

								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password_customer">Password</label>
										<!-- <a href="forgot.html" class="float-end">
											Forgot Password?
										</a> -->
									</div>
									<input id="password" type="password" class="form-control" name="password_customer" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<div class="d-flex align-items-center">
									<!-- <div class="form-check">
										<input type="checkbox" name="remember" id="remember" class="form-check-input">
										<label for="remember" class="form-check-label">Remember Me</label>
									</div> -->
									<button type="submit" class="btn btn-primary ms-auto" name="customer"> 
										Login
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Don't have an account? <a href="register.php" class="text-dark">Create One</a>
							</div>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						Copyright &copy; 2024-2025 &mdash; Walk Avenue 
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/login.js"></script>
</body>
</html>
