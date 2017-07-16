<?php
    if((isset($_GET['semester']) && !empty($_GET['semester']) && $_GET['SubjectCode']) && !empty($_GET['SubjectCode'])&& $_GET['req'] === 1 )
    {
        $Semester = $_GET['semester'];
        $SubjectCode = $_GET['SubjectCode'];
        echo $Semester; echo $SubjectCode;
    }
?>