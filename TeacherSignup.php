<html>
<body>
    <center>
        <h1>Teacher Sign Up Page</h1>
    
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>  ">  
            First Name : <input type = "text" name = "FName" ><br><br>
            Middle Name : <input type = "text" name = "MName" ><br><br>
            Last Name : <input type = "text" name = "LName" ><br><br>
            Phone Number : <input type = "text" name = "phoneNo" ><br><br>
            Email : <input type ="email" name = "Email"><br><br>
            
            <input type ="submit" name = "Submit" value = "Sign Up"><br><br>
    
        </form>
    </center>
    
    
<?php

    require 'db.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST"  && !empty($_POST['Submit']) && isset($_POST['Submit']))
    { 
            $FName =  test_input($_POST['FName']);
            $MName =  test_input($_POST['MName']);
            $LName =  test_input($_POST['LName']);
            $Email =  test_input( $_POST['Email']);
            $PhoneNo =  test_input( $_POST['phoneNo']);
            
            $query = "SELECT COUNT(*) FROM TeacherBase";
            $result = $conn->query($query);        
            $row = $result->fetch_assoc();
            
            if($row['COUNT(*)']<9)
                $TId = "JMIAM000";
            else if($row['COUNT(*)']<99)
                $TId = "JMIAM00";
            else if($row['COUNT(*)']<999)
                $TId = "JMIAM0";
            else if($row['COUNT(*)']<9999)
                $TId = "JMIAM";
                
            $TId .= ((string)($row['COUNT(*)'] + 1));
            
            $Password = substr(md5(rand()) , 0, 6);
            $Pass = md5(md5($Password));
            if($MName != null)
            $Name = $FName.' '.$MName.' '.$LName;
            else
            $Name = $FName.' '.$LName;
            echo $Password;
            $query1 = "INSERT INTO UserBase ( Name,Email,Password, PhoneNo, Status) VALUES ('$Name', '$Email', '$Pass','$PhoneNo',3)";
            
            $query2 = "INSERT INTO TeacherBase (TId, Email, FirstName, MiddleName, LastName) VALUES ('$TId', '$Email', '$FName','$MName','$LName')";
            
           // mail($Email,"JMI Attendance Manager","Your password is : ".$Pass);
		   //mail code -: amish 18/7
		    
if(isset($_POST['Submit'])){
    $to = $_POST['Email']; // this is your Email address
    
    $first_name = $_POST['FName'];
	$mid_name=$_POST['MName'];
	$last_name=$_POST['LName'];
    $subject = "Password for Attendance Manager";
 
    $message = "Name:".$first_name ."\n" ."Middle Name:".$mid_name."\n"."Last Name:".$last_name."\n"."Your Password:".$Pass;
    

   
    $headers = "From Attendance Manager JMI";
    mail($to,$subject,$message,$headers);
     
    echo "Mail Sent. Thank you " . $first_name . ", has been send a mail containing password.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
	//mail code ends -:amish
            $flag = 0;
        
            if(!$conn->query($query1))
            {echo "error query 1";$flag = 1;}
            if(!$conn->query($query2))
              {echo "error query 2";$flag = 1;}
        if($flag == 0)
            echo "Registered";
        unset($_POST);
    }
    
      function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
}
?>
    </body>
    </html>
