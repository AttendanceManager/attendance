<?php
require 'db.php';
/*
$JSONstr ='{
		          "VerifyStr":"JMIAM0001",
                  "Password":"1"
             }';*/
$JSONstr = file_get_contents('php://input');
class det
{
    function det()
    {
        $SubjectCode = array();
        $SubjectName = array();
        $NoOfStudent = array();
        $Semester = array();
    }
}

class resp 
    {
        function resp()
        {
            $this->Name = null;
            $this->Id = null;
            $this->Detail = new det();
            $this->Error = "0";
            $this->Message = null;
        }
    }

$response = new resp();
    
$MyObj = json_decode($JSONstr);

$VerifyStr = trim($MyObj->VerifyStr);
$Password = md5(md5($MyObj->Password));
$flag = -1;

if(substr($VerifyStr,0, 5) == "JMIAM" && strlen($VerifyStr) == 9)
{
    //echo "TId";
    $TId = $VerifyStr;
    $query  = "SELECT Email FROM TeacherBase WHERE TId = '$VerifyStr'";
    $result = $conn->query($query);
    if(mysqli_num_rows($result) != 0)
    {
        $row = $result->fetch_assoc();
        $Email =  $row['Email'];

        $query = "SELECT Status, Password, Name FROM UserBase WHERE Email = '$Email'";
        $result = $conn->query($query);
        if(@$row = $result->fetch_assoc())
        {
            if($row['Password'] == $Password)
            {
                if($row['Status'] == 3)
                {
                    $flag = 5;
                    $response->Name = $row['Name'];
                    $response->Id = $TId;
                }
                else
                    $flag = 2;
            }
            else
            {
                $flag = 1;
            }
        }
    }
    else
        $flag = 3;
}
else if(filter_var($VerifyStr, FILTER_VALIDATE_EMAIL))
{
    //echo "Email";
    
    $query  = "SELECT TId FROM TeacherBase WHERE Email = '$VerifyStr'";
    $result = $conn->query($query);
    if(mysqli_num_rows($result) != 0)
    {
        $row = $result->fetch_assoc();
        $TId =  $row['TId'];

        $Email = $VerifyStr;
        $query  = "SELECT Email, Status, Password, Name FROM UserBase WHERE Email = '$Email'";
        $result = $conn->query($query);
        if(@$row = $result->fetch_assoc())
        {
            if($row['Password'] == $Password)
            {
                if($row['Status'] == 3)
                {
                    $flag = 5;
                    $response->Name = $row['Name'];
                    $response->Id = $TId;
                }
                else
                    $flag = 2;
            }
            else
            {
                $flag = 1;
            }

        }
    }
    else
        $flag = 3;
}
else if(1 === preg_match('~[0-9]~', $VerifyStr) && strlen($VerifyStr) == 10)
{
    //echo "phone number";
    
    $query  = "SELECT Email, Password, Name, Status FROM UserBase WHERE PhoneNo = '$VerifyStr'";
    $result = $conn->query($query);
    
    if(mysqli_num_rows($result) != 0)
    {
        $row = $result->fetch_assoc();
        $Email =  $row['Email'];

        $phoneNo = $VerifyStr;
        $query1  = "SELECT TId FROM TeacherBase WHERE Email = '$Email'";
        $result1 = $conn->query($query1);
        if($row1 = $result1->fetch_assoc())
        {
            $TId = $row1['TId'];
            
            if($row['Password'] == $Password)
            {
                if($row['Status'] == 3)
                {
                    $flag = 5;
                    $response->Name = $row['Name'];
                    $response->Id = $TId;
                }
                else
                    $flag = 2;
            }
            else
            {
                $flag = 1;
            }
        }
        else
        {
            $flag = 2;
        }
    }
    else
        $flag = 3;
}
else
{
    $response->Error = "1";
    $response->Message = "Invalid Credentials";
}

if($flag == 5)
{
    // everything ok. send data
    $p = -1;
    $TId = $response->Id;
    
    $Detail = new det();
    $SubCode = array();
    $SubName = array();
    $Sem = array();
    $NoOfStd = array();
   
    $query = "SELECT SubjectCode, SubjectName, Semester FROM Subjects WHERE TId = '$TId'";
    $result = $conn->query($query);
    while($row = $result->fetch_assoc())
    {
        $SubCode[++$p] = $row['SubjectCode'];
        $SubName[$p] = $row['SubjectName'];
        $Sem[$p] = (int)$row['Semester'];
        
        $Sub = $row['SubjectCode'];
        $qNStd = "SELECT COUNT(*) FROM $Sub";
        $qres = $conn->query($qNStd);
        if($qres)
        {
            $qrow = $qres->fetch_assoc();
            $NoOfStd[$p] = $qrow['COUNT(*)'];
        }
                
    }
    $Detail->SubjectCode = $SubCode;
    $Detail->SubjectName = $SubName;
    $Detail->Semester = $Sem;
    $Detail->NoOfStudent = $NoOfStd;   
    
    $response->Detail = $Detail;
    
    //echo $response->Deta->SubjectCode;
}
else if($flag == 1)
{
    //password does not match
    $response->Error = "1";
    $response->Message = "Cannot Login. Password does not match.";
}
else if($flag == 2)
{
    // pass matches but not a teacher
    $response->Error = "1";
    $response->Message = "Cannot Login. You need to be a teacher to Login.";
}

if($flag == 3)
{
    // teacher doesn't exist
    $response->Error = "1";
    $response->Message = "Cannot Login. Unidentified user.";
}
/*
else if($flag == 6)
{
    // column of date not made
    $response->ErrorCode = "1";
    $response->Message = "Attendance NOT Taken. Please take the attendance again. Sorry for the inconvenience.";
}*/

echo json_encode($response);  
?>
