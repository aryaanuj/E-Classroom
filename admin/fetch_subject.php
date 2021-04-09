<?php
include '../database/config.php';
if(isset($_POST['dept']) && isset($_POST['cat']))
{

$output ='<option value="" selected disabled>-Select Subject-</option>';
$sql = "SELECT * FROM tbl_subjects WHERE department = '".$_POST['dept']."' AND category='".$_POST['cat']."' ORDER BY name";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $output.='<option value="'.$row['name'].'">'.$row['name'].'</option>';
    }
    echo $output;
} else {

}
}
$conn->close();
?>
