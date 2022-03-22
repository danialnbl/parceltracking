<!DOCTYPE html>
<html lang="en">

<head>
    <title>Staff</title>
    <link rel="icon" href="https://kalam.ump.edu.my/pluginfile.php/1/theme_boost_campus/favicon/1638680463/favicon%20%281%29%20%281%29%20%281%29.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="staffloginbackground">
        <header class="header">
            <nav class="navbar navbar-style navbar-expand-sm navbar-light" style="background-color: rgba(255,255,255,.900);">
                <div class="col-sm-2">
                    <a href="#"><img class="logo" style="margin-left: 10px;" src="assets/ump_logo.png" alt="ump_logo"></a>
                </div>
                <div class="col-sm-4">
                    <a href="#"><img class="logo" src="assets/findparcel_logo.png" alt="ump_logo" style="margin-left: 30px;"></a>
                </div>
                <div class="col-sm-6">
                    <ul class="nav navbar-nav col-sm-12">
                        <div class="submenu">
                            <li class="nav-item">
                                <a class="nav-link" style="margin-left: 400px;" href="logout.php">Logout</a>
                            </li>
                        </div>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER -->
        <!-- DATABASE -->
        <?php
        session_start();
        if (!isset($_SESSION["User"])) {
            header("Location:staff_login.php");
        }

        include 'includes/connect.php';

        $query = "SELECT parcelowner.owner_name, parcelowner.owner_address, parcel.* FROM parcel INNER JOIN parcelowner ON parcelowner.owner_id = parcel.owner_id ORDER BY parcel.parcel_id ASC;";
        $result = mysqli_query($conn, $query);

        ?>
        <!-- END DATABASE -->
        <div class="container" style="margin-top: 30px;">
            <div class="card">
                <h1 class="card-header text-center" style="font-family: 'Times New Roman', Times, serif; background-color: #0BAEA5; ">PARCEL INFORMATION</h1>
                <div class="card-body">
                    <div class="container">
                        <table class="table table-bordered" id="userinformation">
                            <thead class="table table-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Tracking Id</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($result as $row) {
                                ?>
                                    <tr>
                                        <td>
                                            <?= $row['parcel_id'] ?>
                                            <?php
                                            $id = $row['parcel_id'];
                                            ?>
                                        </td>
                                        <td>
                                            <?= $row['owner_name'] ?>
                                        </td>
                                        <td>
                                            <?= $row['parcel_trackingNo'] ?>
                                        </td>
                                        <td>
                                            <?= $row['parcel_status'] ?>
                                        </td>
                                        <td class="text-center">


                                            <button id="infoButton" type="button" class="btn btn-success" data-toggle="modal" data-target="#parcelInfo<?php echo $id; ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path>
                                                </svg>
                                            </button>


                                            <!-- View MODAL Parcel Details -->
                                            <div class="modal fade" id="parcelInfo<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="parcelInfoLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="parcelInfoLabel">Parcel's Details</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- ALL THINGS -->
                                                            <div class="container-fluid">
                                                                <div class="col-lg-12">
                                                                    <div class="row">
                                                                        <div class="card col-md-12" style="border-left-color: #0BAEA5;">
                                                                            <div class="callout callout-info">
                                                                                <dl>
                                                                                    <dt>Tracking Number:</dt>
                                                                                    <dd>
                                                                                        <h4><b><?= $row['parcel_trackingNo'] ?></b></h4>
                                                                                    </dd>
                                                                                </dl>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2">
                                                                        <div class="card col-md-6" style="border-left-color: #0BAEA5;">
                                                                            <h5 class="card-title border-bottom">Parcel Information</h5>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <h6 class="card-subtitle mb-2 text-left">Parcel Shelf id : </h6>
                                                                                    <p class="card-text text-left"><?= $row['shelf_id'] ?></p>
                                                                                    <h6 class="card-subtitle mb-2 text-left">Assigned Staff id : </h6>
                                                                                    <p class="card-text text-left"><?= $row['staff_id'] ?></p>
                                                                                    <h6 class="card-subtitle mb-2 text-left">Parcel Owner id : </h6>
                                                                                    <p class="card-text text-left"><?= $row['owner_id'] ?></p>
                                                                                    <h6 class="card-subtitle mb-2 text-left">Parcel Date of Delivery : </h6>
                                                                                    <p class="card-text text-left"><?= $row['parcel_dateofdelivery'] ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h6 class="card-subtitle mb-2 text-left">Parcel Type : </h6>
                                                                                    <p class="card-text text-left"><?= $row['parcel_type'] ?></p>
                                                                                    <h6 class="card-subtitle mb-2 text-left">Parcel's Weight : </h6>
                                                                                    <p class="card-text text-left"><?= $row['parcel_weight'] ?>kg</p>
                                                                                    <h6 class="card-subtitle mb-2 text-left">Parcel Status : </h6>
                                                                                    <p class="card-text text-left"><?= $row['parcel_status'] ?></p>
                                                                                    <h6 class="card-subtitle mb-2 text-left">Parcel Time of Delivery : </h6>
                                                                                    <p class="card-text text-left"><?= $row['parcel_timeofdelivery'] ?></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card col-md-6">
                                                                            <h5 class="card-title border-bottom">Owner Information</h5>
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <h6 class="card-subtitle mb-2 text-left">Owner id : </h6>
                                                                                    <p class="card-text text-left"><?= $row['owner_id'] ?></p>
                                                                                    <h6 class="card-subtitle mb-2 text-left">Owner Name : </h6>
                                                                                    <p class="card-text text-left"><?= $row['owner_name'] ?></p>
                                                                                    <h6 class="card-subtitle mb-2 text-left">Owner Address : </h6>
                                                                                    <p class="card-text text-left"><?= $row['owner_address'] ?></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- END ALL THINGS -->
                                                        </div>
                                                        <div class="modal-footer display p-0 m-0">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- MODAL END -->

                                            <a href="#editParcelModal<?php echo $id; ?>" style="text-decoration:none;">
                                                <button id="editButton" type="button" class="btn btn-primary" data-toggle="modal" data-target="#editParcelModal<?php echo $id; ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                                                    </svg>
                                                </button>
                                            </a>

                                            <!-- MODAL Edit Parcel-->
                                            <div class="modal fade" id="editParcelModal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="editParcelModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editParcelModalLabel">Parcel's Details</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="post" action="update_parcel.php?id=<?php echo $id; ?>">
                                                            <div class="modal-body">
                                                                <!-- ALL THINGS -->
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="ownerid">Parcel Owner Id</label>
                                                                                <input type="text" class="form-control" id="ownerid" name="ownerid" aria-describedby="owneridHelp2" placeholder="Enter parcel owner id" value="<?= $row['owner_id'] ?>">
                                                                                <small id="owneridHelp2" class="form-text text-muted">Please check all available owner id.</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="parcelStaffId">Parcel Staff Id</label>
                                                                                <input type="text" class="form-control" id="parcelStaffId" name="parcelStaffId" aria-describedby="parcelstaffIdHelp2" placeholder="Enter assigned staff id" value="<?= $row['staff_id'] ?>">
                                                                                <small id="parcelstaffIdHelp2" class="form-text text-muted">Please check all available staff id.</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="ownerid">Parcel Weight (Kg)</label>
                                                                                <input type="number" class="form-control" id="parcelweight" name="parcelweight" placeholder="Enter parcel weight" value="<?= $row['parcel_weight'] ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="parcelTrackingNo">Parcel Type</label>
                                                                                <input type="text" class="form-control" id="parcelType" name="parcelType" placeholder="Enter parcel Type" value="<?= $row['parcel_type'] ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="ownerid">Parcel Status</label>
                                                                                <input type="text" class="form-control" id="parcelStatus" name="parcelStatus" placeholder="Enter parcel status" value="<?= $row['parcel_status'] ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="parcelTrackingNo">Parcel Description</label>
                                                                                <input type="text" class="form-control" id="parcelDescription" name="parcelDescription" placeholder="Enter Parcel Description" value="<?= $row['parcel_description'] ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="ownerid">Parcel Shelf Id</label>
                                                                                <input type="text" class="form-control" id="parcelshelfId" name="parcelshelfId" aria-describedby="shelfidHelp2" placeholder="Enter parcel shelf id" value="<?= $row['shelf_id'] ?>">
                                                                                <small id="shelfidHelp2" class="form-text text-muted">Please check all available shelf id.</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="parcelTrackingNo">Parcel Tracking No</label>
                                                                                <input type="text" class="form-control" id="parcelTrackingNo" name="parcelTrackingNo" placeholder="Enter Tracking No" value="<?= $row['parcel_trackingNo'] ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- END ALL THINGS -->
                                                            </div>
                                                            <div class="modal-footer display p-0 m-0">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- MODAL END -->

                                            <a href="delete_parcel.php?id=<?php echo $id; ?>" style="text-decoration:none;">
                                                <button id="deleteButton" type="button" class="btn btn-outline-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                                    </svg>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="text-right">
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">Add new parcel</button>
                        </div>

                        <!-- MODAL Add New Parcel-->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Parcel's Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post" action="add_parcel.php">
                                        <div class="modal-body">
                                            <!-- ALL THINGS -->
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="ownerid">Parcel Owner Id</label>
                                                            <input type="text" class="form-control" id="ownerid" name="ownerid" aria-describedby="owneridHelp" placeholder="Enter parcel owner id">
                                                            <small id="owneridHelp" class="form-text text-muted">Please check all available owner id.</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="parcelStaffId">Parcel Staff Id</label>
                                                            <input type="text" class="form-control" id="parcelStaffId" name="parcelStaffId" aria-describedby="parcelstaffIdHelp" placeholder="Enter assigned staff id">
                                                            <small id="parcelstaffIdHelp" class="form-text text-muted">Please check all available staff id.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="ownerid">Parcel Weight (Kg)</label>
                                                            <input type="number" class="form-control" id="parcelweight" name="parcelweight" placeholder="Enter parcel weight">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="parcelTrackingNo">Parcel Type</label>
                                                            <input type="text" class="form-control" id="parcelType" name="parcelType" placeholder="Enter parcel Type">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="ownerid">Parcel Status</label>
                                                            <input type="text" class="form-control" id="parcelStatus" name="parcelStatus" placeholder="Enter parcel status">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="parcelTrackingNo">Parcel Description</label>
                                                            <input type="text" class="form-control" id="parcelDescription" name="parcelDescription" placeholder="Enter Parcel Description">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="ownerid">Parcel Shelf Id</label>
                                                            <input type="text" class="form-control" id="parcelshelfId" name="parcelshelfId" aria-describedby="shelfidHelp" placeholder="Enter parcel shelf id">
                                                            <small id="shelfidHelp" class="form-text text-muted">Please check all available shelf id.</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="parcelTrackingNo">Parcel Tracking No</label>
                                                            <input type="text" class="form-control" id="parcelTrackingNo" name="parcelTrackingNo" placeholder="Enter Tracking No">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END ALL THINGS -->
                                        </div>
                                        <div class="modal-footer display p-0 m-0">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- MODAL END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>