<?php

define('USER', 'splend_it_no');
define('PWD', 'E3S3Bdwg');
define('DB', 'splend_it_no');

$connect = @mysqli_connect("localhost", USER, PWD, DB)
or die("Could not connect to database : " . mysqli_error($connect));


if(mysqli_set_charset($connect,"utf-8")){
	echo "something went wrong";
}
?>