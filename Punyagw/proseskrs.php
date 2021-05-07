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
$mk1=$_POST['mk1'];
$mk2=$_POST['mk2'];
echo "<br>$mk1,$mk2,$_SESSION[username],$smt,$ta";
$sql1 = "INSERT INTO krs (kodemk, nim, smt, tahunakd) values ('$mk1','$_SESSION[username]', '$smt', '$ta')";
$result=mysqli_query($conn,$sql1);

//5.mengecek apakah query berhasil
if($result===TRUE) echo "<br><h2>Insert MK1 berhasil<br>";
else echo "<br><h2>Insert gagal</h2>"; 

$sql2 = "INSERT INTO krs (kodemk, nim, smt, tahunakd) values ('$mk2','$_SESSION[username]', '$smt', '$ta')";
$result=mysqli_query($conn,$sql2);

if($result===TRUE) echo "<br><h2>Insert MK2 berhasil<br>";
else echo "<br><h2>Insert gagal</h2>"; 

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