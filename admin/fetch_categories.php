<?php
include '../database/config.php';
if(isset($_POST['dept']))
{
$output ='<option value="" selected disabled>-Select Category-</option>';
$sql = "SELECT * FROM tbl_categories WHERE department = '".$_POST['dept']."' ORDER BY name";
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
