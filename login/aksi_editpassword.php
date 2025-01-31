<?php
@session_start();

include "../lib/koneksi.php";


if (empty($_SESSION['id_pelanggan'])) {
    echo "<script>alert ('Maaf, Hak akses tidak ditemukan, silahkan LOGIN terlebih dahulu.'); window.location='index.php';</script>";
} else {
	$password_customer = $_POST['password_customer'];
	$password_baru_customer = $_POST['password_baru_customer'];
	$konfirmasi_password = $_POST['konfirmasi_password'];
	$id_pelanggan = $_SESSION['id_pelanggan'];
	$kueriPass = mysqli_query($con, "SELECT * FROM pelanggan2 WHERE id_pelanggan = '$id_pelanggan'");
	$kpass = mysqli_fetch_array($kueriPass);
	$pass = $kpass['password_customer'];

	if ($password_customer == $pass) {
		if ($password_baru_customer == $konfirmasi_password) {
			$queryEdit = mysqli_query($con, "UPDATE pelanggan2 set password_customer = '$password_baru_customer' WHERE id_pelanggan = '$id_pelanggan'");
			if ($queryEdit) {
				echo "<script>alert ('Password Admin telah diubah.'); window.location='../dashboard.php?module=profile';</script>";
			} else {
				echo "<script>alert ('Password Admin gagal diubah, silahkan ulangi dan pastikan inputan sesuai.'); window.location='../dashboard.php?module=ganti_password';</script>";
			}
		} else {
			echo "<script>alert ('Maaf, konfirmasi inputan password baru tidak sama. Silahkan ulangi dan pastikan sesuai.'); window.location='../dashboard.php?module=ganti_password';</script>";
		}
	} else {
		echo "<script>alert ('Maaf, validasi password lama gagal. Silahkan ulangi dan pastikan sesuai $id_pelanggan,$password_customer, $password_baru_customer, $konfirmasi_password.'); window.location='../dashboard.php?module=profile';</script>";
	}
}