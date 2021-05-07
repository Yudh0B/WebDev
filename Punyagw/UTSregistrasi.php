<?php
//menerima input dari form
$manager = $_POST['manager'];
$password = $_POST['password'];
$notelp = $_POST['notelp'];
$alamat = $_POST['alamat'];
$jmlpegawai = $_POST['jmlpegawai'];
$md5_pass=md5($password);


echo "$manager / $notelp / $alamat / $jmlpegawai";

//memasukan data ke dalam tabel 
//variabel server
include "UTSconfig.php";

//1. koneksi ke database server
$conn = new mysqli($server,$username,$password,$dbname); 

//2. mengecek koneksi
if($conn) echo "<br>Koneksi berhasil<br>";
else echo "<br>Koneksi gagal<br>";

//3. membuat query
$sql = "INSERT INTO restoran (manager, notelp, alamat, jmlpegawai, password) values ('$manager','$notelp','$alamat','$jmlpegawai','$md5_pass')";

//4. menjalankan query
$hasil=mysqli_query($conn,$sql);

//5.mengecek apakah query berhasil
if($hasil===TRUE) echo "<br><h2>Insert berhasil</h2>";
else echo "<br><h2>Registrasi Gagal</h2>";

echo "<input type=button value=LOGIN onclick=window.location.href='UTSlogin.php'>"; 

?>