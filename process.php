<?php 
require_once('includes/connect.php');
session_start();
    if(isset($_POST['Login']))
    {
       if(empty($_POST['staffID']) || empty($_POST['Password']))
       {
            header("location:staff_login.php?Empty= Please Fill in the Blanks");
       }
       else
       {
            $query="select * from staff where staff_id='".$_POST['staffID']."' and staff_password='".$_POST['Password']."'";
            $result=mysqli_query($conn,$query);

            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['User']=$_POST['staffID'];
                header("location:staff.php");
            }
            else
            {
                header("location:staff_login.php?Invalid= Please Enter Correct User Name and Password ");
            }
       }
    }
    else
    {
        echo 'Not Working Now Guys';
    }
?>