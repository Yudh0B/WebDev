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
echo "<br><h1>Registrasi Admin</h1><font>";
echo "<form method=post action=registrasi.php><table border=0>";
echo "<tr><td>Nama </td><td>: <Input Type=text name=nama></td></tr>";
echo "<tr><td>Username </td><td>: <Input Type=text name=username></td></tr>";
echo "<tr><td>Password </td><td>: <Input Type=password name=password></td></tr>";
echo "<tr><td><input type=submit value=Buat><input type=reset value=Batal></td></tr>"; //tombol input
echo"</table></form>";
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