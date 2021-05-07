<?php
include "index.php";
//echo "$_SESSION[uname] $_SESSION[pass]";
    if(isset($_SESSION['username']) AND isset($_SESSION['password'])){
        $sql = "SELECT * FROM user WHERE username='$_SESSION[username]'";
        $hasil=$conn->query($sql);
        if($hasil->num_rows>0){
            while($data=$hasil->fetch_assoc()){
                if($data['password']==$_SESSION['password']){
//---------------------copy kan program di sini
//membuat form
echo "<h2>Mencari Data Mahasiswa</h2>"; 
echo "<form method=post action=carimhs.php><table border=0>";
echo "<tr><td>Nama </td><td>: <input type=text name=nama> </td></tr>";
echo "<tr><td><input type=submit value=Cari></td></tr>"; //tombol cari
echo "</table></form>";
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