<?php
    session_start();
    if(!isset($_SESSION['status'])){
        $_SESSION['status']=0;
    }
    else{
        $status = $_SESSION['status'];
        if($status == 3){
            header('Location:teacherDashboard.php');
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

    <title>College Manage</title>

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
                    <a class='navbar-brand' href='#'>CM</a>
                </div>
                <div class='navbar-collapse collapse navbar-responsive-collapse'>
                    <ul class='nav navbar-nav navbar-right'>
                        <li><a href='signUPForm.php'>SignUP <span class='glyphicon glyphicon-ok'></span><div class='ripple-container'></div></a></li>
                        <li><a href='login.php'>LogIn <span class='glyphicon glyphicon-log-in'></span><div class='ripple-container'></div></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class='row'>
        <div class='col-md-4'></div>
        <div class='col-md-4'>
            <img src='images/logo.png' class='img-rounded' alt='Logo' width='400' height='400' style='margin-top: 25px;margin-bottom:15px;display: block;margin-left: auto;margin-right: auto;'>
        </div>
    </div>

    <div class='row'>
        <div class='col-md-4'></div>
        <div style='text-align:center'>
            <h1>College Manage</h1>
            <h3>College Handling Simplified !!</h3>
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
