<?php
require 'db.php';

//$JSONstr = file_get_contents('php://input');
$JSONstr ='{
                "RollNo":"15BCS0035",
                "SubjectName":"Data Structures and Programming"
           }';

class resp 
{
    function resp()
    {
        $this->RollNo = null;
        $this->Subject = null;
        $this->TeacherName = null;
        $this->Attendance = array();
        $this->ErrorCode = 0;        
        $this->Message = null;
    }
}
class Attend
{
    function Attend()
    {
        $this->Month = null;
        $this->Date = array();
        $this->Present = array();
    }
}

$response = new resp();
/*
for($i = 0;$i<3;$i++)
{
    $atten = new Attend();
    $response->Attendance[$i] = $atten;
}
*/

$myObj = json_decode($JSONstr);
$RollNo = trim($myObj->RollNo);
$SubjectName = trim($myObj->SubjectName);

$rowCol = array();

$response->RollNo = $RollNo;
$query = "SELECT SubjectCode, TId FROM Subjects WHERE SubjectName = '$SubjectName'";
$result = $conn->query($query);
if($result)
{
    $row = $result->fetch_assoc();
    $SubjectCode = $row['SubjectCode'];
    $response->Subject =  $SubjectName;
    $TId = $row['TId'];
    if($TId != null)
    {
        $qTeacher = "SELECT FirstName, MiddleName, LastName FROM TeacherBase WHERE TId = '$TId'";
        $resTeacher = $conn->query($qTeacher);

        if($resTeacher)
        {
            $rowTName = $resTeacher->fetch_assoc();
            if($rowTName['MiddleName'] == null)
                $TeacherName = $rowTName['FirstName']." ".$rowTName['LastName'];
            else
                $TeacherName = $rowTName['FirstName']." ".$rowTName['MiddleName']." ".$rowTName['LastName'];
            $response->TeacherName = $TeacherName;
        }
        $qAttend = "SELECT * FROM $SubjectCode WHERE RollNo = '$RollNo'";
        $resAttend = $conn->query($qAttend);
        if($resAttend)
        {
            $rowAttend = $resAttend->fetch_assoc();
            $rowAttend = array_values($rowAttend);        
            //echo count($rowAttend);
        }
        
        $qCol = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$SubjectCode' AND TABLE_SCHEMA='AttendanceManager'";
        
        $j = -1;
        
        $Month = array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
    
        $resCol = $conn->query($qCol);
        while($row = $resCol->fetch_assoc())
        {
            $rowCol[++$j] = $row['COLUMN_NAME'];
        }
        
        for($i = 0;$i<=$j;$i++)
        {
            //echo $rowCol[$i];
        }
        //echo "<br>";
        for($i = 1;$i<count($rowAttend);$i++)
        {
        //   echo $rowAttend[$i];
        }        
        $n = count($rowAttend);
        
        $TDArray = array(array());
        $q = -1;
        $ctr = 1;
        $mon = substr($rowCol[1],4,2);
        $day = substr($rowCol[1],1,2);
        $tot = (int)substr($rowCol[1],-1);
        $sum = $rowAttend[1];
        for($i = 2;$i < $n;$i++)
        {
            if(substr($rowCol[$i],4,2) == $mon && substr($rowCol[$i],1,2) == $day)
            {
                $tot += (int)substr($rowCol[$i],-1);
                $sum += $rowAttend[$i];
                $ctr++;
            }
            else
            {
                $TDArray[0][++$q] = $mon."_".$day."_".$tot;
                $TDArray[1][$q] = $sum;
                $sum = $rowAttend[$i];
                $tot = (int)substr($rowCol[$i],-1);
                //echo $ctr;
                $ctr = 1;
                $mon = substr($rowCol[$i],4,2);
                $day = substr($rowCol[$i],1,2);
            }
        }
        //echo $ctr;
        $TDArray[0][++$q] = $mon."_".$day."_".$tot;
        $TDArray[1][$q] = $sum;
        /*for($i = 0;$i < 2;$i++)
        {
            for($j = 0;$j<=$q;$j++)
            {
                echo $TDArray[$i][$j]." ";
            }
            echo "<br>";
        }*/
        $attend = new Attend();
        $mon = substr($TDArray[0][0], 0, 2);
        $attend->Month = $Month[substr($TDArray[0][0], 0, 2)];
        $attend->Date[0] = substr($TDArray[0][0], 3);
        $attend->Present[0] = (int)$TDArray[1][0];
        $p = -1;$l = -1;
        
        for($i = 1;$i<=$q;$i++)
        {
            if(substr($TDArray[0][$i], 0, 2) == $mon)
            {
                $attend->Date[++$p] = substr($TDArray[0][$i], 3);
                $attend->Present[$p] = (int)$TDArray[1][$i];   
            }
            else
            {
                $response->Attendance[++$l] = $attend;
                $p = -1;
                $attend = new Attend();
                $mon = substr($TDArray[0][$i], 0, 2);
                $attend->Month = $Month[substr($TDArray[0][$i], 0, 2)];
                $attend->Date[++$p] = substr($TDArray[0][$i], 3);
                $attend->Present[$p] = (int)$TDArray[1][$i];
            }
        }
        $response->Attendance[++$l] = $attend;
        
    }
    else
    {
        //not registered
    }
    
    
}


echo json_encode($response);
    
?>