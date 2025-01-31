<?php
@session_start();

include "../../lib/koneksi.php";


if (empty($_SESSION['ID_ADMIN'])) {
    echo "<script>alert ('Maaf, Hak akses tidak ditemukan, silahkan LOGIN terlebih dahulu.'); window.location='index.php';</script>";
} else {
	$password_admin = $_POST['password_admin'];
	$password_baru_admin = $_POST['password_baru_admin'];
	$konfirmasi_password = $_POST['konfirmasi_password'];
	$ID_ADMIN = $_SESSION['ID_ADMIN'];
	$kueriPass = mysqli_query($con, "SELECT * FROM administrator WHERE ID_ADMIN= '$ID_ADMIN'");
	$kpass = mysqli_fetch_array($kueriPass);
	$pass = $kpass['password_admin'];

	if ($password_admin == $pass) {
		if ($password_baru_admin == $konfirmasi_password) {
			$queryEdit = mysqli_query($con, "UPDATE administrator set password_admin = '$password_baru_admin' WHERE ID_ADMIN = '$ID_ADMIN'");
			if ($queryEdit) {
				echo "<script>alert ('Password Admin telah diubah. $ID_ADMIN,$password_admin, $password_baru_admin, $konfirmasi_password'); window.location='../dashboard.php?module=profile';</script>";
			} else {
				echo "<script>alert ('Password Admin gagal diubah, silahkan ulangi dan pastikan inputan sesuai. $ID_ADMIN,$password_admin, $password_baru_admin, $konfirmasi_password'); window.location='../dashboard.php?module=ganti_password';</script>";
			}
		} else {
			echo "<script>alert ('Maaf, konfirmasi inputan password baru tidak sama. Silahkan ulangi dan pastikan sesuai. $ID_ADMIN,$password_admin, $password_baru_admin, $konfirmasi_password'); window.location='../dashboard.php?module=ganti_password';</script>";
		}
	} else {
		echo "<script>alert ('Maaf, validasi password lama gagal. Silahkan ulangi dan pastikan sesuai $ID_ADMIN,$password_admin, $password_baru_admin, $konfirmasi_password.'); window.location='../dashboard.php?module=profile';</script>";
	}
}