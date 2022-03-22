<?php
        session_start();
        if (!isset($_SESSION["User"])) {
            header("Location:staff_login.php");
        }

        include 'includes/connect.php';

        $idURL = $_GET['id'];

        $query = "DELETE FROM `parcel` WHERE `parcel`.`parcel_id` = $idURL";
        $result = mysqli_query($conn,$query) or die ("Could not execute query");

        if($result){
            echo "<script type= 'text/javascript'> window.location='staff.php'</script>";
        }
?>