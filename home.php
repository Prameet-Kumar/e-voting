<?php
session_start();
$msg = "";
if (isset($_POST['n4'])) {
    $id = $_POST['n1'];
    $pwd = $_POST['n2'];
    $link = mysqli_connect("localhost", "root", "", "votingdb");
    $qry = "select * from voter where voter_id=$id and voter_pwd='$pwd'";
    $result = mysqli_query($link, $qry);
    if (mysqli_num_rows($result) > 0) {
        $r = mysqli_fetch_assoc($result);
        $_SESSION['uname'] = $r['voter_name'];
        $_SESSION['utype'] = $r['voter_type'];
        $_SESSION['vid'] = $r['voter_id'];
        setcookie("n1",$id,time()+2*24*60*60);
        header("location:home.php");
    } else {
        $msg = "<font color='red'>Invalid Username or Password</font>";
    }
    mysqli_close($link);
}
?>










<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <title>
            e-voting
        </title>
        <meta charset="UTF-8">^

        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body style="background-color:#29586e;">
        <?php
        include("navbar.php");
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6" style="padding-top:90px;padding-left:150px;">
                    <h2 style="color:white;">Online Voting System</h2><br>
                </div>
                <div class="col-sm-6" style="padding-top:90px;padding-left:150px;">
                    <h2></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6" style="padding-right:120px;padding-left:170px;">
                    <p style="color:black;background-color:#dae6e5;border-radius:10px;padding:40px 40px;">
                        In "ONLINE VOTING SYSTEM" a voter can use his/her voting right online without any difficulty.&nbsp He/She has to be registered first for him/her to&nbsp vote.&nbsp Registration&nbsp is&nbsp mainly &nbspdone&nbsp by&nbsp the system&nbsp&nbsp administrator&nbsp&nbsp for&nbsp&nbsp security&nbsp&nbsp reasons.&nbsp&nbsp  The&nbsp&nbsp system Administrator&nbsps registers the voters on a special site of system visited by him only by simply filling registration form to register voter.
                        <br>
                        After&nbsp registration, the voter is&nbsp assigned a secret Voter ID with which&nbsp he/she&nbsp can&nbsp use to log the system and&nbsp enjoy&nbsp services provided by the system such as voting. If invalid/wrong details are submitted, then the citizen is not registered to vote.
                    </p>
                </div>
                <div class="col-sm-6" style="padding-right:120px;padding-left:170px;">

                    <form method="post">
                        <div style="color:black;background-color:#dae6e5;border-radius:10px;padding:40px 60px;height:300px;">
                            <div class="row">
                                <label for="Voter">
                                    Voter ID
                                </label>
                            </div>
                            <div class="row">
                                <input type="number" name="n1" value="<?php
    setcookie("n1", $id, time() + 2 * 24 * 60 * 60);


    if (isset($_COOKIE['n1']))
    {
        echo  $_COOKIE['n1'];
    }
    else
    {
        echo 'No items for auction.';
    }
    ?>" id="Voter" style="width:100%;"/>
                            </div>
                            <div class="row" style="margin-top:15px">
                                <label for="pass">
                                    Password:
                                </label>
                            </div>
                            <div class="row">
                                <input type="password" name="n2" value="" id="pass" style="width:100%;"/>
                            </div>
                            <div class="row" style="margin-top:15px">
                                <input type="checkbox" name="n3" value="" id="che" >
                                <label for="che" style="font-weight:none;">Remember me</label>
                                </input>
                            </div>
                            <div class="row">
                                <input type="submit" name="n4" value="Login" style="background-color:#29586e;color:white;border-radius:3px;border-style:none;height:30px;width:60px;" />


                            </div>
                        </div>
                    </form>
                    <br>
                    <?php
                    echo $msg;
                    ?>
                </div>
            </div>





        </div>


    </body>
</html>
