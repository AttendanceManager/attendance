<?php
    session_start();
    include 'db.php';
    
    if(!isset($_SESSION['status'])){
        $_SESSION['status']=0;
        header('location:login.php');
        exit(0);
    }
    else{
        $status = $_SESSION['status'];
        if($status == 3){
            header('Location: teacherDashboard.php');

        }elseif($status == 0){
            header('location:login.php');
        }
    }
    $first_name = ucfirst(strtolower($_SESSION['first_name']));
    $roll_num = $_SESSION['roll_num'];
    $branch = $_SESSION['branch'];
    $semester = $_SESSION['semester'];

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
    <title>Student Dashboard</title>

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
                    <ul class='nav navbar-nav navbar-left'>
                        <li class='active'><a data-toggle='tab' href='#Attendance'>Attendance <span class='badge'></span></a></li>
                        <li><a data-toggle='tab' href='#Syllabus'>Syllabus <span class='badge'></span></a></li>
                        <li><a data-toggle='tab' href='#ImpDates'>Important Dates <span class='badge'></span></a></li>
                        <li><a data-toggle='tab' href='#Assignments'>Assignments <span class='badge'></span></a></li>
                        <li><a data-toggle='tab' href='#ResultManager'>Result Manager <span class='badge'></span></a></li>
                    </ul>
                    <ul class='nav navbar-nav navbar-right'>
                        <li><a href='test.php'>LogOut <span class='glyphicon glyphicon-log-out'></span><div class='ripple-container'></div></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--BODY-->
    <div class='jumbotron bs-component' style='text-align:center;'>
        <h1>$first_name 's Dashboard</h1>
    </div>
    <div class='tab-content'>
        <div id='Attendance' class='tab-pane fade in active'>
            <div class='jumbotron' style='text-align:center;'>
                <h3>Your Attendance For This Semester :</h3>
            </div>";

    $query_to_get_subjects_for_the_semester = "SELECT * FROM Subjects WHERE Semester = $semester AND DeptId = $branch AND NOT TId = 'NULL'";
    $result = mysqli_query($conn,$query_to_get_subjects_for_the_semester);
   
       // echo mysqli_num_rows($result)."<br>";
      $aggregate = 0;
      $total_lectures=0;
      while($row = mysqli_fetch_assoc($result)){
        $subject_code = $row['SubjectCode'];
        $subject_name = $row['SubjectName'];
        $total_classes = $row['NumOfClass'];
        $total_lectures += $total_classes;
          //echo $subject_code."<br>";
        if($total_classes == 0){
          echo "<div class='col-md-4'>
                  <div class='panel panel-success'>
                      <div class='panel-heading'>
                          <h3 class='panel-title'>$subject_name</h3>
                      </div>
                      <div class='panel-body'>
                          <b>Not Taken</b>
                          <br>
                          <div class='progress'>
                              <div class='progress-bar progress-bar-success' style='width: 100%'></div>
                          </div>
                      </div>
                  </div>
              </div>
              ";
        }
      
      else{
          $query_to_get_classes_attended_for_the_subject = "SELECT * FROM `$subject_code` WHERE `RollNo`= '$roll_num'";
          $result2 = mysqli_query($conn,$query_to_get_classes_attended_for_the_subject);
          $row = mysqli_fetch_assoc($result2);
          $sum=0;
          foreach ($row as $Attendance) {
            if ($Attendance == 1) {
              $sum++;
              $aggregate++;
            }
          }
          $percentage = $sum * 100 / $total_classes;

          if($percentage > 75){
            echo "<div class='col-md-4'>
                <div class='panel panel-success'>
                    <div class='panel-heading'>
                        <h3 class='panel-title'>$subject_name</h3>
                    </div>
                    <div class='panel-body'>
                        <b>$percentage %</b>
                        <br>
                        <div class='progress'>
                            <div class='progress-bar progress-bar-success' style='width: $percentage%'></div>
                        </div>
                    </div>
                </div>
            </div>";
          }elseif ($percentage > 40) {
            echo "
              <div class='col-md-4'>
                  <div class='panel panel-warning'>
                      <div class='panel-heading'>
                          <h3 class='panel-title'>$subject_name</h3>
                      </div>
                      <div class='panel-body'>
                          <b>$percentage %</b>
                          <br>
                          <div class='progress'>
                              <div class='progress-bar progress-bar-warning' style='width: $percentage%'></div>
                          </div>
                      </div>
                  </div>
              </div>
            ";
          }else{
            echo "<div class='col-md-4'>
                <div class='panel panel-danger'>
                    <div class='panel-heading'>
                        <h3 class='panel-title'>$subject_name</h3>
                    </div>
                    <div class='panel-body'>
                        <b>$percentage %</b>
                        <br>
                        <div class='progress'>
                            <div class='progress-bar progress-bar-danger' style='width: $percentage%'></div>
                        </div>
                    </div>
                </div>
            </div>";
          }
        }

      }
        
      @$aggregate_percentage = 50 ;//$aggregate * 100 / $total_lectures;

      if($aggregate_percentage > 75){
        echo "<div class='col-md-12'>
            <div class='panel panel-success'>
                <div class='panel-heading'>
                    <h3 class='panel-title'>Aggregate</h3>
                </div>
                <div class='panel-body'>
                    <b>$aggregate_percentage %</b>
                    <br>
                    <div class='progress'>
                        <div class='progress-bar progress-bar-success' style='width: $aggregate_percentage%'></div>
                    </div>
                </div>
            </div>
        </div>";
      }elseif ($aggregate_percentage > 40) {
        echo "
          <div class='col-md-12'>
              <div class='panel panel-warning'>
                  <div class='panel-heading'>
                      <h3 class='panel-title'>Aggregate</h3>
                  </div>
                  <div class='panel-body'>
                      <b>$aggregate_percentage %</b>
                      <br>
                      <div class='progress'>
                          <div class='progress-bar progress-bar-warning' style='width: $aggregate_percentage%'></div>
                      </div>
                  </div>
              </div>
          </div>
        ";
      }else{
        echo "

          <div class='col-md-12'>
            <div class='panel panel-danger'>
                <div class='panel-heading'>
                    <h3 class='panel-title'>Aggregate</h3>
                </div>
                <div class='panel-body'>
                    <b>$aggregate_percentage %</b>
                    <br>
                    <div class='progress'>
                        <div class='progress-bar progress-bar-danger' style='width: $aggregate_percentage%'></div>
                    </div>
                </div>
            </div>
        </div>";
      }
