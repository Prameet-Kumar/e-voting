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
                        Voting Form
                    </h2>
                    <hr size="10px" width="100%" color="white">

                    <form method="post" enctype="multipart/form-data">
                        <div class="row"style="margin-top:40px;">
                            <div class="col-sm-3" style="text-align: right;padding-right:20px;">
                                <label for="t">
                                    Title
                                </label> 
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="f1" value="" style="width:100%;border-radius:6px;height:30px;color:black;" id="t"/>
                            </div>
                        </div>

                        <div class="row"style="margin-top:8px;">
                            <div class="col-sm-3" >

                            </div>
                            <div class="col-sm-9">
                                <input type="submit" name="f3" value="Save" style="width:60px;border-radius:3px;border-style:none;color:white;background-color:#ed5311;margin-top:10px;height:30px;" />
                            </div>
                        </div>
                    </form>
                    <?php
                        $msg = "";
                        if (isset($_POST['f3'])) {

                            $title = $_POST['f1'];

                            $link = mysqli_connect("localhost", "root", "", "votingdb");
                            $qry = "insert into election(title) values('$title')";
                            mysqli_query($link, $qry);
                            if (mysqli_affected_rows($link) > 0) {
                                $msg = "Saved!!!!";
                            } else {
                                $msg = "<font color='red'>ERROR......</font>";
                            }
                            mysqli_close($link);
                        }
                        ?>
                                <center>
<?php
echo $msg;
?>
                    </center>
                </div>


                <div class="col-sm-7 ">
                    <h2 style="color:white">
                        View Voting
                    </h2>
                    
                    <hr size="10px" width="100%" color="white">
        
                          <?php
                    $link=mysqli_connect("localhost","root","","votingdb");
                    $qry="select * from election";
                    $resultset=mysqli_query($link,$qry);
                    if(mysqli_num_rows($resultset)>0)
                    {
                        echo"<div class='table-responsive'>";
                        echo "<table class='table table-bordered'>";
                        echo"<tr style='color:yellow'>";
                        echo "<th>ID</th><th>Name</th>";
                        echo"</tr>";
                        while($r=mysqli_fetch_array($resultset))
                        {
                            echo "<tr style='color:white;'>";
                            echo "<td>$r[0]</td>";
                            echo "<td><a href='candidates_form.php' style='text-decoration:none;color:white;'>$r[1]</a></td>";
                          
                            echo"</tr>";
                            
                        }
                        echo"<table>";
                        echo"</div>";
                    }
                    else
                    {
                        echo"<h3 style='color:white;text-align:center'>NO RECORD FOUND</h3>";
                    }
                     mysqli_close($link);
                    ?>
                    
                    
                    
                    
                </div>
            </div>







        </div>

    </body>
</html>