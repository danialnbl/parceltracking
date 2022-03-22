<?php
        session_start();
        if (!isset($_SESSION["User"])) {
            header("Location:staff_login.php");
        }

        include 'includes/connect.php';

        extract( $_POST );
        $tarikh = date("Y-m-d", time ());
        $masa = date("H:i:s", time());
        $query = "INSERT INTO parcel (shelf_id, staff_id, owner_id, parcel_trackingNo, parcel_weight, parcel_type, parcel_status, parcel_description, parcel_timeofdelivery, parcel_dateofdelivery) VALUES ('$parcelshelfId','$parcelStaffId','$ownerid','$parcelTrackingNo','$parcelweight','$parcelType','$parcelStatus','$parcelDescription','$masa','$tarikh')";

        if (mysqli_query($conn, $query)) {
            echo "<script type='text/javascript'> window.location='staff.php' </script>";
          } else {
             echo "Error: ". $query . "<br>" . mysqli_error($conn);
          }
?>