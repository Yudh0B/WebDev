<?php
//proses1.php
//menerima posting dari formulir yang ada di program 1
$uname = $_POST['username']; //variabel uname menerima posting dari form username
$psw = $_POST['password']; 

//menampilkan apa yang diposting
echo "Username : $uname<br>";
echo "Password : $psw<br>";

?>
