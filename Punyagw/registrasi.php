<?php
//menerima input dari form
$nama = $_POST['nama'];
$username1 = $_POST['username'];
$password1 = $_POST['password'];
$md5_pass=md5($password1);


echo "$nama / $username1 / $password1";

//memasukan data ke dalam tabel 
//variabel server
include "config.php";

//1. koneksi ke database server
$conn = new mysqli($server,$username,$password,$dbname); 

//2. mengecek koneksi
if($conn) echo "<br>Koneksi berhasil<br>";
else echo "<br>Koneksi gagal<br>";

//3. membuat query
$sql = "INSERT INTO user (nama, username, password) values ('$nama','$username1','$md5_pass')";

//4. menjalankan query
$hasil=mysqli_query($conn,$sql);

//5.mengecek apakah query berhasil
if($hasil===TRUE) echo "<br><h2>Insert berhasil</h2>";
else echo "<br><h2>Username atau Nama sudah ada</h2>";

echo "<input type=button value=LOGIN onclick=window.location.href='login.php'>"; 

?>