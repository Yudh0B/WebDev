<?php

include "index.php";

echo"<h2>Input Data Mahasiswa</h2>";
echo"<tr><td><form method=post action=inputmhs.php><table border=0><t/r></td>";
echo"<tr><td>Nama : <input type=text name=nama><br><t/r></td>";
echo"<tr><td>Jurusan : <input type=text name=prodi><br><t/r></td>";
echo"<tr><td>Fakultas : <input type=text name=fakultas><br><t/r></td>";
echo"<tr><td>NIM : <input type=text name=NIM><br><t/r></td>";
echo"<tr><td>Angkatan : <input type=text name=angkatan><br><t/r></td>";
echo"<tr><td>Nomor Telepon : <input type=text name=notelp><br><t/r></td>";
echo"<tr><td>Alamat : <input type=text name=alamat><br>";
echo"<input type=submit value=Submit>";

echo"</table></form>";

?>