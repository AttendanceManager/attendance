
    <!--
        This is the Form for changing the password for the user.
        Kindly logout the user as soon as he changes his password
        as there is a bug in twitter bootstrap that makes
        a nested tab impossible to be reactivated again.
    --><?php
    session_start();
    $status =$_SESSION['status'];
    $first_name =$_SESSION['first_name'];
    $middle_name = $_SESSION['middle_name'];
    $last_name = $_SESSION['last_name'];

    $first_name = $first_name.' '.$middle_name;
    $Email = $_SESSION['Email'];


echo "    
    
    <head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='css/roboto.css' type='text/css'>
    <link href='css/MatIco.css' rel='stylesheet'>
    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <link href='css/bootstrap-material-design.css' rel='stylesheet'>
    <link href='css/ripples.min.css' rel='stylesheet'>
    <link href='css/snackbar.css' rel='stylesheet'>
    <link href='css/responsivetable.css' rel='stylesheet'>
    <title>Teacher Dashboard</title>
    <script>
        
        function passwordmatch() {
            //Store the password field objects into variables ...
            var pass1 = document.getElementById('newPassword');
            var pass2 = document.getElementById('confirmNewPassword');
            //Store the Confimation Message Object ...
            var message = document.getElementById('confirmMessage');
            var button = document.getElementById('button_group');
            //Set the colors we will be using ...
            var goodColor = '#66cc66';
            var badColor = '#ff6666';
            //Compare the values in the password field
            //and the confirmation field
            if (pass1.value == pass2.value) {
                //The passwords match.
                //Set the color to the good color and inform
                //the user that they have entered the correct password
                pass2.style.backgroundColor = goodColor;
                message.style.color = goodColor;
                message.innerHTML = 'Passwords Match!';
                button.innerHTML = \"<button type='submit' class='btn btn-primary' id='submit_button'>Submit<div class='ripple-container'></div></button>\";
            } else {
                //The passwords do not match.
                //Set the color to the bad color and
                //notify the user.
                pass2.style.backgroundColor = badColor;
                message.style.color = badColor;
                message.innerHTML = 'Passwords Do Not Match!';
                button.innerHTML = 'Form Has An Error !';
            }
        }
    </script>
    
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
                        <li class=\"dropdown\">
                          <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">$first_name</a>
                          <ul class=\"dropdown-menu\">
                            <li class=\"divider\"></li>
                            <li><a href=\"test.php\">Sign Out <span class=\"glyphicon glyphicon-log-out pull-right\"></span></a></li>
                          </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!--BODY-->
    
    
    
    <div class='col-md-2'></div>
    <div class='col-md-8'>
        <div class='well bs-component'>
            <form class='form-horizontal'>
                <fieldset>
                    <legend style='text-align: center;'>
                        Change Password
                    </legend>
                    <div class='form-group is-empty'>
                        <label for='currentPassword' class='col-md-2 control-label'>Current Password :</label>
                        <div class='col-md-10'>
                            <input type='password' class='form-control' id='currentPassword' placeholder='Enter Your Current Password' name='currentPassword' required>
                        </div>
                    </div>
                    <div class='form-group is-empty'>
                        <label for='newPassword' class='col-md-2 control-label'>New Password :</label>
                        <div class='col-md-10'>
                            <input type='password' class='form-control' id='newPassword' placeholder='Enter Your New Password' name='newPassword' onKeyUp='passwordmatch();' required>
                        </div>
                    </div>
                    <div class='form-group is-empty'>
                        <label for='confirmNewPassword' class='col-md-2 control-label'>Confirm New Password :</label>
                        <div class='col-md-10'>
                            <input type='password' class='form-control' id='confirmNewPassword' placeholder='Re-Enter Your New Password' name='confirmNewPassword' onKeyUp='passwordmatch();' required>
                        </div>
                        <span id='confirmMessage' class='confirmMessage'></span>
                    </div>
                    <div class='form-group'>
                        <div class='col-md-10 col-md-offset-2'>
                            <a href='teacherDashboard.php'><button type='button' class='btn btn-default' >Cancel<div class='ripple-container'></div></button></a>
                                    <span id='button_group'>
                                        <button type='submit' class='btn btn-primary' id='submit_button'>Submit<div class='ripple-container'></div></button>
                                    </span>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
</body>



    <script src='js/jquery-1.10.2.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src='js/ripples.min.js'></script>
    <script src='js/material.min.js'></script>
    <script src='js/snackbar.min.js'></script>
    <script src='js/jquery.nouislider.min.js'></script>
    
    
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
    

";

    ?>