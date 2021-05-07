<?php
//membuat komentar satu baris
/*
komentar
beberapa
baris
*/

//mencetak tulisan
echo"tulisan teksnya";
/* di dalam echo bisa memasukan kode html */

echo"<br>Tulisan teks yang ke 2....";
echo"<h1><font color=Blue><font size = 30>Tulisan Teks Ke 3....</h1></font></font>";
echo"<h2><font color=478B98><font size = 70>Tulisan Teks Ke 4....</h2></font></font>";
echo"<h6><font color=Black><font size = 12>Ini heading ke 6......</h6></font></font>";	


?>
<br><u><i> "tulisan di luar php" <br></u></i>

<?php
//membuat formulir
echo "<form method=post action=proses1.php>";
echo "Username : <Input Type=text name=username><br>";
echo "password : <Input Type=password name=password><br>";
echo "<Input Type=submit value=Login>";
echo"</form>"

?>