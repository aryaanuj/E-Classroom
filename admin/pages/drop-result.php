<?php
if (isset($_GET['eid']) && isset($_GET['sid'])) {
include '../../database/config.php';
	$student_id = $_GET['sid'];
	$examid = $_GET['eid'];
	if(mysqli_query($conn, "DELETE FROM tbl_result WHERE student_id='$student_id' AND exam_id='$examid'"))
	{
		if(mysqli_query($conn, "DELETE FROM tbl_assessment_records WHERE student_id='$student_id' AND exam_id='$examid'"))
		{
			header("location:../results.php");
		}
	}
	
}



?>