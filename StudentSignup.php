<?php
    require 'connect.php';
 $JSONstr = file_get_contents('php://input');
//$JSONstr ='{"RollNo":"15BCS040", "SimID":"42342342","SNo":"ZY2222FXV5","Name":"Shivaak Tripathi", "EnrollmentNo":"422342","Semester":"2","Department":"Comp", "Password":"42342342","PhoneNo":"934234324"}';     

class resp 
    {
            function resp(){
            $this->Name = null;
            $this->RollNo = null;
            $this->EnrollmentNo = null;
            $this->SimID = null;
            $this->SNo = null;
            $this->Department = null;
            $this->Password = null;
            $this->PhoneNo = null;
            $this->Semester = null;
            $this->error = null;
            $this->error_msg = null;
        }
    }
    $response = new resp();
    
    $Object = json_decode($JSONstr);
   $response->error_msg = $JSONstr;
   // echo json_encode($response);
    @$Name = $Object->Name;
    @$RollNo =  strtoupper($Object->RollNo);
    @$Pass = md5(md5($Object->Password));
    @$Sem = (int)$Object->Semester;
    @$Enroll = str_replace("-","",$Object->EnrollmentNo);
    @$Sim = $Object->SimID;
    @$Serial = $Object->SNo;
    @$Phone = $Object->PhoneNo;
    @$Dept =  $Object->Department;

    $respFromDB = userExists($RollNo,$Name,$Serial);
   // echo  $respFromDB;
    if($respFromDB ==0)
    {  
        $query = "INSERT INTO Students (RollNo, Name, EnrollmentNo, Semester, Password, Department, PhoneNo,SNo, SimID) VALUES ('$RollNo', '$Name', '$Enroll',$Sem , '$Pass', '$Dept','$Phone','$Serial', '$Sim')";
        $result = $conn->query($query);
        
        $response->error = "0";
        $response->error_msg = "You are successfully registered.";
       
        echo json_encode($response);
     }

    else if($respFromDB ==2)
    {
        $response->error = "1";       
        
        $query = "SELECT * FROM Students WHERE RollNo = '$RollNo'";
        $result = $conn->query($query);
        
        $row = $result->fetch_assoc();
        //echo $result->num_rows;
        echo $result->fetch_array();
        $response->error_msg = "This Roll number and Name already exists but with different phone. You cannot register from more than 1 phone. Details of the registered record is given below. To get any kind of help, feel free to contact us.\n\nName : " .$row['Name']."\nRollNo : ".$row['RollNo']."\nSemester : ".$row['Semester']."\nDepartment : ".$row['Department'];

        echo json_encode($response);
    }
        
    else if($respFromDB ==1)
    {
        $response->error = "1";
        
        $query = "SELECT * FROM Students WHERE RollNo = '$RollNo'";
        $result = $conn->query($query);
        $rows = $result->fetch_array();
        $response->error_msg = "You are already registered. No need to register more than once. Your details are:\n\nName : ".$rows['Name']."\nRollNo : ".$rows['RollNo']."\nSemester : ".$rows['Semester']."\nDepartment : ".$rows['Department'];

        echo json_encode($response);
    }
    
    else if($respFromDB ==3)
    {
        $response->error = "1";
        $query = "SELECT * FROM Students WHERE RollNo = '$RollNo'";
        if($result = $conn->query($query))
        {
            $row = $result->fetch_assoc();
            $response->error_msg = "This Roll number is already registered but with different Name. Details of the registered record is :\n\nName : " .$row['Name']."\nRollNo : ".$row['RollNo']."\nSemester : ".$row['Semester']."\nDepartment : ".$row['Department'];
        }
        echo json_encode($response);
    }
    else if($respFromDB ==4)
    {
        $response->error = "1";
        $query = "SELECT * FROM Students WHERE SNo = '$Serial'";
        if($result = $conn->query($query))
        {
            $row = $result->fetch_assoc();
            $response->error_msg = "This Phone has already been registered but by a different Person. Details of the registered record is :\n\nName : " .$row['Name']."\nRollNo : ".$row['RollNo']."\nSemester : ".$row['Semester']."\nDepartment : ".$row['Department'];
        }
        echo json_encode($response);
    }
    
    else if($respFromDB ==-1)
    {
        $response->error = "-1";
        $response->error_msg = "Internal Server Error. Try again later";
        echo json_encode($response);
    }

    function userExists($RollNo, $Name, $Serial)
    {
        require 'connect.php';
        $query = "SELECT * FROM Students WHERE RollNo = '$RollNo'";
        $result = $conn->query($query);
        if($conn->query($query))
        {            
            $row = $result->fetch_assoc();
            if($result->num_rows > 0)
            {
                if($row['Name'] == $Name)
                {
                    if($row['SNo'] == $Serial)
                        return 1;
                    else
                        return 2;
                }
                else
                    return 3;                   
            }
            else
            {
                $query = "SELECT * FROM Students WHERE SNo = '$Serial'";
                $result = $conn->query($query);
                if($conn->query($query))
                {            
                    $row = $result->fetch_assoc();
                    if($result->num_rows > 0)
                    {
                        return 4;
                    }
                    else
                        return 0;
                }
            }
        }
        else 
        {
            return -1;
        }        
    }
?>
