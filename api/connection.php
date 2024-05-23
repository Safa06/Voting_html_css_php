<?php
$connect = mysqli_connect("localhost","root","","voting_php") or die("connection failed!");

if($connect){
    echo "Connected to database!";

}
else
{
    echo "Not connected!";
}

?>