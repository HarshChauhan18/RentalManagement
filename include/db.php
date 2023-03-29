<?php
$shost = "localhost";
$sname = "root";
$spass = "";
$dbname = "rentalmanagement";

$conn = mysqli_connect($shost, $sname, $spass, $dbname);

if (!$conn) {
    die("Error : " . mysqli_connect_error());
}
else{
    echo "Success";
}
