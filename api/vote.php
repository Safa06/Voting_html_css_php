<?php 

session_start();
include("connection.php");

$votes = $_POST['gvotes'];
$total_votes = $votes + 1;
$gid = $_POST['gid'];
$uid = $_SESSION['userdata']['id'];

$update_votes = mysqli_query($connect,"UPDATE voting SET votes='$total_votes' WHERE id='$gid' ");

$update_user_status = mysqli_query($connect,"UPDATE voting SET status=1 WHERE id='$uid'");

if($update_votes and $update_user_status){
$groups = mysqli_query($connect,"SELECT * FROM voting WHERE role=2");
$groupdata = mysqli_fetch_all($groups,MYSQLI_ASSOC);

$_SESSION['userdata']['status'] = 1;
$_SESSION['groupdata'] = $groupdata;

echo '
    <script>
    alert("Voting successful!");
    window.location="../routes/dashboard.php";
    </script>
    ';

}
else{
    echo '
    <script>
    alert("Some error occured!");
    window.location="../routes/dashboard.php";
    </script>
    ';
}









?>