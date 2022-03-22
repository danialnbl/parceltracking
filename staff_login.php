<!-- Header -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Staff Login</title>
    <link rel="icon" href="https://kalam.ump.edu.my/pluginfile.php/1/theme_boost_campus/favicon/1638680463/favicon%20%281%29%20%281%29%20%281%29.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script defer src="script.js"></script>
</head>

<body>
    <div class="staffloginbackground">
        <?php
        session_start();
        include 'includes/header.php';
        ?>
        <div class="container" style="margin-top: 100px;">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="card mt-5 col-lg-10 ml-5" style=" border-radius: 10px;">
                        <div class="card-header text-black row" style="background-color: #0BAEA5; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                            <img class="logo" style="margin-left: 10px;" src="assets/ump_logo.png" alt="ump_logo">
                            <h1 class="mt-md-4 ml-5" style="font-family: 'Times New Roman', Times, serif;">LOGIN</h1>
                        </div>

                        <?php
                        if (@$_GET['Empty'] == true) {
                        ?>
                            <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Empty'] ?></div>
                        <?php
                        }
                        ?>


                        <?php
                        if (@$_GET['Invalid'] == true) {
                        ?>
                            <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Invalid'] ?></div>
                        <?php
                        }
                        ?>

                        <div class="card-body">
                            <form action="process.php" method="post" id="form">
                                <div class="staff_idTxtFld">
                                    <input type="text" name="staffID" placeholder="Staff ID" class="form-control mb-3" id="staffID">
                                </div>
                                <div class="passwordTxtFld">
                                    <input type="password" name="Password" placeholder=" Password" class="form-control mb-3" id="password">
                                </div>
                                <button class="btn mt-2 mb-3 form-control" type="submit" style="background-color: #0BAEA5; color: #ffff;" name="Login">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>