<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$haveaccount = mysqli_query($koneksi, "SELECT * FROM login WHERE username='$username' and email='$email'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($haveaccount);

// cek apakah username dan password di temukan pada database
if ($cek == 0) {

    mysqli_query($koneksi, "insert into login (username, email, password, level) values('$username','$email','$password','user')");
    echo "sukses";
    header('location:index.php');

} else {  
    echo "gagal";
    header('location:register.php');
}
