<?php

session_start();

include("connection.php");

$mobile = $_POST['mobile'];
$password = $_POST['password'];
$role = $_POST['role'];

$check = mysqli_query($connect,"SELECT * FROM voting WHERE mobile='$mobile' AND password='$password' AND role='$role' ");

if(mysqli_num_rows($check)>0){
    $userdata = mysqli_fetch_array($check);
    $groups = mysqli_query($connect, "SELECT * FROM voting WHERE role=2");
    $groupdata = mysqli_fetch_all($groups,MYSQLI_ASSOC);

    $_SESSION['userdata'] = $userdata;
    $_SESSION['groupdata'] = $groupdata;

echo '
        <script>
            window.location = "../routes/dashboard.php";   
        </script>
     ';





}
else{
    echo '
        <script>
            alert("Invalid Credentials!");
            window.location = "../";   
        </script>
     ';
}





?>