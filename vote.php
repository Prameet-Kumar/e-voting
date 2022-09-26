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
        <link rel="stylesheet" href="navcss.css">
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
            <br>
            <h2 style="color:white;">
                Cast Your Vote
            </h2>
            <hr size="10px" width="100%" color="white">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <form method="post" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Choose Election</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="etype" >
                                    <option>
                                        Choose Election Type
                                    </option>
                                    <?php
                                    $link = mysqli_connect("localhost", "root", "", "votingdb");
                                    $qry = "select * from election";
                                    $result = mysqli_query($link, $qry);

                                    while ($r = mysqli_fetch_array($result)) {
                                        echo "<option value='$r[0]'>$r[1]</option>";
                                    }


                                    mysqli_close($link);
                                    ?>
                                </select>
                            </div>

                              <div class="col-sm-2 form-group" style="padding-left: 20px;">
                            <input type="submit" name="btnshow"  value="Show" class="btn btn-danger"/>
                        </div>

                        </div>
                        
                    </form>
                </div>
               <div class="col-sm-3"></div>
                <?php
                if (isset($_POST['btnshow']))
                {
                    $id=$_POST['etype'];
                    $link=mysqli_connect("localhost","root","","votingdb");
                    $qry="select * from election";
                    $result=mysqli_query($link,$qry);
                    $qry="insert into candidate(pid)values($id)";
                    header("location:candidates_form.php");
                }
                ?>
            </div>
        </div>
    </body>
</html>