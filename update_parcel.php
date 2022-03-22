<?php
        session_start();
        if (!isset($_SESSION["User"])) {
            header("Location:staff_login.php");
        }

        include 'includes/connect.php';

        extract( $_POST );
        $idURL = $_GET['id'];

        $query = "UPDATE parcel SET shelf_id = '$parcelshelfId', staff_id = '$parcelStaffId', owner_id = '$ownerid', parcel_trackingNo = '$parcelTrackingNo', parcel_weight = '$parcelweight', parcel_type = '$parcelType', parcel_status = '$parcelStatus', parcel_description = '$parcelDescription' WHERE parcel_id = $idURL";

        if (mysqli_query($conn, $query)) {
            echo "<script type='text/javascript'> window.location='staff.php' </script>";
          } else {
             echo "Error: ". $query . "<br>" . mysqli_error($conn);
          }
?>