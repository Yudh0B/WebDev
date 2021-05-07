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

//$id=$_GET['id'];

echo "<br><br>Tambah matkul baru<br>";
	
	$sql="SELECT * FROM matkul";
	$hasil=$conn->query($sql);
    if($hasil->num_rows>0){
    echo"<form method=POST action=prosestambahkrs.php>";
	echo"<table border=0>";
	echo "<tr><td>Mata Kuliah</td><td>: <select name=mktam>";
	while($data=$hasil->fetch_assoc()){
		echo "<option value=\"".$data['kodemk']."\">".$data['namamk']."(SKS : ".$data['sks'].")(SMT : ".$data['smt'].")";
	}
	echo "</td></tr>";
	//echo"<input type=hidden name=id value=$id>";
    echo "<tr><td> <input type=submit value=tambah></td></tr>";
	//	echo "<tr><td>".$data['nim']."</td><td>".$data['nama']."</td><td>".$data['prodi']."</td><td>".$data['fakultas']."</td><td>".$data['alamat']."</td><td>".$data['tahun']."</td><td>".$data['nohp']."</td></tr>" ;        
     }
    echo "</table>";
	echo "</form>";				
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