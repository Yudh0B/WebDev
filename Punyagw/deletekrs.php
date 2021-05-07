<?php
    include "config.php";
	include "index.php";
    $conn = new mysqli($server,$username,$password,$dbname);

    //echo "$_SESSION[uname] $_SESSION[pass]";
    if(isset($_SESSION['username']) AND isset($_SESSION['password'])){
        $sql = "SELECT * FROM user WHERE username='$_SESSION[username]'";
        $hasil=$conn->query($sql);
        if($hasil->num_rows>0){
            while($data=$hasil->fetch_assoc()){
                if($data['password']==$_SESSION['password']){
//---------------------copy kan program di sini
//Menerima Input Mata Kuliah

//$mk1baru=$_POST['mk1baru'];
//$mk2baru=$_POST['mk2baru'];
$id=$_GET['id'];
echo "<br>$id,$_SESSION[username],$smt,$ta";

//$sql = "SELECT * FROM krs, matakuliah WHERE krs.nim='$_SESSION[username]' AND krs.smt='$smt' AND krs.ta='$ta' AND matakuliah.kodemk=krs.kodemk";

$sql1="DELETE from krs WHERE id='$id'";
//$sql1="UPDATE krs SET kodemk='$mk1baru' WHERE id=''";
$result=mysqli_query($conn,$sql1);

//5.mengecek apakah query berhasil
if($result===TRUE) echo "<br><h2>Hapus Mata Kuliah berhasil<br>";
else echo "<br><h2>Hapus Mata Kuliah gagal</h2>"; 

//--------------------sampai sini

		}
		 else{
                    echo "password salah";
                }
            }
        }
        else { 
            echo "username tidak ditemukan";
        }
    }
    
?>