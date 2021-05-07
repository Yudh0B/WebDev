<?php
include "UTSconfig.php";
$conn = new mysqli($server,$username,$password,$dbname);

//Mengambil ID yang di GET 
$idcabang=$_POST['idcabang'];

echo "id yang di GET adalah : $idcabang <br>";

//Membuat Query Hapus
$sql="DELETE FROM restoran WHERE idcabang=$idcabang";

//Query Execute
$hasil=$conn->query($sql);

//mysqli_($conn, $sql);
if($conn->query($sql)===TRUE)echo "hapus berhasil";
else echo "hapus gagal";
?>