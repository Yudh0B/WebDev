
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
echo"<h2>Edit Akun Mahasiswa</h2>";
echo "<form method=post action=gantipass.php><table border=0>";
// echo "<tr><td>Username Lama</td><td>: <input type=text name=unamelama> </td></tr>";
// echo "<tr><td>Username Baru</td><td>: <input type=text name=unamebaru> </td></tr>";
echo "<tr><td>Password Lama</td><td>: <input type=password name=passwordlama> </td></tr>";
echo "<tr><td>Password Baru</td><td>: <input type=password name=passwordbaru> </td></tr>";
echo "<tr><td>Konfirmasi Password</td><td>: <input type=password name=konfirmpassword> </td></tr>";
echo "<tr><td>Level</td><td>: <input type=text name=level> </td></tr>";
echo "<tr><td><input type=submit value=Input></td></tr>"; //tombol input

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