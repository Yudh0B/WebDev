<?php
    session_start();
    include "config.php";
    $conn = new mysqli($server,$username,$password,$dbname);

    //echo "$_SESSION[uname] $_SESSION[pass]";
    if(isset($_SESSION['username']) AND isset($_SESSION['password'])){
        $sql = "SELECT * FROM user WHERE username='$_SESSION[username]'";
        $hasil=$conn->query($sql);
        if($hasil->num_rows>0){
            while($data=$hasil->fetch_assoc()){
                if($data['password']==$_SESSION['password']){
//---------------------copy kan program di sini

	include "menu.php";
	
	$nama=$_POST['nama'];
	$prodi=$_POST['prodi'];
	$fakultas=$_POST['fakultas'];
	$NIM=$_POST['NIM'];
	$angkatan=$_POST['angkatan'];
	$notelp=$_POST['notelp'];
	$alamat=$_POST['alamat'];
	
	//1. membuat koneksi
	

    //2. membuat query untuk menampilkan
    $sql="SELECT * FROM data_mahasiswa"; //menampilkan data dalam tabel biodata
	//3.menjalankan query untuk manmpilkan
    $hasil=$conn->query($sql);
    if($hasil->num_rows>0){
 
    //4. menampilkan data tiap baris
    echo "<table border=1><tr><th>Nama</th><th>Fakultas</th><th>Prodi</th><th>NIM</th><th>angkatan</th><th>Nomor Telepon</th><th>Alamat</th></tr>";
    while($data=$hasil->fetch_assoc()){
		echo "<tr><td>".$data['Nama']."</td><td>".$data['Fakultas']."</td><td>".$data['Prodi']."</td><td>".$data['NIM']."</td><td>".$data['Angkatan']."</td><td>".$data['No_telepon']."</td><td>".$data['Alamat']."</td></tr>" ;        
     }
    echo "</table>";
}

                } else{
                    echo "password salah";
                }
            }
        }
        else { 
            echo "username tidak ditemukan";
        }
    } else include 'login.php';
    
?>