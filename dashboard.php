<?php session_start(); ?>

<html>
    <head>
        <style>
            h1{
                color:green;
            }
        </style>
    </head>
        <p > <h1 align ="center" color>Dashboard</h1></p>
           <p align="center"> <?php echo $_SESSION['user'] ?> you have logged in </p>
    

    
    <?php
        echo "<a href='logout.php'>Logout</a>";
    ?>

</html>

