<?php
include "index.php";
include "config.php";
//echo "$_SESSION[uname] $_SESSION[pass]";
    if(isset($_SESSION['username']) AND isset($_SESSION['password'])){
        $sql = "SELECT * FROM user WHERE username='$_SESSION[username]'";
        $hasil=$conn->query($sql);
        if($hasil->num_rows>0){
            while($data=$hasil->fetch_assoc()){
                if($data['password']==$_SESSION['password']){
//---------------------copy kan program di sini
$conn = new mysqli($server,$username,$password,$dbname);

//Mengambil ID yang di GET 
$id=$_GET['id'];

echo "<br>id yang di GET adalah : $id";

//Membuat Query Menampilkan Data
$sql="SELECT * FROM biodata WHERE id=$id";

$hasil=$conn->query($sql);
if($hasil->num_rows>0){
 

echo"<h2>Data Mahasiswa</h2>";
echo"<form method=POST action=prosesedit.php>";
echo"<table border=0>";
while($data=$hasil->fetch_assoc()){
echo "<tr><td>Nama</td><td>:<input type=text name=nama value=\"".$data['nama']."\"></td></tr>";
echo "<tr><td>Angkatan</td><td>:<input type=text name=angkatan value=\"".$data['angkatan']."\"></td></tr>";
echo "<tr><td>NIM</td><td>:<input type=text name=nim value=\"".$data['nim']."\"></td></tr>";
echo "<tr><td>Jurusan</td><td>:<input type=text name=prodi value=\"".$data['prodi']."\"></td></tr>";
echo "<tr><td>Fakultas</td><td>:<input type=text name=fakultas value=\"".$data['fakultas']."\"></td></tr>";
echo "<tr><td>Alamat</td><td>:<input type=text name=alamat value=\"".$data['alamat']."\"></td></tr>";
echo "<tr><td>Nomor Telepon</td><td>:<input type=text name=notelp value=\"".$data['notelp']."\"></td></tr>";
echo "<input type=hidden name=id value=$id>";
echo "<tr><td> <input type=submit value=edit> </td></tr>";

// echo "<tr><td>".$data['nama']."</td><td>".$data['nim']."</td><td>".$data['angkatan']."</td><td>".$data['prodi']."</td><td>".$data['fakultas']."</td><td>".$data['alamat']."</td><td>".$data['notelp']."</td></tr>";   

}
// echo"</table>";
}
//Query Execute
//$hasil=$conn->query($sql);
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
