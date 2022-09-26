
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      







         <link rel="stylesheet" href="navcss.css">
        <div class="nav">
            <input type="checkbox" id="nav-check">
            <div class="nav-header">
                <div class="nav-title" style="padding-left:200px;">
                    <font face="cursive" color="yellow" size="5px">
                    e</font><font face="cursive" size="5px">-</font><font face="cursive" color="yellow" size="5px">Voting&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    </font>
                    <font color="white">
                    <?php
                    
                    if (isset($_SESSION['uname']))
                    {
                        echo "Hi!  ";   
                    echo $_SESSION['uname'];
                    }
                    ?>
                    </font>
                </div>
            </div>
            <div class="nav-btn">
                <label for="nav-check">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
            </div>

            <div class="nav-links">
                <ul>
                    <li><a href="home.php" >Home</a></li>
                    <li><a href="vote.php">Vote</a></li>
<?php
if (isset($_SESSION['utype']))
{
    if($_SESSION['utype']=='Admin')
    {


                  echo  "<li class='nav-item dropdown'>";
                        echo "<a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            Admin
                        </a>";
                      echo   "<div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>";
                         echo    "<a class='dropdown-item' href='admin_category_list.php' style='background-color:black;'>Category List</a>";
                       echo     " <a class='dropdown-item' href='voting_form.php' style='background-color:black;'>Voting List</a>";
                        echo     "<a class='dropdown-item' href='view_regisrtered_voters.php' style='background-color:black;'>View Voters</a>";
                      echo   "<a class='dropdown-item' href='new_voter_registration.php' style='background-color:black;'>Add New Voter</a>";
                      echo   "</div>";
                   echo " </li>";
    }
}
?>


                    <li><a href="resullt.php" >View Result</a></li>
                 <?php 
                 if (isset($_SESSION['utype'])){  
                   echo" <li><a href='logout.php' >Logout</a></li>";
                 }
                            ?>
                    <a class="icon">
                        <img src="v6.jpg" style="height:40px; width:40px;padding:0px 0px;">

                    </a>
                </ul>
            </div>
        </div>
