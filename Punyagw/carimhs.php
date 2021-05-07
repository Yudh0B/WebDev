<?php

include "config.php";
include "index.php";
//echo "$_SESSION[uname] $_SESSION[pass]";
    if(isset($_SESSION['username']) AND isset($_SESSION['password'])){
        $sql = "SELECT * FROM user WHERE username='$_SESSION[username]'";
        $hasil=$conn->query($sql);
        if($hasil->num_rows>0){
            while($data=$hasil->fetch_assoc()){
                if($data['password']==$_SESSION['password']){
//---------------------copy kan program di sini
$conn = new mysqli($server,$username,$password,$dbname);

//menerima posting dari formmhs.php
$nama=$_POST['nama'];



$sql="SELECT * FROM biodata WHERE nama LIKE '%$nama%'";


$hasil=$conn->query($sql);
if($hasil->num_rows>0){

echo "<h2>Tabel Mahasiswa Yang Dicari</h2>";
echo "<table border=1><tr><th>Nama</th><th>NIM</th><th>Prodi</th><th>Fakultas</th><th>Angkatan</th><th>Alamat</th><th>No Telepon</th><th>Proses</th></tr>";

//$data untuk menampung hasil
//hasil fetch_assoc() itu utk meminta array ditaroh di data
//while -> perulangan, utk ngecek masih ada tabel yg bisa ditambahin, ya ditambahin sm querynya
while($data=$hasil->fetch_assoc()){
 echo "<tr><td>".$data['nama']."</td><td>".$data['nim']."</td><td>".$data['angkatan']."</td><td>".$data['prodi']."</td><td>".$data['fakultas']."</td><td>".$data['alamat']."</td><td>".$data['notelp']."</td><td><a href=editmhs.php?id=".$data['id'].">Edit</a> / <a href=hapusmhs.php?id=".$data['id'].">Hapus</a></td></tr>";   
     }
}
echo "</table>";
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