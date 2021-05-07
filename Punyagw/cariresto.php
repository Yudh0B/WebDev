<?php
include "UTSconfig.php";
$conn = new mysqli($server,$username,$password,$dbname);

//menerima posting dari formmhs.php
$manager=$_POST['manager'];


$sql="SELECT * FROM restoran WHERE manager LIKE '%$manager%'";


$hasil=$conn->query($sql);
if($hasil->num_rows>0){

echo "<h2>Tabel Restoran Yang Dicari</h2>";
echo "<table border=1><tr><th>ID</th><th>Nomor Telepon</th><th>Manager</th><th>Alamat</th><th>Jumlah Pegawai</th><th>Proses</th></tr>";

//$data untuk menampung hasil
//hasil fetch_assoc() itu utk meminta array ditaroh di data
//while -> perulangan, utk ngecek masih ada tabel yg bisa ditambahin, ya ditambahin sm querynya
while($data=$hasil->fetch_assoc()){
 echo "<tr><td>".$data['idcabang']."</td><td>".$data['notelp']."</td><td>".$data['manager']."</td><td>".$data['alamat']."</td><td>".$data['jmlpegawai']."</td><td><a href=editresto.php?id=".$data['idcabang'].">Edit</a> / <a href=hapusresto.php?id=".$data['idcabang'].">Hapus</a></td></tr>";   
     }
}
echo "</table>";
?>