<?php
    session_start();
    if(!isset($_SESSION['status'])){
        $_SESSION['status']=0;
    }
    else{
        $status = $_SESSION['status'];
        if($status == 3){
            header('location:teacherDashboard.php');
            exit(0);

        }elseif($status == 2){
            header('location:studentDashboard.php');
            exit(0);
        }
    }

echo "
<!doctype html>
<html>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='css/roboto.css' type='text/css'>
    <link href='css/MatIco.css' rel='stylesheet'>
    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <link href='css/bootstrap-material-design.css' rel='stylesheet'>
    <link href='css/ripples.min.css' rel='stylesheet'>
    <link href='css/snackbar.css' rel='stylesheet'>

    <title>Login</title>

</head>

<body>

    <div class='bs-component'>
        <div class='navbar navbar-danger'>
            <div class='container-fluid'>
                <div class='navbar-header'>
                    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-responsive-collapse'>
                  <span class='icon-bar'></span>
                  <span class='icon-bar'></span>
                  <span class='icon-bar'></span>
                </button>
                    <a class='navbar-brand' href='index.php'>CM</a>
                </div>
                <div class='navbar-collapse collapse navbar-responsive-collapse'>
                    <ul class='nav navbar-nav navbar-right'>
                        <li><a href='signUPForm.php'>SignUP <span class='glyphicon glyphicon-ok'></span><div class='ripple-container'></div></a></li>
                        <li><a href='#'>LogIn <span class='glyphicon glyphicon-log-in'></span><div class='ripple-container'></div></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class='modal-dialog'>
        <div class='modal-content col-lg-12'>
            <div class='modal-header'>
                <h1 class='text-center'>
                    LOGIN
                </h1>
            </div>

            <div class='modal-body'>
                <form class='col-lg-12 center-block' action='loginV.php' method='POST'>
                    <div class='form-group'>
                        <input type='text' class='form-control input-lg' placeholder='Email ID' name='email_id' required>
                    </div>
                    <div class='form-group'>
                        <input type='password' class='form-control input-lg' placeholder='Password' name='password' required>
                    </div>
                    <div class='form-group'>
                        <input type='submit' class='btn btn-block btn-lg btn-primary' name='lgbtn' value='Log In'>
                        <span class='pull-left' style='margin-bottom: 10px;'><a href='signUPForm.php'><h5>SignUP</h5></a></span>
                        <span class='pull-right'><a href='index.php'><h5>Just Browse</h5></a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src='js/jquery-1.10.2.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src='js/ripples.min.js'></script>
    <script src='js/material.min.js'></script>
    <script src='js/snackbar.min.js'></script>
    <script src='js/jquery.nouislider.min.js'></script>

</body>
<hr>
<footer class=' bscomponent navbar navbar-fixed-bottom navbar-danger'>

    <div class='container-fluid' style='padding:20px;'>
        <div class='row'>
            <div class='col-md-4' style='text-align:center;'>
                <a href='#' style='color:#FFF;'>About Us</a>
            </div>
            <div class='col-md-4' style='text-align:center;color:#FFF;'>
                <a href='#' style='color:#FFF;'>Contact Us</a>
            </div>
            <div class='col-md-4' style='text-align:center;color:#FFF;'>
                <a href='#' style='color:#FFF;'>Team</a>
            </div>
        </div>
    </div>
</footer>

</html>";

?>
