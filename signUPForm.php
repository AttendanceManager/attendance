<?php
    session_start();
    if(!isset($_SESSION['status'])){
        $_SESSION['status']=0;
    }
    else{
        $status = $_SESSION['status'];
        if($status == 2){
            header('Location: studentDashboard.php');
        }elseif($status == 3){
            header('Location: teacherDashboard.php');
        }
    }
    
?>



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
    <title>SignUP</title>
    <script type='text/javascript'>
        function passwordmatch() {
            //Store the password field objects into variables ...
            var pass1 = document.getElementById('password');
            var pass2 = document.getElementById('confirmPassword');
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
                button.innerHTML = "<button type='submit' class='btn btn-primary' id='submit_button'>Submit<div class='ripple-container'></div></button>";
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

        function rollnumcheck() {
            var roll_num = document.getElementById('roll_num');
            var button = document.getElementById('button_group');
            console.log(roll_num.value);
            var patt = /[1-9][0-9]B(CS|ME|EE|EC|CE)[0-9][0-9][0-9][0-9]/i;
            var result = patt.test(roll_num.value);
            console.log(result);
            if (!result) {
                roll_num.style.backgroundColor = '#ff6666';
                button.innerHTML = 'Form Has An Error !';
            } else {
                roll_num.style.backgroundColor = '#f2f2f2';
                button.innerHTML = "<button type='submit' class='btn btn-primary' id='submit_button'>Submit<div class='ripple-container'></div></button>";
            }
        }

        function enrollnumcheck() {
            var enroll_num = document.getElementById('enroll_num');
            var button = document.getElementById('button_group');
            var patt = /[1-9][0-9][0-9][0-9][0-9][0-9]/;
            var result = patt.test(enroll_num.value);
            if (!result) {
                enroll_num.style.backgroundColor = '#ff6666';
                button.innerHTML = 'Form Has An Error !';
            } else {
                enroll_num.style.backgroundColor = '#f2f2f2';
                button.innerHTML = '';
                button.innerHTML = "<button type='submit' class='btn btn-primary' id='submit_button'>Submit<div class='ripple-container'></div></button>";
            }
        }
        
        function phonenocheck() {
            var phone_num = document.getElementById('phoneno');
            var button = document.getElementById('button_group');
            var patt = /[7-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]/;
            var result = patt.test(phone_num.value);
            if (!result) {
                phone_num.style.backgroundColor = '#ff6666';
                button.innerHTML = 'Form Has An Error !';
            } else {
                button.innerHTML = '';
                phone_num.style.backgroundColor = '#f2f2f2';
                button.innerHTML = "<button type='submit' class='btn btn-primary' id='submit_button'>Submit<div class='ripple-container'></div></button>";
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
                    <a class='navbar-brand' href='index.html'>CM</a>
                </div>
                <div class='navbar-collapse collapse navbar-responsive-collapse'>
                    <ul class='nav navbar-nav navbar-right'>
                        <li><a href='#'>SignUP <span class='glyphicon glyphicon-ok'></span><div class='ripple-container'></div></a></li>
                        <li><a href='login.php'>LogIn <span class='glyphicon glyphicon-log-in'></span><div class='ripple-container'></div></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class='row'>
        <div class='col-md-4'></div>
        <div class='col-md-4'>
            <div class='well bs-component'>
                <form class='form-horizontal' action='signup.php' method="post">
                    <fieldset>
                        <legend style='text-align:center;'>Student SignUP</legend>


                        <div class='form-group is-empty'>
                            <label for='FName' class='col-md-2 control-label'>First Name</label>
                            <div class='col-md-10'>
                                <input type='text' class='form-control' id='first_name' placeholder='First Name' name='first_name' required>
                            </div>
                        </div>

                        <div class='form-group is-empty'>
                            <label for='MName' class='col-md-2 control-label'>Middle Name</label>
                            <div class='col-md-10'>
                                <input type='text' class='form-control' id='middle_name' placeholder='Middle Name(Optional)' name='middle_name' value=''>
                            </div>
                        </div>

                        <div class='form-group is-empty'>
                            <label for='LName' class='col-md-2 control-label'>Last Name</label>
                            <div class='col-md-10'>
                                <input type='text' class='form-control' id='last_name' placeholder='Last Name' name='last_name' required>
                            </div>
                        </div>
                        
                        <div class='form-group is-empty'>
                            <label for='PhoneNo' class='col-md-2 control-label'>Phone Number</label>
                            <div class='col-md-10'>
                                <input type='text' class='form-control' id = 'phoneno' placeholder='Enter Your Phone Number' name='PhoneNo' value="7985151294" onchange='phonenocheck()' required>
                            </div>
                        </div>
                        
                        <div class='form-group is-empty'>
                            <label for='Email' class='col-md-2 control-label'>Email</label>
                            <div class='col-md-10'>
                                <input type='email' class='form-control' id='email_id' placeholder='Enter Your E Mail ID' name='email_id' required>
                            </div>
                        </div>


                        <div class='form-group is-empty'>
                            <label for='Password' class='col-md-2 control-label'>Password</label>

                            <div class='col-md-10'>
                                <input type='password' class='form-control' id='password' placeholder='Password' name='password' value = '1' onKeyUp='passwordmatch();'>
                            </div>
                        </div>


                        <div class='form-group is-empty'>
                            <label for='confirmPassword' class='col-md-2 control-label'>Confirm Password</label>

                            <div class='col-md-10'>
                                <input type='password' class='form-control' id='confirmPassword' placeholder='Password' name='confirm_password' onKeyUp='passwordmatch();' value = '1' >
                                <span id='confirmMessage' class='confirmMessage'></span>
                            </div>
                        </div>

                        <div class='form-group is-empty'>
                            <label for='RollNo' class='col-md-2 control-label'>Roll Number</label>
                            <div class='col-md-10'>
                                <input type='text' class='form-control' id='roll_num' placeholder='Your Roll Number: XXBXXXXXX' name='roll_num' onchange='rollnumcheck()' required>
                            </div>
                        </div>


                        <div class='form-group is-empty'>
                            <label for='EnrollNo' class='col-md-2 control-label'>Enrollment Number</label>
                            <div class='col-md-10'>
                                <input type='text' class='form-control' id='enroll_num' placeholder='Your Enrollment Number' name='enroll_num' onchange='enrollnumcheck()' required>
                            </div>
                        </div>


                        <div class='form-group'>
                            <label for='branch' class='col-md-2 control-label'>Branch</label>

                            <div class='col-md-10'>
                                <select id='branch' class='form-control' name='branch'>
                                  <option value=1 selected >B.Tech. Computer Engineering</option>
                                  <option value=2>B.Tech. Electronics And Communications Engineering</option>
                                  <option value=3>B.Tech. Mechanical Engineering</option>
                                  <option value=4>B.Tech. Civil Engineering</option>
                                  <option value=5>B.Tech. Electrical Engineering</option>
                                </select>
                            </div>
                        </div>



                        <div class='form-group'>
                            <label for='semester' class='col-md-2 control-label'>Current Semester</label>

                            <div class='col-md-10'>
                                <select id='semester' class='form-control' name='semester'>
                                  <option value='1'>1st</option>
                                  <option value='2'>2nd</option>
                                  <option value='3'>3rd</option>
                                  <option value='4'>4th</option>
                                  <option value='5'>5th</option>
                                  <option value='6'>6th</option>
                                  <option value='7'>7th</option>
                                  <option value='8'>8th</option>
                                </select>
                            </div>
                        </div>

                        <div class='form-group'>
                            <div class='col-md-10 col-md-offset-2'>
                                <a href='index.html'><button type='button' class='btn btn-default' >Cancel<div class='ripple-container'></div></button></a>
                                <span id='button_group'>
                            <button type='submit' class='btn btn-primary' id='submit_button'>Submit<div class='ripple-container'></div></button>
                            </span>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <div id='source-button' class='btn btn-primary btn-xs' style='display: none;'>&lt; &gt;</div>
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

</html>
