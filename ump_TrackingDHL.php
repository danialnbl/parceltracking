<!--UMP_Tracking.php for Pos Laju-->
<!--Homepage of the Pos Laju tracking system-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>DHL Tracking</title>
  <link rel="icon" href="https://kalam.ump.edu.my/pluginfile.php/1/theme_boost_campus/favicon/1638680463/favicon%20%281%29%20%281%29%20%281%29.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <style>
    body {
      font-family: "Times New Roman", serif;

    }

    * {
      box-sizing: border-box;
    }

    /*text number tracking*/
    form.example input[type=text] {
      padding: 15px;
      margin: 0px;
      margin-bottom: -30px;
      font-size: 17px;
      border-radius: 10px;
      text-align: center;
      width: 80%;
      background: #f1f1f1;
    }

    form.example button {
      display: inline-block;
      width: 250px;
      height: 50px;
      margin: 10px;
      background: #1D8279;
      color: white;
      font-size: 17px;
      border-radius: 10px;
      border-left: none;
      cursor: pointer;
    }

    /*color search*/
    form.example button:hover {
      background: #256e67;
    }

    /*search button*/
    form.example::after {
      content: "";
      clear: both;
      display: inline-block;
      text-align: center;

    }

    footer {
      text-align: center;
      padding: 16px;
      width: 100%;
      margin-left: 0px;
      background-color: #D3D3D3;
      color: Black;

    }
  </style>
</head>

<body>
  <?php include 'includes/header.php'; ?>
  <div class="staffloginbackground" style="height: 75vh;">
  <div class="container">
    <h2 class="text-center" style="font-size: 30px ;">
      <br><br>
      <id="H2"><b>Delivery Tracking Platform Parcel In UMP</b> </p>
        <h6 class="text-center" style="font-family:courier;" style="font-size:15px;">
          <id="h6">"Make Ease Life University Student"</p>
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b3/DHL_Express_logo.svg/640px-DHL_Express_logo.svg.png" width="350" height="150">
            <!--input for Number Tracking-->
            <form method="post" class="example" id="myForm" action="" onsubmit="alertFunction()" style="margin-top: 20px;">
              <div class="w3-show-inline-block">
                <input type="text" placeholder="Enter Your Tracking Number.." name="tracking" required>
              </div>
              <br><br><br>
              <!--button fuction search and details after search and submit user can see the details-->
              <div>
                <button type="submit" id="searchbutton" >Search</button>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#parcelInfo">Show Details</button>
              </div>
            </form>
  </div>
<!-- JANGAN SENTUH  -->
<?php
  error_reporting(0);
  
  $parcelTracking_No = $_POST['tracking'];

  include 'includes/connect.php';

  $querytest = "SELECT * FROM parcel WHERE parcel_trackingNo= '$parcelTracking_No' ";
  $resulttest = mysqli_query($conn, $querytest);
  $row = mysqli_fetch_object($resulttest);

  if (mysqli_query($conn, $querytest)) {
  } else {
    echo "Error: " . $querytest . "<br>" . mysqli_error($conn);
  }

  foreach ($resulttest as $row) { 
?>

  <!-- View MODAL Parcel Details -->
  <div class="modal fade" id="parcelInfo" tabindex="-1" role="dialog" aria-labelledby="parcelInfoLabel" aria-hidden="true">
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
                <div class="card col-md-12" style="border-left-color: #0BAEA5;">
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
<?php } ?>
<script>
  function alertFunction(){
    alert("Parcel Found! Please click Show Details button")
  }
</script>
<!-- JANGAN UBAH -->
<br>
  </div>
<footer>
  <div class="row col col-md-12">
    <!-- Grid column -->
    <div class="col col-md-6 mt-md-0 mt-3">
      <p>&#x1F4E6 UMP Tracking Number System<br>
      <p>Created:<a href="http://localhost/project/about%20us.php" class="right">About Us</a></p><br>
    </div>
    <!-- Grid column -->
    <div class="col col-md-3 mb-md-0 mb-3">
      <p><b>&#x1F4CD System built with php, mysql, html, css, javascript and bootstrap.</b></p>
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9cSLfGXlE0ipxWlwZL-zvns_kCWIXC0EJGyImUuy9YcOBkfQH1oP_XrNU7c7Yuq3owLU&usqp=CAU" height="50px" width="100px">
      <img src="https://raw.githubusercontent.com/themedotid/bootstrap-icon/HEAD/docs/bootstrap-icon-css.png" height="50px" width="50px">
      <img src="https://e7.pngegg.com/pngimages/429/72/png-clipart-mysql-database-graphics-microsoft-access-logo-blue-web-design-thumbnail.png" height="50px" width="50px">
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/Webysther_20160423_-_Elephpant.svg/2560px-Webysther_20160423_-_Elephpant.svg.png" height="50px" width="80px">
    </div>
  </div>
</footer>
</body>
</html>