<?php
session_start();

if(isset($_POST['signup'])){

	include_once 'dbh.inc.php';

	$first =  mysqli_real_escape_string($conn , $_POST['first']);
	$last =mysqli_real_escape_string($conn,  $_POST['last']);
	$email =mysqli_real_escape_string($conn,  $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	$pwd1 = mysqli_real_escape_string($conn, $_POST['pwd1']);

	//Error handlers
	//Check for empty fields
	$sql = "SELECT * FROM users WHERE uid = '$uid' ";
				$result = mysqli_query($conn , $sql);

	if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd ) ){

		echo "<script> alert ('Fill All the Plot') </script>";
    	echo "<script>window.open('index.php','_self')</script>";

		//Insert the user into the database
					
	    exit();

	}
	else if(!preg_match("/^[a-zA-Z]*$/" , $first) || !preg_match("/^[a-zA-Z]*$/" , $last) ){

			echo "<script> alert ('Invalid Name') </script>";
    		echo "<script>window.open('index.php','_self')</script>";
			exit();
		}

	else if(!filter_var($email, FILTER_VALIDATE_EMAIL )){

			 echo "<script> alert ('Enter Correct Email') </script>";
    		 echo "<script>window.open('index.php','_self')</script>";
			  exit();
			}

	else if (mysqli_num_rows($result)==1){

					echo "<script> alert ('Username Already taken') </script>";
    				echo "<script>window.open('index.php','_self')</script>";
			        exit();

				}
	else if($pwd != $pwd1){

					echo "<script> alert ('password not matched') </script>";
    				echo "<script>window.open('index.php','_self')</script>";
			        exit();

				}

	else {
			
					$sql = "INSERT INTO users (first,last, email, uid, pwd) VALUES ( '$first', '$last', '$email' ,'$uid' , '$pwd');";
					mysqli_query($conn , $sql);

					echo "<script> alert ('Signup Success Now Log In To The Website') </script>";
    				echo "<script>window.open('signin.php','_self')</script>";
			        exit();
				}

 
}

?>