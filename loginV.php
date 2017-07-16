<?php
    include 'db.php';
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

    $email_id = $_POST['email_id'];
    $password = md5(md5($_POST['password']));

    $query1 = "SELECT * FROM UserBase WHERE Email = '$email_id' AND Password = '$password'";
    $result = mysqli_query($conn,$query1);
    
    if(mysqli_num_rows($result)==0){
      echo "
          <!doctype html>
          <html>
          <head>
              <meta charset='UTF-8'>
              <meta name='viewport' content='width=device-width, initial-scale=1'>
              <meta http-equiv='refresh' content='2;url=login.php' />
              <link rel='stylesheet' href='css/roboto.css' type='text/css'>
              <link href='css/MatIco.css' rel='stylesheet'>
              <link href='css/bootstrap.min.css' rel='stylesheet'>
              <link href='css/bootstrap-material-design.css' rel='stylesheet'>
              <link href='css/ripples.min.css' rel='stylesheet'>
              <link href='css/snackbar.css' rel='stylesheet'>
              <title>Error</title>
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
                      </div>
              </div>
              </div>

              <div class='jumbotron' style='text-align:center;'>
                  <h1>Email ID or Password is Incorrect</h1>
                  <h3>Redirecting You Automatically</h3>
              </div>
              <script src='js/jquery-1.10.2.min.js'></script>
              <script src='js/bootstrap.min.js'></script>
              <script src='js/ripples.min.js'></script>
              <script src='js/material.min.js'></script>
              <script src='js/snackbar.min.js'></script>
              <script src='js/jquery.nouislider.min.js'></script>
          </body>
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
    }else{
        $userInfo = mysqli_fetch_assoc($result);

        $_SESSION['status'] = $userInfo['Status'];

        $status = $_SESSION['status'];

        if($status == 2){

          $query2 = "SELECT * FROM `StudentBase` WHERE `Email` = '$email_id'";
          $result2 = mysqli_query($conn,$query2);
          $studentInfo = mysqli_fetch_assoc($result2);

          $_SESSION['first_name'] = $studentInfo['FirstName'];
          $_SESSION['roll_num'] = $studentInfo['RollNo'];
          $_SESSION['branch'] = $studentInfo['DeptId'];
          $_SESSION['semester'] = $studentInfo['Semester'];

          header("location:studentDashboard.php");
          exit(0);

        }elseif ($status == 3) {
          $query2 = "SELECT * FROM TeacherBase WHERE Email = '$email_id'";
          $result2 = mysqli_query($conn,$query2);
          $teacherInfo = mysqli_fetch_assoc($result2);

          $_SESSION['first_name'] = $teacherInfo['FirstName'];
            $_SESSION['middle_name'] = $teacherInfo['MiddleName'];
            $_SESSION['last_name'] = $teacherInfo['LastName'];
          $_SESSION['teacher_id'] = $teacherInfo['TId'];
          header('location:teacherDashboard.php');
          exit(0);
        }

    }

?>
