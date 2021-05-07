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
echo "<br>KRS Semester : $smt Tahun Akademik : $ta";
$sql = "SELECT * FROM krs,matkul WHERE krs.nim='$_SESSION[username]' AND krs.smt='$smt' AND krs.tahunakd='$ta' AND matkul.kodemk=krs.kodemk ";

$hasil=$conn->query($sql);
    if($hasil->num_rows>0){
    echo "<table border=1><tr><th>Kode Mata Kuliah</th><th>Mata Kuliah</th><th>SKS</th></tr>";
	$jmlsks = 0;
	if($hasil==TRUE){
		echo "<br>Berhasil";
    while($data=$hasil->fetch_assoc()){
		echo "<tr><td>".$data['kodemk']."</td><td>".$data['namamk']."</td><td>".$data['sks']."</td></tr>";
		$jmlsks = $jmlsks + $data['sks'];
     }
	}
	else {echo "Gagal";}
    echo "</table>";
	echo "Jumlah SKS Total : $jmlsks || <a href=editkrs.php>Edit KRS</a>";
	}
	elseif($hasil->num_rows==0){
	echo "<br><h2>KRS Kosong, <a href=krs.php>isi form KRS</a></h2>";}
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