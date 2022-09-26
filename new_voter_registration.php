<?php
session_start();
$msg="";
if (isset($_POST['r6']))
{
    $name=$_POST['r1'];
    $pwd=$_POST['r2'];
    $aadhar=$_POST['r3'];
    $gen=$_POST['r4'];
    $type=$_POST['r5'];
    $link=mysqli_connect("localhost","root","","votingdb");
    $qry="insert into voter(voter_name, voter_pwd, voter_aadhar,voter_gender,voter_type) values('$name','$pwd','$aadhar','$gen','$type')";
    mysqli_query($link,$qry);
    if (mysqli_affected_rows($link)>0){
    $msg="Voter Registered Successfully!!!!";}
    else{
    $msg="Error in voter registration......";}
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
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body style="background-color:#29586e;color:white;">
        <?php
        include("navbar.php");
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6" >
                    <h2 style="color:white">
                        New Voter Registration
                    </h2>
                    <hr size="10px" width="100%" color="white">

                    <form method="post">
                        <div class="row"style="margin-top:40px;">
                            <div class="col-sm-3" style="text-align: right;padding-right:20px;">
                                <label for="n">
                                    Name
                                </label> 
                            </div>
                            <div class="col-sm-9" style="color:black;">
                                <input type="text" name="r1" value="" style="width:100%;border-radius:3px;height:30px;" id="n"/>
                            </div>
                        </div>
                        <div class="row" style="margin-top:15px;">
                            <div class="col-sm-3" style="text-align: right;padding-right:20px;">
                                <label for="p">
                                    Password
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <input id="p" type="password" name="r2" value=""  style="width:100%;border-radius:3px;height:30px;color:black;"/>
                            </div>
                        </div>
                        <div class="row"style="margin-top:15px;">
                            <div class="col-sm-3" style="text-align: right;padding-right:20px;">
                                <label for="a">
                                    Aadhar Number
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <input type="number" name="r3" value="" style="width:100%;border-radius:3px;height:30px;color:black;" id="a"/>
                            </div>
                        </div>
                        <div class="row"style="margin-top:15px;">
                            <div class="col-sm-3" style="text-align: right;padding-right:20px;">
                                <label for="m">
                                    Gender
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <input type="radio" name="r4" value="Male" id="m"><label for="m">Male</label></input>
                                <input type="radio" name="r4" value="Female" id="fe"><label for="fe">Female</label></input>
                            </div>
                        </div>
                        <div class="row"style="margin-top:15px;">
                            <div class="col-sm-3" style="text-align: right;padding-right:20px;">
                                <label for="u">
                                    User Type
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <select name="r5" id="u" style="color:black;width:100%;height:30px;color:black;">
                                    <option value="Admin">Admin</option>
                                    <option value="Voter">Voter</option>
                                </select>
                            </div>
                        </div>
                        <div class="row"style="margin-top:15px;">
                            <div class="col-sm-3" style="text-align: right;padding-right:20px;">

                            </div>
                            <div class="col-sm-9">
                                <input type="submit" name="r6" value="Register" style="background-color:#ed5311;border-style:none;border-radius:2px;"/>
                            </div>
                            <br><center>
                            <?php
                            echo $msg;
                            
                            ?>
                            </center>
                        </div>
                    </form>
                </div>

                <div class="col-sm-3"></div>  

            </div>







        </div>

    </body>
</html>