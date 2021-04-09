<?php
// Set timezone 
date_default_timezone_set('Asia/Kolkata'); 
include '../../database/config.php';
include '../../includes/uniques.php';
$vid_id = 'VID-'.get_rand_numbers(6).'';
$category_name =   ucwords(mysqli_real_escape_string($conn, $_POST['category']));
$department_name = ucwords(mysqli_real_escape_string($conn, $_POST['department']));
$subject_name = ucwords(mysqli_real_escape_string($conn, $_POST['subject']));
$description = mysqli_real_escape_string($conn, $_POST['description']);

$video_name = $_FILES['video_lec']['name'];
$video_tmp = $_FILES['video_lec']['tmp_name'];

// echo $vid_id.$category_name.$department_name.$subject_name.$video_name." ";
$date = date('d-m-Y');

$sql = "SELECT * FROM tbl_video_lecture WHERE category = '$category_name' AND department = '$department_name' AND subject='$subject_name' AND video='$video_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    header("location:../vid_lectures.php?rp=1185");
    }
} else {

$sql = "INSERT INTO tbl_video_lecture (vid_id, video, description, department, category, subject, v_datetime)
VALUES ('$vid_id', '$video_name', '$description', '$department_name', '$category_name', '$subject_name', now())";

if ($conn->query($sql) === TRUE) {
	move_uploaded_file($video_tmp, "../../video-lectures/".basename($video_name));
    header("location:../vid_lectures.php?rp=1289");
} else {
    header("location:../vid_lectures.php?rp=7732");
}


}
$conn->close();
?>


