<?php


 session_start();

     include 'config.php';

    $conn = new mysqli($server, $username, $password, $dbname);
 
    //echo "$_SESSION[uname] $_SESSION[pass]";

     if(isset($_SESSION['username']) and isset($_SESSION['password'])){

         $sql = "SELECT * FROM user WHERE username='$_SESSION[username]'";

         $hasil=$conn->query($sql);

         if($hasil->num_rows>0){

             while($data=$hasil->fetch_assoc()){

                 if($data['password']==$_SESSION['password']){

                     include 'menu.php';
					 echo "<br/>Akun yang aktif: ".$data['nama'];

                 } else{

                     echo "password salah";
					 include "login.php";

                 }

             }

         }

		else { 

			echo "username tidak ditemukan";

         }
 
    } else {

     //cari uname dalam tabel

     if (isset($_POST['username'])) {

     $username=$_POST['username'];

     $password=$_POST['password'];

     $md5_pass=md5($password);

     $sql = "SELECT * FROM user WHERE username='$username'";

     $hasil=$conn->query($sql);

     if($hasil->num_rows>0){

         while($data=$hasil->fetch_assoc()){

             if($data['password']==$md5_pass){

                 include 'menu.php';
				 

                 echo "login berhasil";

                 $_SESSION['username']=$username;

                 $_SESSION['password']=$md5_pass;
				 
				 echo "<br/>Akun yang aktif: ".$data['nama'];


             } else{

                 echo "password salah";
				 include "login.php";

             }

         }

     }
	  else {
		  echo "username tidak ditemukan";
		  include "login.php";
	  }
     }

     else { 

         echo "<a href='login.php'>silakan login</a>";

     }

 }


 ?>