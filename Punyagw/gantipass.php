
<?php
include "config.php";
include "index.php";
// $unamelama=$_POST['unamelama'];
// $unamebaru=$_POST['unamebaru'];
$passwordlama=$_POST['passwordlama'];
$passwordbaru=$_POST['passwordbaru'];
$konfirmasi=$_POST['konfirmpassword'];
$level=$_POST['level'];

//koneksi ke database server
$conn = new mysqli($server, $username, $password, $dbname);

//Enkripsi passwordlama menggunakan md5
$passwordlama=md5($passwordlama);

//Mengambil data password dari database dimana nilai password=passwordlama
$hasil = $conn->query("SELECT password FROM user WHERE password='$passwordlama'");

//Jika query tidak menemukan, maka jumlah row=0
//Jika query ditemukan, maka jumlah row>0
	if($hasil->num_rows>0){
		//kondisi ini jika pass lama yg dimasukkan sama dengan yang ada di database
		//Membuat kondisi jika password baru harus sama dengan konfirmasi password
		if($konfirmasi==$passwordbaru){
			$passwordbaru=md5($passwordbaru);
			$username=$_SESSION['username'];
			$update=$conn->query("UPDATE user SET password='$passwordbaru' WHERE username='$username'");
			if($update){
				//kondisi jika update berhasil
				echo"Password berhasil diubah";
		
			}else{
				//kodisi jika update gagal
				echo"Password gagal diubah";
			}
		}else{
			//kondisi jika konfirmasi password salah
			echo"Konfirmasi Password Tidak Cocok";
		}
		
	}else{
		//kondisi jika password lama salah
		echo"Password lama tidak cocok";
	}
	
	session_destroy();
	echo"<h2>Berhasil</h2>";
	echo"<a href=login.php>Kembali ke Login</a>";
?>