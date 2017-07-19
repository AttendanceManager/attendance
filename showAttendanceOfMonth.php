
<?php
    include 'db.php';
    $month = $_GET['month'];
    $SubjectCode = $_GET['subject'];
    $Semester = $_GET['semester'];
    if($month < 10)
        $month = "0".(string)$month;
    else
        $month = (string)$month;        
    $Month = array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
    
    $mon = $month;
    $month = $Month[$month];
    echo "<head>
      <meta charset='UTF-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1'>
      <link rel='stylesheet' href='css/roboto.css' type='text/css'>
      <link href='css/MatIco.css' rel='stylesheet'>
      <link href='css/bootstrap.min.css' rel='stylesheet'>
      <link href='css/bootstrap-material-design.css' rel='stylesheet'>
      <link href='css/ripples.min.css' rel='stylesheet'>
      <link href='css/snackbar.css' rel='stylesheet'>
      <link href='css/responsivetable.css' rel='stylesheet'>
      
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
                <!--    <ul class='nav navbar-nav navbar-right'>
                        <li><a href='signUPForm.php'>SignUP <span class='glyphicon glyphicon-ok'></span><div class='ripple-container'></div></a></li>
                        <li><a href='login.php'>LogIn <span class='glyphicon glyphicon-log-in'></span><div class='ripple-container'></div></a></li>
                    </ul> -->
                    <ul class='nav navbar-nav navbar-right'>
                              <li><a href='test.php'>LogOut <span class='glyphicon glyphicon-log-out'></span><div class='ripple-container'></div></a></li>
                          </ul>
                </div>
            </div>
        </div>
    </div>
    <div class='jumbotron' id ='class_list_uneditable'>
        <div class='container-fluid'>
            <div class='col-md-2'></div>
            <div class='col-md-8 col-sm-10 col-xs-9'>
               "; 
if($Semester == 0)
    {
        echo "<center> <h2>You need to select a Semester and a Subject.</h2> </center>";
    }
    else if($SubjectCode =='0')
    {
        echo "<center> <h2>Please select a Subject.</h2> </center>";
    }
    else
    {
            
    echo "<h4><b>".$month." Attendance</b></h4>";
    echo "<h5>Semester : ".$Semester." </h5>";
        
    $query = "SELECT SubjectName FROM Subjects WHERE SubjectCode = '$SubjectCode'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $Subject = $row['SubjectName'];
    
    echo "<h5>Subject : $Subject</h5><br>";
     echo   " <div class='scrolling'>
                    <div class='inner' >

                       <table class='table table-striped table-hover table-condensed'                                         id='tabAttendance'>
";
                
    
        
    $query = "SELECT COLUMN_NAME 
    FROM INFORMATION_SCHEMA.COLUMNS
    WHERE TABLE_NAME = '$SubjectCode' AND TABLE_SCHEMA='AttendanceManager'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    
    $TDArray = array(array());
    $NClasses = array();
    $NClasses[0] = ""; $NClasses[1] = "";
    $TDArray[0][0] = "Roll No";
    $TDArray[0][1] = "Name";
    $m = 1;
    $j = 0;
    while($row = $result->fetch_assoc())
    {
        //echo $row['COLUMN_NAME']."<br>"; 
        if(substr($row['COLUMN_NAME'],4,2) == $mon)
        {
            ++$j;
            $num = (int)substr($row['COLUMN_NAME'],1,2);
            $nClass = (int)substr($row['COLUMN_NAME'],-1);
            if($num %10 == 1)
            {
                $TDArray[0][++$m] = (string)$num."st";
            }
            else if($num %10 == 2)
            {
                $TDArray[0][++$m] = (string)$num."nd";
            }
            else if($num %10 == 3)
            {
                $TDArray[0][++$m] = (string)$num."rd";
            }
            else
                $TDArray[0][++$m] = (string)$num."th";
            $NClasses[$m] = $nClass;
            //$TDArray[0][$m] .=  "(".T($nClass).")";
            break;
        }
        else
            ++$j;
    }
    $first = $j;
    while($row = $result->fetch_assoc())
    {
        //echo $row['COLUMN_NAME']."<br>";
        if(substr($row['COLUMN_NAME'],4,2) == $mon)
        {
            //$TDArray[0][++$m] = (int)substr($row['COLUMN_NAME'],1,2);
            ++$j;
            $num = (int)substr($row['COLUMN_NAME'],1,2);
            $nClass = (int)substr($row['COLUMN_NAME'],-1);
            if($num %10 == 1)
            {
                $TDArray[0][++$m] = (string)$num."st";
            }
            else if($num %10 == 2)
            {
                $TDArray[0][++$m] = (string)$num."nd";
            }
            else if($num %10 == 3)
            {
                $TDArray[0][++$m] = (string)$num."rd";
            }
            else
                $TDArray[0][++$m] = (string)$num."th";
            $NClasses[$m] = $nClass;
            //$TDArray[0][$m] .= "(".T($nClass).")";
        }
        else
            break;
    }    
    $n =0;$m = 1;
    $query = "SELECT * FROM $SubjectCode";
    $result = $conn->query($query);
    while($row = $result->fetch_assoc())
    {
        $m = 1;
        $row = array_values($row);
        $TDArray[++$n][0] = $row[0];
        
        $qName = "SELECT FirstName, MiddleName, LastName FROM StudentBase WHERE RollNo = '$row[0]'";
        $rName = $conn->query($qName)->fetch_assoc();
        
        $TDArray[$n][1] = $rName['FirstName']." ".$rName['MiddleName']." ".$rName['LastName'];
        for($i = $first;$i<=$j;$i++)
        {      
            $TDArray[$n][++$m] = $row[$i];
        }
    }
   // echo $n." ".$m."<br>";
       echo "<tr>";
        echo "<th align='center'>";
            echo $TDArray[0][0];
             echo "</th>";
        echo "<td align='center'><b>";
            echo $TDArray[0][1];
             echo "</b></td>";
        for($j=2;$j<=$m;$j++)
        {
            $val = $TDArray[0][$j]."(".T($NClasses[$j]).")";
            echo "<td align='center'><b>";
            echo $TDArray[0][$j]."(".T($NClasses[$j]).")";
             echo "</b></td>";
        }
        echo "</tr>";
    for($i=1;$i<=$n;$i++)
    {
        echo "<tr>";
        echo "<th align='center'>";
            echo $TDArray[$i][0];
             echo "</th>";
        echo "<td align='center'><b>";
            echo $TDArray[$i][1];
             echo "<b></td>";
        for($j=2;$j<=$m;$j++)
        {
            echo "<td align='center'>";
            $str = "";
            for($a = 0;$a<$TDArray[$i][$j];$a++)
                $str .= "P";
            $t = $NClasses[$j] - $TDArray[$i][$j];
            for($a = 0;$a<$t;$a++)
                $str .= "A";
            
            echo $str;
            echo "</td>";
        }
        echo "</tr>";
    }                          
    }

   echo " </table>
                    </div>
                </div>
                <form method='get' action='pdf.php' target='_blank'>
                    <input type='hidden' name='Code' value = $SubjectCode>
                    <input type='hidden' name ='Mon' value = $mon>
                <input type='SUBMIT' value='Save PDF' >
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

function T($n)
{
    $str = "";
    for($i = 0;$i<$n;$i++)
    {
        $str .= "T";
    }
    return $str;
}
?>
    