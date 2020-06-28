<?php

session_start();

if(isset($_POST['submit'])){

	include_once 'dbh.inc.php';

	   $uid = mysqli_real_escape_string($conn,$_POST['uid']);
      $pwd = mysqli_real_escape_string($conn,$_POST['pwd']); 
      
      $sql = "SELECT * FROM users WHERE uid = '$uid' and pwd = '$pwd'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      
      // If result matched $myusername and $mypassword, table row must be 1 row

      if(empty($uid) || empty($pwd) ){
         echo "<script> alert ('Fillup All the Fields') </script>";
         echo "<script>window.open('signin.php','_self')</script>";
      exit();
      }
      else{

         if($count == 1) {
            
            $_SESSION['uid']=$uid;

            echo "<script> alert ('Login Success') </script>";
            echo "<script>window.open('dashboard.php','_self')</script>";
            exit();
         }else{
            echo "<script> alert ('Invalid Username and password') </script>";
            echo "<script>window.open('signin.php','_self')</script>";
               exit();
            }

      }
		
      
}

?>