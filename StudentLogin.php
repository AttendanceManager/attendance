<?php
        require 'connect.php';
        class resp {
            function resp(){
                $this->Name = null;
                $this->RollNo = null;
                $this->EnrollmentNo = null;
                $this->Department = null;
                $this->error = null;
                $this->error_msg = null;
            }            
        }
        $JSONstr = file_get_contents('php://input');
       //$JSONstr = '{"RollNo":"15BCS0040","SNo":"ZY2222FXV5"}';
        $Object = json_decode($JSONstr);

        $response = new resp();
       
        $Serial = $Object->SNo;
        $Roll =  strtoupper($Object->RollNo);
        $query = "SELECT * FROM Students WHERE RollNo = '$Roll'";
        if($conn->query($query))
        {
             $result = $conn->query($query);
             $row = $result->fetch_assoc();
             if($result->num_rows == 0)
             {
                 $response->error = "1";   
                 $response->error_msg = "This Roll number is not registered.";
                 echo json_encode($response);
             }
             else
             {
                 if($row['SNo'] == $Serial)
                 {
                     $response->error = "0";                  
                     $response->Name = $row['Name'];
                     $response->RollNo =  $row['RollNo'];
                     $response->EnrollmentNo =  $row['EnrollmentNo'];
                     $response->Department =  $row['Department'];
                     $response->Semester = $row['Semester'];
                     $response->error_msg = "Welcome ".$row['Name'];
                     echo json_encode($response);
                 } 
                 else
                 {
                     $response->error = "1";
                     $response->error_msg = "You are not allowed to log in from this phone.";
                     echo json_encode($response);
                 }
             }
        }
        else 
        {
            $response->error = "-1";
            echo json_encode($response);   
        }    
?>