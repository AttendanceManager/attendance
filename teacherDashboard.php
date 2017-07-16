<?php
    include 'db.php';
    session_start();
    #echo "Session Started";
    if(!isset($_SESSION['status'])){
        $_SESSION['status']=0;
        $status = $_SESSION['status'];
        header('location:index.php');
        exit(0);
    }
    else{
        $status = $_SESSION['status'];
        if($status == 2){
            header('location:studentDashboard.php');
            echo "$status";
            exit(0);

        }elseif($status == 0){
            header('location:index.php');
            echo "$status";
            exit(0);
        }
    }


        $status =$_SESSION['status'];
        $first_name =$_SESSION['first_name'];
        $teacher_id = $_SESSION['teacher_id'];
        $middle_name = $_SESSION['middle_name'];
        $last_name = $_SESSION['last_name'];

        $first_name = $first_name.' '.$middle_name;

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
          <link href='css/responsivetable.css' rel='stylesheet'>
          <title>Teacher Dashboard</title>
          <script>
              function subject_acc_to_sem(){
                  var sem = document.getElementById('semesterSelect').value;
                  
                  if (window.XMLHttpRequest) {

                      xmlhttp = new XMLHttpRequest();
                  } else {

                      xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
                  }
                  var res_text;
                  xmlhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                          document.getElementById('subjectSelect').innerHTML = this.responseText;
                      }
                  };
                  xmlhttp.open('GET','teacherBackend.php?req='+1+'&semester='+sem,true);
                  xmlhttp.send();
              }
              
              
              
              function load_complete_list(){
                    var sem = document.getElementById('semesterSelect').value;
                    var SubjectCode = document.getElementById('subjectSelect').value;
                    var tabData = '<tr><th>Date </th><td>Content One</td><td>Longer Content Two</td><td>Third Content Contains More</td>                                    <td>Short Four</td><td>Standard Five</td>                                    <td>Who\'s Counting</td></tr> <tr><th>lolo</th><td>12</td><td>12</td><td>12</td><td>12</td><td>12</td><td>12</td></tr><tr><th>lolo</th><td>12</td><td>12</td><td>12</td><td>12</td><td>12</td><td>12</td></tr><tr><th>lolo</th><td>12</td><td>12</td><td>12</td><td>12</td><td>12</td><td>12</td></tr>';
                    
                  if (window.XMLHttpRequest) {

                       xmlhttp2 = new XMLHttpRequest();
                  } else {

                      xmlhttp2 = new ActiveXObject('Microsoft.XMLHTTP');
                  }
                   xmlhttp2.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                            document.getElementById('tabAttendance').innerHTML = this.responseText;
                      }
                  };
                  xmlhttp2.open('GET','teacherBackend.php?req='+4+'&semester='+sem+'&SubjectCode='+SubjectCode,true);
                  xmlhttp2.send();    
              }
              
              
              
              function add_subject_acc_to_sem()
              {
                    var sem = document.getElementById('addSemesterSelect').value;
                  if (window.XMLHttpRequest) {

                       xmlhttp2 = new XMLHttpRequest();
                  } else {

                      xmlhttp2 = new ActiveXObject('Microsoft.XMLHTTP');
                  }
                   xmlhttp2.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                       document.getElementById('addSubjectSelect').innerHTML = this.responseText;
                      }
                  };
                  xmlhttp2.open('GET','teacherBackend.php?req='+2+'&semester='+sem,true);
                  xmlhttp2.send();   
              }
              function registerSubject(){
                    var sem = document.getElementById('addSemesterSelect').value;
                    var SubjectCode = document.getElementById('addSubjectSelect').value;
                    
                    if (window.XMLHttpRequest) {

                       xmlhttp2 = new XMLHttpRequest();
                  } else {

                      xmlhttp2 = new ActiveXObject('Microsoft.XMLHTTP');
                  }
                   xmlhttp2.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                       document.getElementById('msg_backend_register').innerHTML = this.responseText;
                      }
                  };
                  xmlhttp2.open('GET','teacherBackend.php?req='+3+'&semester='+sem+'&SubjectCode='+SubjectCode,true);
                  xmlhttp2.send(); 
              }

              function attendance_of_month(){
                  var subject = document.getElementById('subjectSelect').value;
                  var sem = document.getElementById('semesterSelect').value;
                  var month = arguments[0];
                  var win = window.open('showAttendanceOfMonth.php?month='+month+'&subject='+subject+'&semester='+sem, '_blank');                
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
                          <ul class='nav navbar-nav navbar-left'>
                              <li  class='active'><a data-toggle='tab' href='#ManualAttendance'>Manual Attendance <span class='badge'></span></a></li>	
                              <li><a data-toggle='tab' href='#AddAssignment'>Add Assignment <span class='badge'></span></a></li>
                              <li><a data-toggle='tab' href='#AddASubject'>Add A Subject <span class='badge'></span></a></li>
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
              <h1>Welcome $first_name </h1>
              <h3>TEACHER'S DASHBOARD</h3>
          </div>

          <div class='jumbotron bs-component' id='testfield' style='text-align:center;'>

          </div>

          <div class='tab-content row'>";
           echo " 
           <div id='AddAssignment' class='tab-pane fade'>
                <div class='jumbotron' style='text-align:center;'>
                    <h3>We'll Be Available Soon</h3>
                </div>
            </div>
           <div id='ManualAttendance' class='tab-pane fade in active'>
                  <div class='jumbotron' style='text-align:center;'>
                      <div class='col-md-4'></div>
                      <div class='col-md-4'>
                          <form class='form-horizontal' style='background-color:white;'>
                              <fieldset>
                                  <legend >
                                      Choose a semester and a subject:
                                  </legend>
                                  <div class='form-group'>
                                      <label for='semesterSelect' class='col-md-4'>Semester :</label>
                                      <div class='col-md-4'>
                                          <select id='semesterSelect' class='form-control' onchange='subject_acc_to_sem();'>
                                            <option value=0>Select</option>";

           
          $query_to_get_semesters_taught = "SELECT DISTINCT Semester FROM Subjects WHERE TId = '$teacher_id' ORDER BY Semester";
          $result = mysqli_query($conn,$query_to_get_semesters_taught);
          while($rows = mysqli_fetch_assoc($result)){
            $semester_value = $rows['Semester'];
            echo "
                  <option value=$semester_value>$semester_value</option>
              ";
          }            
             echo "  </select>
                      </div>
                        </div>";
            
            echo"    <div class='form-group'>
                          <label for='subjectSelect' class='col-md-4'>Subject :</label>
                          <div class='col-md-4'>
                              <select id='subjectSelect' class='form-control'>
                              <option value=0 selected>Select</option>
                              </select>
                          </div>
                        </div>
                        <button type='button' class='btn btn-primary' id = 'btn-load-list' onclick='load_complete_list();'>Open The List</button>
                       
          </fieldset>
                      </form>
                    </div>
                  </div>
                  <br>
                  </div>";
//yaha se

           echo "   
           <div id='AddASubject' class='tab-pane fade>
                  <div class='jumbotron' style='text-align:center;'>
                      <div class='col-md-4'></div>
                      <div class='col-md-4'>
                          <form class='form-horizontal' style='background-color:white;'>
                              <fieldset>
                                  <legend >
                                      Choose a semester and a subject:
                                  </legend>
                                  <div class='form-group'>
                                      <label for='semesterSelect' class='col-md-4'>Semester :</label>
                                      <div class='col-md-4'>
                                        <select id='addSemesterSelect' class='form-control' onchange='add_subject_acc_to_sem();'>
                                            <option value=0>Select</option>
                                            <option value=1>1</option>
                                            <option value=2>2</option>
                                            <option value=3>3</option>
                                            <option value=4>4</option>
                                            <option value=5>5</option>
                                            <option value=6>6</option>
                                            <option value=7>7</option>
                                            <option value=8>8</option>
                                            
                                        </select>
                      </div>
                        </div>
                        <div class='form-group'>
                          <label for='subjectSelect' class='col-md-4'>Subject :</label>
                          <div class='col-md-4'>
                              <select id='addSubjectSelect' class='form-control'>
                              <option value=0 selected>Select</option>
                              </select>
                          </div>
                        </div>
                        <button type='button' class='btn btn-primary' onclick = 'registerSubject();' id = 'btn-register'>Register</button>
                        <div id = 'msg_backend_register'>  </div>
                       
          </fieldset>
                      </form>
                    </div>
                  </div>
                  <br>
                  </div>";

echo "      
        </div>     
        <div class='jumbotron' id ='class_list_uneditable'>
            <div class='container-fluid'>
                <div class='col-md-2'></div>
                <div class='col-md-8 col-sm-10 col-xs-9'>
                    <div class='scrolling'>
                        <div class='inner' >";

echo"                       <table class='table table-striped table-hover table-condensed'                                         id='tabAttendance'>
                               <!--  <tr>
                                    <th>Date </th>
                                    <td>Content One</td>
                                    <td>Longer Content Two</td>
                                    <td>Third Content Contains More</td>
                                    <td>Short Four</td>
                                    <td>Standard Five</td>
                                    <td>Who's Counting</td>
                                </tr>
                                <tr>
                                    <th>lolo</th>
                                    <td>12</td>
                                    <td>12</td>
                                    <td>12</td>
                                    <td>12</td>
                                    <td>12</td>
                                    <td>12</td>
                                </tr>
                                <tr>
                                    <th>lolo</th>
                                    <td>12</td>
                                    <td>12</td>
                                    <td>12</td>
                                    <td>12</td>
                                    <td>12</td>
                                    <td>12</td>
                                </tr>
                                <tr>
                                    <th>lolo</th>
                                    <td>12</td>
                                    <td>12</td>
                                    <td>12</td>
                                    <td>12</td>
                                    <td>12</td>
                                    <td>12</td>
                                </tr> -->
                            </table>
                        </div>
                    </div>
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
