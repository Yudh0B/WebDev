<?php 

include "menu.php";
include "index.php";
//echo "$_SESSION[uname] $_SESSION[pass]";
    if(isset($_SESSION['username']) AND isset($_SESSION['password'])){
        $sql = "SELECT * FROM user WHERE username='$_SESSION[username]'";
        $hasil=$conn->query($sql);
        if($hasil->num_rows>0){
            while($data=$hasil->fetch_assoc()){
                if($data['password']==$_SESSION['password']){
//---------------------copy kan program di sini

$nama=$_POST['nama'];
$nim=$_POST['nim'];
$angkatan=$_POST['angkatan'];
$prodi=$_POST['prodi'];
$fakultas=$_POST['fakultas'];
$alamat=$_POST['alamat'];
$notelp=$_POST['notelp'];

echo "$nama / $nim / $angkatan / $prodi / $fakultas / $alamat / $notelp";

$server='localhost';
$dbname='mahasiswa';
$username='root';
$password='';

//1. koneksi ke database server
$conn = new mysqli($server, $username, $password, $dbname);

//2. mengecek koneksi
if($conn)echo "<br>Koneksi Berhasil</br>";
else echo "<br> Koneksi Gagal</br>";

//3. membuat query
$sql="INSERT INTO biodata(nama,nim, angkatan, prodi, fakultas, alamat, notelp) values ('$nama', '$nim', '$angkatan', '$prodi', '$fakultas', '$alamat', '$notelp')";

//4. mysqli_($conn, $sql);
if($conn->query($sql)===TRUE)echo "insert berhasil";
else echo "insert gagal";

 
//5. membuat query untuk menampilkan
 $sql="SELECT * FROM biodata"; //menampilkan data dalam tabel biodata

//6.menjalankan query untuk manmpilkan
    $hasil=$conn->query($sql);
    if($hasil->num_rows>0){
 
//7. menampilkan data tiap baris
    echo "<table border=1><tr><th>Nama</th><th>NIM</th><th>Angkatan</th><th>Prodi</th><th>Fakultas</th><th>Alamat</th><th>No.Telp</th></tr>";
    while($data=$hasil->fetch_assoc()){
  echo "<tr><td>".$data['nama']."</td><td>".$data['nim']."</td><td>".$data['angkatan']."</td><td>".$data['prodi']."</td><td>".$data['fakultas']."</td><td>".$data['alamat']."</td><td>".$data['notelp']."</td></tr>";        
     }
    echo "</table>";
	}
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