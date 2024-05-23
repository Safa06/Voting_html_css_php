<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location:../");
    }

    $userdata = $_SESSION['userdata'];
    $groupdata = $_SESSION['groupdata'];

    if($_SESSION['userdata']['status']==0){
        $status = '<b style="color:red">Not voted</b>';
    }
    else{
        $status = '<b style="color:white">Voted</b>';
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online voting system - Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>


<body>

<style>
#header{
    padding: 5px;
    font-size: large;
    font-family: 'Times New Roman', Times, serif;
    text-align:center;
    background-color: #67C6E3;

}

#subheader{
    font-style: italic;
    font-family:cursive;
    font-size: medium;
    
}

    #backbtn{
    border-radius: 5px;
    padding: 10px;
    font-size: medium;
    font-weight: bold;
    width: 100px;
    background-color:  #a1a7ab;
    float: left;
    margin: 10px;
}

#logoutbtn{
    border-radius: 5px;
    padding: 10px;
    font-size: medium;
    font-weight: bold;
    width: 100px;
    background-color:  #a1a7ab;
    float: right;
    margin: 10px;
}

#bodys{
    margin-top: 10px;
    /* text-align: center; */
    /* background-color: #DFF5FF; */
    padding: 10px;
    font-family: 'Times New Roman', Times, serif;
    font-size: medium;

}

#profile{
width: 30%;
padding: 20px;
background-color:cadetblue;
float: left;
margin: 10px;

}

#group{
width: 50%;
padding: 20px;
background-color:darkseagreen;
float: right;
margin: 10px;
}


#votebtn{
    border-radius: 5px;
    padding: 10px;
    font-size: medium;
    font-weight: bold;
    /* width: 100px; */
    background-color:  #a1a7ab;
    margin: 10px;
}


#votedbtn{
    border-radius: 5px;
    padding: 10px;
    font-size: medium;
    font-weight: bold;
    /* width: 100px; */
    background-color:darkgreen;
    margin: 10px;
    color: white;
}


</style>

<div id="header">
<a href="../"><button id="backbtn">Back</button></a>
    <a href="logout.php"><button id="logoutbtn"> Logout</button></a>
        <h1>Online Voting System</h1>
        <h3 id="subheader">~~ Voting is our duty ~~</h3>
    </div>
    <hr>

<section id="bodys">
    <div id="profile">
    <!-- image -->
        <img src="../uploads/<?php echo $userdata['photo']?>" height="50" width="50"><br><br>
        <b>Name: <?php echo $userdata['name']?></b><br><br>
        <b>Mobile: <?php echo $userdata['mobile']?></b><br><br>
        <b>Address: <?php echo $userdata['address']?></b><br><br>
        <b>Status: <?php echo $userdata['status']?></b>





    </div>
    <div id="group">
    <?php
        if($_SESSION['groupdata']){
           for($i=0;$i<count($groupdata);$i++){
           ?>
           <div>
            <img style="float: right;" src="../uploads/<?php echo $groupdata[$i]['photo']?>" height="50" width="50">
            <b>Group name: <?php echo $groupdata[$i]['name']?></b> <br><br>
            <b>Votes: <?php echo $groupdata[$i]['votes']?> </b> <br><br>
            <form action="../api/vote.php" method="post">
            <input type="hidden" name="gvotes" value="<?php echo $groupdata[$i]['votes'] ?>">
            <input type="hidden" name="gid" value="<?php echo $groupdata[$i]['id'] ?>">
            <?php
            if($_SESSION['userdata']['status']==0){
                ?>
<input type="submit" name="votebtn" value="vote" id="votebtn">
<?php
            }
            else{
?> 
<button disabled type="button" name="votebtn" value="vote" id="votedbtn">Voted</button>
<?php 
            }
            ?>
            </form>
           </div>
           <hr>

           <?php
           }
        }
        else{
        }

        ?>
</div>

</section>

</body>
</html>