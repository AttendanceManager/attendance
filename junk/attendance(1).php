<?php
include 'db.php';
$query_to_get_classes_attended_for_the_subject = "SELECT * FROM `cen403` WHERE `roll_num`= '15BCS0081'";
$result2 = mysqli_query($conn,$query_to_get_classes_attended_for_the_subject);
$row = mysqli_fetch_assoc($result2);
$sum=0;
foreach ($row as $Attendance) {
  echo "<br>$Attendance";
  if ($Attendance == 1) {
    $sum++;
  }
}
echo "<br>$sum";
$percentage = $sum * 100 / 3;

echo "<br>$percentage";

?>
