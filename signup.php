<?php
    require 'db.php';

    $first_name = $_REQUEST['first_name'];
    
    $middle_name = $_REQUEST['middle_name'];

    $last_name = $_REQUEST['last_name'];
    $email_id = $_REQUEST['email_id'];
    $password = md5(md5($_REQUEST['password']));
    $roll_num = $_REQUEST['roll_num'];
    $enroll_num = $_REQUEST['enroll_num'];
    $branch = (int) ($_REQUEST['branch']);
    $semester = $_REQUEST['semester'];
    $phoneNo = $_REQUEST['PhoneNo'];
  
    if($middle_name === '')
    {
        $full_name = $first_name . ' ' . $last_name;
       
       /* $query = "SELECT * FROM userbase";
        $result = $conn->query($query);
        while($row = $result->fetch_assoc())
        {
            echo $row['name']."<br>"; 
        }*/
        
        // SENDING SMS

   /*  $apikey = "33SwQCWTE0irmMdz1lga1A";
     $apisender = "TESTIN";
     $msg ="Aur Bandar Kaise ho?";
     $num = $phoneNo ;    // MULTIPLE NUMBER VARIABLE PUT HERE...!                 
 
     $ms = rawurlencode($msg);   //This for encode your message content                 		
 
     $url = 'https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey='.$apikey.'&senderid='.$apisender.'&channel=2&DCS=0&flashsms=0&number='.$num.'&text='.$ms.'&route=1';

     //echo $url;
     $ch=curl_init($url);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     curl_setopt($ch,CURLOPT_POST,1);
     curl_setopt($ch,CURLOPT_POSTFIELDS,"");
     curl_setopt($ch, CURLOPT_RETURNTRANSFER,2);
     $data = curl_exec($ch);
     echo '<br/><br/>';
     print($data);*/

         // SMS SENT
        echo "aa gaya";
        $query1 = "INSERT INTO UserBase (Name, Email, Password,PhoneNo, Status) VALUES ('$full_name','$email_id','$password','$phoneNo',2)";
        
        $query2 = "INSERT INTO StudentBase (RollNo, Email, EnrollmentNo,DeptId,Semester, FirstName, MiddleName, LastName, SNo) VALUES ('$roll_num','$email_id','$enroll_num', $branch,'$semester','$first_name',NULL,'$last_name',NULL)";
        
      //  $query2 = "INSERT INTO studentbase (roll_num, enrollment_num, email_id, branch, current_semester, first_name, middle_name, last_name) VALUES ('$roll_num','$enroll_num','$email_id','$branch','$semester','$first_name',NULL,'$last_name')";
        
    }
    else
    {
        $full_name = $first_name . ' ' . $middle_name. ' ' . $last_name;
        
        
        $query1 = "INSERT INTO UserBase (Name, Email, Password,PhoneNo, Status) VALUES ('$full_name','$email_id','$password','$phoneNo',2)";
        
        $query2 = "INSERT INTO StudentBase (RollNo, Email, EnrollmentNo,DeptId,Semester, FirstName, MiddleName, LastName, SNo) VALUES ('$roll_num','$email_id','$enroll_num', $branch,'$semester','$first_name','$middle_name','$last_name',NULL)";
                
        
        //$query2 = "INSERT INTO studentbase (roll_num, enrollment_num, email_id, branch, current_semester, first_name, middle_name, last_name) VALUES ('$roll_num','$enroll_num','$email_id','$branch','$semester','$first_name','$middle_name','$last_name')";
        
    }
    
    if(!$conn->query($query1)){
        echo "
            <!doctype html>
            <html>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
              <!--  <meta http-equiv='refresh' content='3;url=index.html'/> -->
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
                    <h1>Error in registering you.</h1>
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
    }elseif(!$conn->query($query2)){
        echo "
            <!doctype html>
            <html>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
              <!--  <meta http-equiv='refresh' content='3;url=index.html' --> />
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
                    <h1>Error in registering you.</h1>
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
        $query1 = "DELETE FROM `UserBase` WHERE `Email` = '$email_id'";
        mysqli_query($conn, $query1);
        
    }
    else{
        //Student Log In Successful. Start a session and redirect to student dashboard
        session_start();
        $_SESSION['status'] = 2;
        $_SESSION['first_name']=$first_name;
        $_SESSION['semester']=$semester;
        $_SESSION['branch']=$branch;
        $_SESSION['roll_num'] = $roll_num;
        $query = "SELECT SubjectCode FROM Subjects WHERE Semester = '$semester' AND NOT TId = 'NULL'";
        $result = mysqli_query($conn, $query);
        
        while($rows = mysqli_fetch_assoc($result))
        {
            $table = $rows['SubjectCode'];
            $query_add = "INSERT INTO $table (RollNo) VALUES ('$roll_num') ";
            $result2 = mysqli_query($conn,$query_add);
        }
        
        
        
        header('location:studentDashboard.php');
    }

?>