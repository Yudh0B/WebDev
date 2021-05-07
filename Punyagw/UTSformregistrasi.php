<?php
include "UTSconfig.php";
echo "<br><h1>Registrasi Restoran Baru</h1><font>";
echo "<form method=post action=UTSregistrasi.php><table border=0>";
echo "<tr><td>Manager </td><td>: <Input Type=text name=manager></td></tr>";
echo "<tr><td>Password </td><td>: <Input Type=password name=password></td></tr>";
echo "<tr><td>Nomor Telepon </td><td>: <Input Type=text name=notelp></td></tr>";
echo "<tr><td>Alamat </td><td>: <Input Type=text name=alamat></td></tr>";
echo "<tr><td>Jumlah Pegawai </td><td>: <Input Type=text name=jmlpegawai></td></tr>";
echo "<tr><td><input type=submit value=Buat></td></tr>"; //tombol input
echo"</table></form>";
?>