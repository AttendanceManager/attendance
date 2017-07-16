<?php

  include 'db.php';
  session_start();
  $status = $_SESSION['status'];
  $first_name = $_SESSION['first_name'];
  $teacher_id = $_SESSION['teacher_id'];

  $request_code = $_GET['req'];

if($request_code == 1)
{
    $semester_value = $_GET['semester'];
    //echo "$semester_value";
    $query_to_get_subjects_taught = "SELECT * FROM Subjects WHERE TId = '$teacher_id' AND Semester = $semester_value";
    echo "<option value=0>Select</option>";
    $result = mysqli_query($conn,$query_to_get_subjects_taught);
    while($rows = mysqli_fetch_assoc($result))
    {
      $subject_code = $rows['SubjectCode'];
      $subject_name = $rows['SubjectName'];
      echo "<option value='$subject_code'>$subject_name</option>";
    }
}
else if($request_code ==2 )
{
    $semester_value = $_GET['semester'];
    //echo "$semester_value";
    $query_to_get_subjects_taught = "SELECT * FROM Subjects WHERE Semester = $semester_value";
      echo "<option value=0>Select</option>";
    $result = mysqli_query($conn,$query_to_get_subjects_taught);
    while($rows = mysqli_fetch_assoc($result))
    {
      $subject_code = $rows['SubjectCode'];
      $subject_name = $rows['SubjectName'];
      echo "<option value='$subject_code'>$subject_name</option>";

    }
}
else if($request_code ==3 )
{  
    $Code = $_GET["SubjectCode"];
    $semester_value = $_GET['semester'];
    //echo "$semester_value";
    $query_to_register = "UPDATE Subjects SET TId = '$teacher_id' WHERE Semester = $semester_value AND SubjectCode = '$Code'" ;
    $result = mysqli_query($conn,$query_to_register);

    if($result)
    {         
        $query_table = " CREATE TABLE $Code ( RollNo VARCHAR(15) NOT NULL UNIQUE, FOREIGN KEY(RollNo) REFERENCES StudentBase(RollNo) )";
        $result = mysqli_query($conn,$query_table);         

        if($result)
        {
            // add students
            $result2 = "";
            $query_add = "SELECT RollNo FROM StudentBase WHERE Semester = $semester_value";
            $result = mysqli_query($conn,$query_add);
            while($rows = mysqli_fetch_assoc($result)){
                $roll = $rows['RollNo'];
                $query_add = "INSERT INTO $Code (RollNo) VALUES ('$roll') ";
                $result2 = mysqli_query($conn,$query_add);

            }

            if($result)
            {
                echo "Registered succesfully";
            }
        }
         else
             echo "error";
    }
    else
        echo "Error while registering";
}
else if($request_code == 4)
{
    $Semester = $_GET['semester'];
    $SubjectCode = $_GET['SubjectCode'];
    $Month = array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
    
  //  echo "<tr><th>Date </th><td>Content One</td><td>Longer Content Two</td><td>Third Content Contains More</td><td>Short Four</td><td>Standard Five</td><td>Who's Counting</td></tr> <tr><th>lolo</th><td>12</td><td>12</td><td>12</td><td>12</td><td>12</td><td>12</td></tr><tr><th>lolo</th><td>12</td><td>12</td><td>12</td><td>12</td><td>12</td><td>12</td></tr><tr><th>lolo</th><td>12</td><td>12</td><td>12</td><td>12</td><td>12</td><td>12</td></tr>";
    
    $query = "SELECT COLUMN_NAME 
    FROM INFORMATION_SCHEMA.COLUMNS
    WHERE TABLE_NAME = '$SubjectCode' AND TABLE_SCHEMA='AttendanceManager'";

    
    //$query = "SELECT * FROM $SubjectCode";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $j = -1;
    $p = 0;
    $AttendMonth = array();
    $NoOfDaysInMonth = array();
    $Classes = array();
    $ClassesMonth = array();
    $TDArray = array(array());
    $m = 1; $n = 1;
    
    while($row = $result->fetch_assoc())
    {
        $AttendMonth[++$j] = substr($row['COLUMN_NAME'],4,2);
        $Classes[$j] = (int)substr($row['COLUMN_NAME'],-1);
    }
        
   // $AttendMonth = array(1,1,1,1,2,2,2,4,4,4,4,5,5,6);
   // echo $j."<br>";
    $ctr = 1;
    $sumClass = $Classes[0];
    //echo "j=$j<br>";
    for( $i = 1;$i<=$j;$i++)
    {
        //echo $AttendMonth[$i]."<br>";
        if($AttendMonth[$i] == $AttendMonth[$i-1])
        {
            $ctr++;
            $sumClass += $Classes[$i];
        }
        else
        {
            $NoOfDaysInMonth[$p] = $ctr;
            $ClassesMonth[$p++] = $sumClass;
            $sumClass = $Classes[$i];
            $ctr = 1;
        }
    }
    $NoOfDaysInMonth[$p] = $ctr;
    $ClassesMonth[$p++] = $sumClass;
    $TDArray[0][0] = "Roll No/Month";
    //echo "p = $p<br>";
    $l = 1;
    
    for($i = 1;$i <= $j;)
    {
        $TDArray[0][$l] = $AttendMonth[$i-1];
        $i  += $NoOfDaysInMonth[$l-1];
        $l++;
    }
   // echo "l = $l<br>";
    
    $query = "SELECT * FROM $SubjectCode";
    $result = $conn->query($query);
    while($rows = $result->fetch_assoc())
    {
        $RollNo = $rows['RollNo'];
        $rows = array_values($rows);
        $r = count($rows);
        $l = 0;
        $n = 0;
        
        $TDArray[$m][0] = trim($rows[0]); 
        for($i = 1;$i < $r; )
        {   
            $sum = 0;
            //echo $NoOfDaysInMonth[$l]." ";
            
            for($j=0;$j<$NoOfDaysInMonth[$l];$j++)
            {
                $sum += $rows[$i+$j];
            }
            
            $TDArray[$m][++$n] = $sum; 
            $i += $NoOfDaysInMonth[$l];
            $l++;
        }
        $m++;
    }
    //echo "m= $m n = $n<br>";
    
        echo "<tr>";
        echo "<th align='center'>";
            echo $TDArray[0][0];
             echo "</th>";    
        for($j=1;$j<=$n;$j++)
        {
            $val = $TDArray[0][$j];
            echo "<td align='center' id = 'month' onclick = 'attendance_of_month($val)'; onMouseOver=this.style.cursor='pointer' ><b>";
            echo $Month[$TDArray[0][$j]]."(".$ClassesMonth[$j-1].")";
             echo "</b></td>";
        }
        echo "</tr>";
    for($i=1;$i<$m;$i++)
    {
        echo "<tr>";
        echo "<th align='center'>";
            echo $TDArray[$i][0];
             echo "</th>";    
        for($j=1;$j<=$n;$j++)
        {
            echo "<td align='center'>";
            echo $TDArray[$i][$j];
             echo "</td>";
        }
        echo "</tr>";
    }
}
         
?>
