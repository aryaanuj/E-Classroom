<?php
include '../../database/config.php';
include '../../includes/uniques.php';
$examid = mysqli_real_escape_string($conn, $_POST['exam']);
$question_id = 'QS-'.get_rand_numbers(6).'';
$question = mysqli_real_escape_string($conn, $_POST['question']);
$question_img = mysqli_real_escape_string($conn, $_POST['questionimg']);
$answer = mysqli_real_escape_string($conn, $_POST['answer']);

if (isset($_GET['type'])) {
$question_type = $_GET['type'];	
if ($question_type == "mc") {	
$opt1 = mysqli_real_escape_string($conn, $_POST['opt1']);
$opt2 = mysqli_real_escape_string($conn, $_POST['opt2']);
$opt3 = mysqli_real_escape_string($conn, $_POST['opt3']);
$opt4 = mysqli_real_escape_string($conn, $_POST['opt4']);

if($answer=='option1')
{
    $answer = $opt1;
}
else if($answer=="option2")
{
    $answer = $opt2;
}
else if($answer=='option3')
{
    $answer = $opt3;
}
else if($answer=='option4')
{
    $answer = $opt4;
}


$sql = "SELECT * FROM tbl_questions WHERE exam_id = '$examid' AND question = '$question'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
 header("location:../questions.php?rp=1185");
    }
} else {

$sql = "INSERT INTO tbl_questions (question_id, exam_id, type, question, option1, option2, option3, option4, answer)
VALUES ('$question_id', '$examid', 'MC', '$question', '$opt1', '$opt2', '$opt3', '$opt4', '$answer')";

if ($conn->query($sql) === TRUE) {
    header("location:../questions.php?rp=0357");	
} else {
 header("location:../questions.php?rp=3903");	
}

}


}else if($question_type == "fib") {
$sql = "SELECT * FROM tbl_questions WHERE exam_id = '$examid' AND question = '$question'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
header("location:../add-questions.php?rp=1185&eid=$examid");
    }
} else {

$sql = "INSERT INTO tbl_questions (question_id, exam_id, type, question, answer)
VALUES ('$question_id', '$examid', 'FB', '$question', '$answer')";

if ($conn->query($sql) === TRUE) {
  header("location:../questions.php?rp=0357");  	
} else {
 header("location:../questions.php?rp=3903");
}


}


}else{
	
}
	
}else{
	
header("location:../");	
	
}


?>