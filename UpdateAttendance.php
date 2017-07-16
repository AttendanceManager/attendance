<?php
require 'db.php';
 //$JSONstr = file_get_contents('php://input');
$JSONstr ='{
                  "Date":"_05_11_13_08",
                  "NoOfClass":"1",
		          "VerifyStr":"jsfdh@gmail.com",
                  "Password":"1",
                  "SubjectCode":"CEN302",
                  "Attendance": ["15BCS0039","15BCS0034"],
                  "ManualAttendance":["35"]
           }';

class resp 
    {
        function resp()
        {
            $this->ErrorCode = 0;
            $this->Message = null;
        }
    }
$response = new resp();
    
$MyObj = json_decode($JSONstr);
$TId = "";
$Email = "";
$phoneNo = "";

$VerifyStr = trim($MyObj->VerifyStr);
$Password = md5(md5($MyObj->Password));
$SubjectCode = trim($MyObj->SubjectCode);

$flag = 0;

if(substr($VerifyStr,0, 5) == "JMIAM" && strlen($VerifyStr) == 9)
{
    echo "TId";
    $TId = $VerifyStr;
    $query  = "SELECT Email FROM TeacherBase WHERE TId = '$VerifyStr'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $Email =  $row['Email'];
    
    $query  = "SELECT Status FROM UserBase WHERE Email = '$Email'";
    $result = $conn->query($query);
    if(@$row = $result->fetch_assoc())
    {
        
            if($row['Status'] == 3)
            {
                //match subcode and TId
                $query  = "SELECT TId FROM Subjects WHERE SubjectCode = '$SubjectCode'";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                if($row['TId'] == $TId)
                    $flag = 5;
                else
                    $flag = 3;
            }
            else
                $flag = 2;
        
    }
    
}
else if(filter_var($VerifyStr, FILTER_VALIDATE_EMAIL))
{
    echo "Email";
    
    $query  = "SELECT TId FROM TeacherBase WHERE Email = '$VerifyStr'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $TId =  $row['TId'];
    
    $Email = $VerifyStr;
    $query  = "SELECT Email, Status FROM UserBase WHERE Email = '$Email'";
    $result = $conn->query($query);
    if(@$row = $result->fetch_assoc())
    {
        
            if($row['Status'] == 3)
            {
                //match subcode and TId
                $query  = "SELECT TId FROM Subjects WHERE SubjectCode = '$SubjectCode'";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                if($row['TId'] == $TId)
                {
                    $flag = 5;
                }
                else
                    $flag = 3;
            }
            else
                $flag = 2;
        
    }
}
else if(1 === preg_match('~[0-9]~', $VerifyStr) && strlen($VerifyStr) == 10)
{
    echo "phone number";
    
    $query  = "SELECT Email FROM UserBase WHERE PhoneNo = '$VerifyStr'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $Email =  $row['Email'];
    
    $query  = "SELECT TId FROM TeacherBase WHERE Email = '$Email'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $TId =  $row['TId'];
    
    $phoneNo = $VerifyStr;    
    $query  = "SELECT Status FROM UserBase WHERE PhoneNo = '$phoneNo'";
    $result = $conn->query($query);
    if(@$row = $result->fetch_assoc())
    {
        if($row['Status'] == 3)
            {
                //match subcode and TId
                $query  = "SELECT TId FROM Subjects WHERE SubjectCode = '$SubjectCode'";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                if($row['TId'] == $TId)
                {
                    $flag = 5;
                }
                else
                    $flag = 3;
            }
            else
                $flag = 2;
        
    }
}

echo $flag."<br>";
if($flag == 5)
{
    // everything ok. update the attendance
    $Attendance = $MyObj->Attendance;
    $ManualAttendance = $MyObj->ManualAttendance;
    $Date = $MyObj->Date;
    $Date = $Date."_".$MyObj->NoOfClass;
    $NoOfClass = (int)($MyObj->NoOfClass);
    
    $query = "ALTER TABLE $SubjectCode ADD COLUMN $Date int DEFAULT 0";
    if($conn->query($query))
    {
        foreach($Attendance as $a)
        {
            $a = trim($a);
            echo $a."<br>";
            $query = "UPDATE $SubjectCode SET $Date = $NoOfClass WHERE RollNo = '$a'";
            if(!$conn->query($query))
            {
                $flag = 6;
            }
        }
        
        foreach($ManualAttendance as $a)
        {
            $a = trim($a);
            echo $a."<br>";
            $query = "UPDATE $SubjectCode SET $Date = $NoOfClass WHERE RollNo LIKE '%$a'";
            if(!$conn->query($query))
            {
                $flag = 6;
            }
        }       
    }
    else
        $flag =7;
    if($flag == 5)
    {
        $response->ErrorCode = 0;
        $response->Message = "Attendance taken. Thank you.";
    }
    
}
else if($flag == 1)
{
    //password does not match
    $response->ErrorCode = 1;
    $response->Message = "Attendance NOT Taken. Password does not match.";
}
else if($flag == 2)
{
    // pass matches but not a teacher
    $response->ErrorCode = 1;
    $response->Message = "Attendance NOT Taken. You need to be a teacher to take the attendance.";
}
else if($flag == 3)
{
    // pass matches, a teacher, but not not the one teaching that subject
    $response->ErrorCode = 1;
    $response->Message = "Attendance NOT Taken. Seems like you do not teach this subject.";
}
if($flag == 7)
{
    // problem while updating the attendance
    $response->ErrorCode = 1;
    $response->Message = "Attendance NOT Taken. Please take the attendance again. Remember, you cannot take the attendance twice in the same hour. Sorry for the inconvenience.";
}
else if($flag == 6)
{
    // column of date not made
    $response->ErrorCode = 1;
    $response->Message = "Attendance NOT Taken. Please take the attendance again. Sorry for the inconvenience.";
}
echo $flag;
echo json_encode($response);  
?>
