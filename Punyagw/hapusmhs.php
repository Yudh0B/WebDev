<?php
include "index.php";
include "config.php";
//echo "$_SESSION[uname] $_SESSION[pass]";
    if(isset($_SESSION['username']) AND isset($_SESSION['password'])){
        $sql = "SELECT * FROM user WHERE username='$_SESSION[username]'";
        $hasil=$conn->query($sql);
        if($hasil->num_rows>0){
            while($data=$hasil->fetch_assoc()){
                if($data['password']==$_SESSION['password']){
//---------------------copy kan program di sini
$conn = new mysqli($server,$username,$password,$dbname);

//Mengambil ID yang di GET 
$id=$_GET['id'];

echo "id yang di GET adalah : $id <br>";

//Membuat Query Hapus
$sql="DELETE FROM biodata WHERE id=$id";

//Query Execute
$hasil=$conn->query($sql);

//mysqli_($conn, $sql);
if($conn->query($sql)===TRUE)echo "hapus berhasil";
else echo "hapus gagal";
//--------------------sampai sini

                } else{
                    echo "password salah";
                }
            }
        }
        else { 
            echo "username tidak ditemukan";
        }
    }


?>