<?php
include "index.php";
//echo "$_SESSION[uname] $_SESSION[pass]";
    if(isset($_SESSION['username']) AND isset($_SESSION['password'])){
        $sql = "SELECT * FROM user WHERE username='$_SESSION[username]'";
        $hasil=$conn->query($sql);
        if($hasil->num_rows>0){
            while($data=$hasil->fetch_assoc()){
                if($data['password']==$_SESSION['password']){
//---------------------copy kan program di sini
include "menu.php";
$name = $_POST['nama'];
$addr = $_POST['alamat'];
$no_hp = $_POST['nohp'];
$Jurusan = $_POST['jurusan'];
$Fakultas = $_POST['fakultas'];

echo"<br>Nama : $name</br>";
echo"<br>Alamat : $alamat</br>";
echo"<br>No. Hp : $notelp</br>";
echo"<br>Jurusan : $jurusan</br>";
echo"<br>Fakultas : $fakultas</br>";
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