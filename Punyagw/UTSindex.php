<?php


 session_start();

     include 'UTSconfig.php';

    $conn = new mysqli($server, $username, $password, $dbname);
 
    //echo "$_SESSION[uname] $_SESSION[pass]";

     if(isset($_SESSION['manager']) and isset($_SESSION['password'])){

         $sql = "SELECT * FROM restoran WHERE manager='$_SESSION[manager]'";

         $hasil=$conn->query($sql);

         if($hasil->num_rows>0){

             while($data=$hasil->fetch_assoc()){

                 if($data['password']==$_SESSION['password']){

					 include "UTSmenu.php";
					 echo "<br/>Akun yang aktif: ".$data['manager'];

                 } else{

                     echo "password salah";
					 include "UTSlogin.php";

                 }

             }

         }

		else { 

			echo "username tidak ditemukan";

         }
 
    } else {

     //cari uname dalam tabel

     if (isset($_POST['manager'])) {

     $manager=$_POST['manager'];

     $password=$_POST['password'];

     $md5_pass=md5($password);

     $sql = "SELECT * FROM restoran WHERE manager='$manager'";

     $hasil=$conn->query($sql);

     if($hasil->num_rows>0){

         while($data=$hasil->fetch_assoc()){

             if($data['password']==$md5_pass){

                 include 'UTSmenu.php';
				 

                 echo "login berhasil";

                 $_SESSION['username']=$username;

                 $_SESSION['password']=$md5_pass;
				 
				 echo "<br/>Akun yang aktif: ".$data['manager'];


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