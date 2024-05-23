<?php

include('connection.php');

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$address = $_POST['address'];
// image,audio,video file hole amn vabe hobe
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role = $_POST['role'];


if($password == $cpassword){
move_uploaded_file($tmp_name,"../uploads/$image");
$insert = mysqli_query($connect,"INSERT INTO voting (name,mobile,password,address,photo,role,status,votes) VALUES ('$name','$mobile','$password','$address','$image','$role',0,0)");

if($insert){
    echo '
        <script>
            alert("Registration successful!");
            window.location = "../";   
        </script>
     ';
}
else{
    echo '
        <script>
            alert("Error!");
            window.location = "../routes/register.html";   
        </script>
     ';
}

}
else{
    echo '
        <script>
            alert("Password and Confirm password is not matched!");
            window.location = "../routes/register.html";   
        </script>
     ';
    }
?>