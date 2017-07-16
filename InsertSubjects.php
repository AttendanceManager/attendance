<?php
    
    require 'db.php';
   
    $fp = fopen("Subjects","r");
    $semester=0;
    $Code = "";
    $Name = "";
        while(!feof($fp))
        {    
            $line= fgets($fp);
            
            if((int)$line >=3 && (int) $line <=8)
            {
                $semester = test_input($line);
                $semester = (int) $semester;
            }
            else
            {
                $Code = substr($line, 0, 6);
                $Code = test_input($Code);
                
                $Name = substr($line, 6);
                $Name = test_input($Name);
            
            
                echo $Code." ".$Name." ",$semester."<br>";
                $query = "INSERT INTO Subjects (SubjectCode, SubjectName,Semester, TId, NumOfClass,DeptId ) VALUES('$Code', '$Name', $semester,NULL, 0, 1 )";

               /* if($conn->query($query))
                {
                    echo ++$j." Data inserted.<br>";
                }
                else
                {
                    echo "Error during inserting data.\n";
                } */
            }
          
        }
   function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
     }
    
    ?>