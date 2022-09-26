<?php
session_start();
$msg = "";
if (isset($_POST['a2'])) {
    $category_name = $_POST['a1'];
    $link = mysqli_connect("localhost", "root", "", "votingdb");
    $qry = "insert into category(cname) values('$category_name')";
    mysqli_query($link, $qry);
    if (mysqli_affected_rows($link) > 0) {
        $msg = "Category added Successfully!!!!";
    } else {
        $msg = "Error in adding category";
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
                        Add New Category
                    </h2>
                    <hr size="10px" width="100%" color="white">

                    <form method="post">
                        <div class="row">
                            <div class="col-sm-3" style="padding-left:35px">
                                <label for="c">
                                    Category Name
                                </label> 
                            </div>
                            <div class="col-sm-9">
                                <input id="c" type="text" name="a1" value="" style="width:100%;border-radius:6px;color:black;"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3" >

                            </div>
                            <div class="col-sm-9">
                                <input type="submit" name="a2" value="Add Category" style="width:100px;border-radius:3px;border-style:none;color:white;background-color:#ed5311;margin-top:10px;height:30px;"/>
                            </div>
                        </div>
                    </form><center>
                    <?php
                    echo $msg;
                    ?></center>
                </div>


                <div class="col-sm-7 ">
                    <h2 style="color:white">
                        Category Lists
                    </h2>
                    <hr size="10px" width="100%" color="white">
                    
                    
                          <?php
                    $link=mysqli_connect("localhost","root","","votingdb");
                    $qry="select * from category";
                    $resultset=mysqli_query($link,$qry);
                    if(mysqli_num_rows($resultset)>0)
                    {
                        echo"<div class='table-responsive'>";
                        echo "<table class='table table-bordered'>";
                        echo"<tr style='color:yellow'>";
                        echo "<th>ID</th><th>Category Name</th>";
                        echo"</tr>";
                        while($r=mysqli_fetch_array($resultset))
                        {
                            echo "<tr style='color:white;'>";
                            echo "<td>$r[0]</td>";
                            echo "<td>$r[1]</td>";
                          
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