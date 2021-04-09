<?php
// Set timezone 
date_default_timezone_set('Asia/Kolkata'); 
include '../database/config.php';

$TotalQuestion= $_POST['TotalQuestion'];
$TotalAttempted = $_POST['TotalAttempted'];
$TotalCorrect=$_POST['TotalCorrect'];
$TotalWrong=$_POST['TotalWrong'];
$score = $_POST['scorePercentage'];
$stuid = $_POST['stuid'];
$subj = $_POST['subj'];
$currentDate = $_POST['sdate'];
$examid = $_POST['exam_id'];
$exam_c = $_POST['exam_desc'];

$query = "INSERT INTO tbl_result (subject, totalQ, attempted, correct, incorrect, score, student_id, subTime, subDate, exam_id, exam_c) VALUES ('$subj','$TotalQuestion','$TotalAttempted','$TotalCorrect','$TotalWrong','$score','$stuid',now(),'$currentDate', '$examid', '$exam_c')";
if(mysqli_query($conn, $query))
{

	$res = mysqli_query($conn, "SELECT * FROM tbl_examinations WHERE exam_id='$examid'");
	$row= mysqli_fetch_array($res);

	$status="";
	if($score>=$row['passmark'])
	{
		$status = "PASS";
	}
	else
	{
		$status = "FAIL";
	}

	if(mysqli_query($conn, "UPDATE tbl_assessment_records SET score='$score',status='$status' WHERE student_id='$stuid' AND exam_id='$examid' "))
	{
		echo "success";
	}

}
else
{
	echo "failure".mysqli_error($conn);
}




?>