//echo "</div></div>";
echo"  </div></div>
        <div id='Syllabus' class='tab-pane fade'>
            <div class='col-md-4'>
                <div class='panel panel-default'>
                  <div class='panel-body' style='text-align:center;'>
                    <a href='#'>{SUBJECT 1}</a>
                  </div>
                </div>
            </div>
            <div class='col-md-4'>
                <div class='panel panel-default'>
                  <div class='panel-body' style='text-align:center;'>
                      <a href='#'>{SUBJECT 2}</a>
                  </div>
                </div>
            </div>
            <div class='col-md-4'>
                <div class='panel panel-default'>
                  <div class='panel-body' style='text-align:center;'>
                    <a href='#'>{SUBJECT 3}</a>
                  </div>
                </div>
            </div>
            <div class='col-md-4'>
                <div class='panel panel-default'>
                  <div class='panel-body' style='text-align:center;'>
                    <a href='#'>{SUBJECT 4}</a>
                  </div>
                </div>
            </div>
            <div class='col-md-4'>
                <div class='panel panel-default'>
                  <div class='panel-body' style='text-align:center;'>
                    <a href='#'>{SUBJECT 5}</a>
                  </div>
                </div>
            </div>
            <div class='jumbotron' style='text-align:center;'>
                <h3>We'll Be Available Soon</h3>
            </div>

        </div>
        <div id='ImpDates' class='tab-pane fade'>
            <div class='jumbotron' style='text-align:center;'>
                <h2>Important Dates For Semester {Sem}</h2>
                <h3>Sessional 1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; {Date}</h3>
                <h3>Sessional 2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; {Date}</h3>
                <h3>End Semester&nbsp;:&nbsp; {Date}</h3>

            </div>
            <div class='jumbotron' style='text-align:center;'>
                <h3>We'll Be Available Soon</h3>
            </div>
        </div>
        <div id='Assignments' class='tab-pane fade'>
            <div class='jumbotron' style='text-align:center;'>
                <h3>We'll Be Available Soon</h3>
            </div>
        </div>
        <div id='ResultManager' class='tab-pane fade'>
            <div class='jumbotron' style='text-align:center;'>
                <h3>We'll Be Available Soon</h3>
            </div>
        </div>
    </div>";
echo"
    <script src='js/jquery-1.10.2.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src='js/ripples.min.js'></script>
    <script src='js/material.min.js'></script>
    <script src='js/snackbar.min.js'></script>
    <script src='js/jquery.nouislider.min.js'></script>

</body>
<hr>
<footer class='bscomponent navbar navbar-fixed-bottom navbar-danger'>

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
";
?>
