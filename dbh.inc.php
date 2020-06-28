<?php

 $dbServername = "localhost";
 $dbUsername = "root";
 $dbPassword = "";
 $dbName = "bulksms";

 $conn = mysqli_connect($dbServername ,$dbUsername ,$dbPassword ,$dbName ) or die('cannot connect to database' .mysqli_error());

 ?>