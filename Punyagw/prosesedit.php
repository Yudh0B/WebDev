<?php 
include "index.php";
include "config.php";
//echo "$_SESSION[uname] $_SESSION[pass]";
    if(isset($_SESSION['username']) AND isset($_SESSION['password'])){
        $sql = "SELECT * FROM user WHERE username='$_SESSION[username]'";
        $cek=$conn->query($sql);
        if($cek->num_rows>0){
            while($data=$cek->fetch_assoc()){
                if($data['password']==$_SESSION['password']){
//---------------------copy kan program di sini

$nama=$_POST['nama'];
$angkatan=$_POST['angkatan'];
$nim=$_POST['nim'];
$id=$_POST['id'];
$prodi=$_POST['prodi'];
$fakultas=$_POST['fakultas'];
$notelp=$_POST['notelp'];
$alamat=$_POST['alamat'];


echo "$nama / $id / $angkatan / $prodi / $nim / $fakultas / $alamat / $notelp";

/*$server='localhost';
$dbname='biodata';
$username='root';
$password='';*/

//1. koneksi ke database server
$conn = new mysqli($server, $username, $password, $dbname);

//2. mengecek koneksi
if($conn)echo "<br><h2>Koneksi Berhasil</h2></br>";
else echo "<br> Koneksi Gagal</br>";

//3. membuat query
$sql="UPDATE biodata SET nama='$nama', angkatan='$angkatan', nim='$nim', prodi='$prodi', fakultas='$fakultas', alamat='$alamat', notelp='$notelp' WHERE id='$id'";

//4. menjalankan query
$hasil=mysqli_query($conn,$sql);

//5.mengecek apakah query berhasil
if($hasil===TRUE) echo "<br><h2>Insert berhasil</h2>";
else echo "<br><h2>Insert gagal</h2>";

/*//6.menjalankan query untuk menampilkan
$hasil=$conn->query($sql);
if($hasil->num_rows>0);
 
7. menampilkan data tiap baris
echo"<h2>Tabel Mahasiswa</h2>";
echo "<table border=1><tr><th>Nama</th><th>NIM</th><th>Angkatan</th><th>Jurusan</th><th>Fakultas</th><th>No.Telp</th><th>Alamat</th></tr>";
while($data=$hasil->fetch_assoc()){
echo "<tr><td>".$data['nama']."</td><td>".$data['nim']."</td><td>".$data['angkatan']."</td><td>".$data['jurusan']."</td><td>".$data['fakultas']."</td><td>".$data['notelp']."</td><td>".$data['alamat']."</td></tr>";        
	}
}
echo "</table>";*/
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