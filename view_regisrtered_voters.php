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
                <div class="col-sm-12">
                    <h2 style="color:white">
                      View Registered Voters
                    </h2>
                    <hr size="10px" width="100%" color="black" style="height:20px;">
                    <br>
                    <?php
                    $link=mysqli_connect("localhost","root","","votingdb");
                    $qry="select * from voter";
                    $resultset=mysqli_query($link,$qry);
                    if(mysqli_num_rows($resultset)>0)
                    {
                        echo"<div class='table-responsive'>";
                        echo "<table class='table'>";
                        echo"<tr style='color:yellow'>";
                        echo "<th>Voter Id</th><th>Name</th><th>Password</th><th>Aadhar No.</th><th>Gender</th><th>Type</th><th>Edit</th>";
                        echo"</tr>";
                        while($r=mysqli_fetch_array($resultset))
                        {
                            echo "<tr style='color:white;'>";
                            echo "<td>$r[0]</td>";
                            echo "<td>$r[1]</td>";
                            echo "<td>$r[2]</td>";
                            echo "<td>$r[3]</td>";
                            echo "<td>$r[4]</td>";
                            echo "<td>$r[5]</td>";
                            echo " <td><a class='btn btn-danger btn small' href='deletevoters.php?id=$r[0]'>Delete Record</a></td>";
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