<?php
require 'db.php';
session_start();
$em=$_SESSION['Email'];
    //if ($_SERVER["REQUEST_METHOD"] == "GET"  && !empty($_GET['Submit']) && isset($_GET['Submit']))
    //{ 
            $p1 =  $_POST['cp'];
            $p2 =  $_POST['np'];
            $p3 =  $_POST['cnp'];
            
  
            $pass = md5(md5($p1));
           
			$query = "SELECT Password FROM userbase WHERE Email = '$em'";
            $result = $conn->query($query);        
            $pass2 = $result->fetch_assoc();
//echo $pass2['Password'];
            if($pass2['Password']==$pass)
			{
				$p4=md5(md5($p2));
			$sql = "UPDATE userbase SET Password='$p4' WHERE Email = '$em'";

            if ($conn->query($sql) === TRUE) 
			{
            echo "Password updated successfully";
            } 
			else 
			{
            echo "Error updating Password: " . $conn->error;
            }
			
			}
			else
			{
			echo "wrong original password";
			}
    //}
?>	