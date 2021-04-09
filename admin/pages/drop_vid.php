<?php
include '../../database/config.php';
$vidid = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "DELETE FROM tbl_video_lecture WHERE vid_id='$vidid'";

if ($conn->query($sql) === TRUE) {
    header("location:../vid_lectures.php?rp=7823");
} else {
    header("location:../vid_lectures.php?rp=1298");
}

$conn->close();
?>
