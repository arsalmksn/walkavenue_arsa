<?php

include "../../lib/koneksi.php";
if (isset($_POST["register"])){ 
	$query = "SELECT MAX(ID_ADMIN) AS max_id FROM Administrator";
	$result = $con->query($query);

	// Inisialisasi nilai default jika tabel kosong
	$n = 1;

	if ($result) {
		$row = $result->fetch_assoc();
		// Jika ada nilai max_id, tambahkan 1
		if ($row['max_id'] !== null) {
			$n = $row['max_id'] + 1;
		}
	} else {
		echo "Error: " . $con->error;
	}
	$username_admin = $_POST['username_admin'];
    $password_admin = $_POST['password_admin'];
	$level_user = $_POST['level_user'];
	if (ctype_alnum($username_admin) && ctype_alnum($level_user)){
		// Gunakan prepared statement untuk mencegah SQL Injection
		mysqli_query($con, "INSERT INTO Administrator (ID_ADMIN, username_admin,password_admin,level_user) VALUES ('$n', '$username_admin','$password_admin','$level_user')");
		
		// echo "$n,$username_admin,$password_admin,$level_user";
		echo "<script>window.location = 'index.php';	</script>";
	} else {
		echo "Username atau password hanya boleh berisi karakter alfanumerik.";
	}
	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>Register</title>
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
							<h1 class="fs-4 card-title fw-bold mb-4">Register</h1>
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3">
                                <label class="mb-2 text-muted" for="email">Username</label>
									<input class="form-control" name="username_admin" value="" required>
									<div class="invalid-feedback">
										Email is invalid									
								</div>

								<div class="mb-3">
                                <label class="mb-2 text-muted" for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password_admin" required>
								    <div class="invalid-feedback">
								    	Password is required
									</div>
								</div>

								

								<div class="mb-3">
                                <label class="mb-2 text-muted" for="level_user">Level</label>
									<input id="level_user" type="text" class="form-control" name="level_user" value="" required>
									<div class="invalid-feedback">
										No Telp
							    	</div>
								</div>

								<p class="form-text text-muted mb-3">
									By registering you agree with our terms and condition.
								</p>

								<div class="align-items-center d-flex">
								<button type="submit" class="btn btn-primary ms-auto" name="register"> 
										Register	
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Already have an account? <a href="index.php" class="text-dark">Login</a>
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
