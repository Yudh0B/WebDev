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
$mktam=$_POST['mktam'];
$sql1 = "INSERT INTO krs (kodemk, nim, smt, tahunakd) values ('$mktam','$_SESSION[username]', '$smt', '$ta')";
$sqlc = "SELECT * FROM krs WHERE kodemk='$mktam' AND nim='$_SESSION[username]' AND smt='$smt' AND tahunakd='$ta' ";
$cek=$conn->query($sqlc);
if($cek->num_rows==0){
	$result=mysqli_query($conn,$sql1);
	if($result===TRUE) echo "<br><h2>Insert MK baru berhasil<br>";
	else echo "<br><h2>Insert gagal</h2>"; 
	}
	else echo "<br><h2>Matkul yang dipilih sudah ada</h2>";
//5.mengecek apakah query berhasil

header( "refresh:1;url=editkrs.php" );
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