<?php
session_start();
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
                <div class="col-sm-5">
                    <h2 style="color:white">
                        Candidates Form
                    </h2>
                    <hr size="10px" width="100%" color="white">

                    <form method="post" enctype="multipart/form-data">
                        <div class="row"style="margin-top:40px;">
                            <div class="col-sm-3" style="text-align: right;padding-right:20px;">
                                <label for="t">
                                    Candidates Name
                                </label> 
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="c1" value="" style="width:100%;border-radius:6px;height:30px;color:black;" id="t"/>
                            </div>
                        </div>
                         <div class="row" style="margin-top:15px;">
                            <div class="col-sm-3" style="text-align: right;padding-right:20px;">
                                <label for="f">
                                    Candidates Image
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <input id="f" type="file" name="file" value=""  style="width:100%;border-radius:6px;background-color:white;height:30px;padding:4px 9px;color:black;"/>
                            </div>
                        </div>
                       <div class="row" style="margin-top:15px;">
                            <div class="col-sm-3" style="text-align: right;padding-right:20px;">
                                <label for="se">
                                    Select Category
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <select name="c2" class="form-control" id="se" style="width:100%;border-radius:6px;height:30px;color:black;">
                                    <option  >- - - Select - - -</option>
                                    <?php
                                     $link = mysqli_connect("localhost", "root", "", "votingdb");
                                   $qry="select * from category";
                                   $resultset= mysqli_query($link, $qry);
                                   if(mysqli_num_rows($resultset)>0)
                                   {
                                       while($r=mysqli_fetch_array($resultset))
                                       {
                                           echo"<option value='$r[0]'>$r[1]</option>";
                                       }
                                   }
                                   mysqli_close($link);
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row"style="margin-top:8px;">
                            <div class="col-sm-3" >

                            </div>
                            <div class="col-sm-9">
                                <input type="submit" name="c3" value="Save" style="width:60px;border-radius:3px;border-style:none;color:white;background-color:#ed5311;margin-top:10px;height:30px;"/>
                            </div>
                        </div>
                    </form>
                    <center>
                        <?php
                       
                        if (isset($_POST['c3'])) {
                            if ($_FILES['file']['error'] == 0) {
                                $cid=$_POST['c2'];
                                if ($_FILES['file']['type'] == 'image/jpg' || $_FILES['file']['type'] == 'image/png') {
                                    $source = $_FILES["file"]["tmp_name"];
                                    $des = $_SERVER['DOCUMENT_ROOT'] . "/e-voting/symbols/" . $_FILES["file"]["name"];
                                    $reladd="symbols/" . $_FILES["file"]["name"];
                                    $res = move_uploaded_file($source, $des);
                                    if ($res) {
                                        echo"File uploaded successfully";
                                    } else {
                                        echo"File cannot be uploaded";
                                    }
                                } else {
                                    echo"INVALID FORMAT";
                                }
                            }
                        }
                        ?>
                        <?php
                        $msg = "";
                        if (isset($_POST['c3'])) {
                            if ($_FILES['file']['error'] == 0) {
                                if ($_FILES['file']['type'] == 'image/jpg' || $_FILES['file']['type'] == 'image/png') {
                                    $c_name = $_POST['c1'];
                                    $c_category=$_POST['c2'];

                                    $link = mysqli_connect("localhost", "root", "", "votingdb");
                                    $qry = "insert into candidate(c_name,c_image,cid) values('$c_name','$reladd','$cid')";
                                    mysqli_query($link, $qry);
                                    if (mysqli_affected_rows($link) > 0) {
                                        $msg = "<br>Saved!!!!";
                                    }
                                    mysqli_close($link);
                                } else {
                                    $msg = "<font color='red'><br>ERROR......</font>";
                                }
                            }
                        }
                        ?>
                        <?php
echo $msg;
?>
                    </center>
                </div>


                <div class="col-sm-7 ">
                    <h2 style="color:white">
                        View Candidates
                    </h2>
                    <center>

                    </center>
                    <hr size="10px" width="100%" color="white">
                    <center>

                    </center>
                </div>
            </div>







        </div>

    </body>
</html>




