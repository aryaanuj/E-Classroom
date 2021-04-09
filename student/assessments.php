<?php 
date_default_timezone_set('Asia/Kolkata');
include 'includes/check_user.php'; 
include 'includes/check_reply.php';
include '../includes/uniques.php'; 

// variables declare
$date = date('y-m-d');
$sDate = "";   
$Time = "";
$examid = "";
$subject="";
$exam_name ="";
$reexam = "";


if (isset($_SESSION['current_examid'])) {
    include '../database/config.php';
    $exam_id = $_SESSION['current_examid'];
    $retake_status = $_SESSION['student_retake'];

// if ($retake_status == "1") {
// $sql = "DELETE FROM tbl_assessment_records WHERE student_id = '$myid' AND exam_id = '$exam_id'";

// if ($conn->query($sql) === TRUE) {

// } else {

// }   
// }

//get Minutes
function Minutes($time) {
    $timeArr = explode(':', $time);
    $decTime = round(($timeArr[0]*60) + ($timeArr[1]) + ($timeArr[2]/60));
    return $decTime;
}

//fetching exam 
$query2 = mysqli_query($conn, "SELECT * FROM tbl_examinations WHERE exam_id = '$exam_id' AND category = '$mycategory' AND status = 'Active'")or die(mysql_error());
if ($query2->num_rows > 0) {
    while($row2 = mysqli_fetch_array($query2)){
        $exam_name =$row2['exam_name'];
        $sDate = $row2['date'];
        $startTime = Minutes($row2['duration']);
        $endTime = Minutes($row2['end_duration']);
        $currentTime= Minutes(date("H:i:s"));
        $Time = ($endTime-$currentTime);
        $examid = $row2['exam_id'];
        $subject = $row2['subject'];
        $reexam = $row2['re_exam'];
        if($Time<0)
        {
            header("location:./take-assessment.php?id=$exam_id");
        }
    }
} else{ header("location:./"); }
} else{ header("location:./"); }

// check student already given exam or not. if student already given exam then redirect it previous page else entry in assessment records.
$sql = "SELECT * FROM tbl_assessment_records WHERE student_id = '$myid' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        header("location:./take-assessment.php?id=$exam_id");
    }
} else {


    $myname = "$myfname $mylname";
    $recid = 'RS'.get_rand_numbers(14).'';

    $sql = "INSERT INTO tbl_assessment_records (record_id, student_id, student_name, exam_name, exam_id, score, status, next_retake, date)
    VALUES ('$recid', '$myid', '$myname', '$exam_name', '$exam_id', '0', 'FAIL', '$reexam', '$date')";

    if (mysqli_query($conn, $sql)) {

    } else {
    }
}

//fetch questions
$query = "SELECT * FROM tbl_questions WHERE exam_id = '$exam_id'";
$res = mysqli_query($conn, $query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link href="../img/tls_logo.png" rel="icon" type="image"> -->
    <title>E-Cell System</title>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/custom.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/style.default.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125433287-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-125433287-1');

    </script>
</head>

<body>
    <div id="all">
        <div class="top-bar">
            <div class="container">
                <div class="col-md-12">
                    <div class="top-links"> </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <header class="main-header">
            <div class="navbar" data-spy="affix" data-offset-top="200">
                <div class="navbar navbar-default yamm" role="navigation" id="navbar">
                    <div class="container">
                        <div class="navbar-header">
                            <a class="navbar-brand home">
                                <table class="row">
                                  <tr>
                                    <td style="padding-right:10px;"><!-- <img src="img/tls_logo.png" alt="E-Cell System" class="img-responsive" width="50px"> --></td>
                                    <td style="border-left:4px solid #f82249; padding-left:10px; margin-left:10px; "><h4>ETS INSTITUTE</h4>
                                    </td>
                                </tr>
                            </table>
                        </a>
                    </div>
                    <div class="col-md-5 pull-right">
                        <div class="navbar-collapse">
                            <ul class="nav navbar-nav pull-right">
                                <li class="user-profile">
                                    <table>
                                        <tr>
                                            <td style="padding-top:10px;">
                                                <a href="logout.php" class="btn btn-primary">LOGOUT</a>
                                            </td>
                                        </tr> 
                                    </table>
                                </li>
                            </ul>
                            <input type="hidden" id="hdfTestDuration" value="<?php echo $Time; ?>" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="clear"></div>
    <div>
        <div id="heading-breadcrumbs" style="background-color: black;">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 pull-left">
                        <table class="stream">
                            <tr class="full-width">
                                <td class="full-width">
                                    <h1> <?php echo $subject; ?></h1>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="clear-xs "></div>
                    <div class="col-md-3 text-right">
                        <div style="padding: 15px 0 0 0">
                           <td><span style="padding: 0px 5px; font-weight: bold; font-size:18px!important; color:white!important;">Remaining Time :</span></td>
                           <td>
                            <span class="timer-title time-started" style="font-size:18px;">00:00:00</span>
                        </td>
                    </div>
                </div>
                <div class="clear-xs"></div>
            </div>
        </div>
    </div>
</div>
<div id="content">
    <div class="container-fluid">
        <div class="row exam-paper">
            <div class="col-md-8" id="quest" style="padding: 0">
                <table style="width: 100%" id="questionPanel">
                    <tr>
                        <td>
                            <div class="panel panel-default ">
                                <div class="panel-body mb0">
                                    <div class="row">
                                        <div class="col-lg-12">
                                          <?php
                                          $counter=0;
                                          while($row = mysqli_fetch_array($res))
                                          {
                                            $counter+=1;
                                            ?>
                                            <div style="display:none;" class="tab-content div-question mb0" id="page0<?php echo $counter; ?>">
                                                <input type="hidden" class="subj" value="<?php echo $subject; ?>">
                                                <input type="hidden" class="stuid" value="<?php echo $myid; ?>">
                                                <input type="hidden" class="examid" value="<?php echo $examid; ?>">
                                                <input type="hidden" class="exam_desc" value="<?php echo $exam_name; ?>">
                                                <input type="hidden" class="sdate" value="<?php echo $sDate; ?>">
                                                <input type="hidden" value="1" class="hdfQuestionID">
                                                <input type="hidden" value="1" class="hdfPaperSetID">
                                                <input type="hidden" value="<?php echo $row['answer']; ?>" class="hdfCurrectAns">
                                                <div class="question-height">
                                                    <h4 class="question-title"> Question <?php echo $counter; ?>:  </h4>
                                                    <span><?php 
                                                    $pos = strpos($row['question'],'src="');
                                                    if($pos==false)
                                                    {
                                                     echo $row['question'];
                                                 }
                                                 else
                                                 {
                                                     echo $question = str_replace('src="upload', 'src="../admin/upload', $row['question']);
                                                 }
                                                 ?></span> 
                                                 <table class="table table-borderless mb0">
                                                    <tbody>
                                                        <tr>
<td> 
 <!-- option A -->
<input type="radio" value="<?php echo $row['option1'] ?>" name="radiospage0<?php echo $counter; ?>" id="rOption<?php echo $counter; ?>_1">1 )
<?php
echo $row['option1'];

?>

</td>
<!-- option B -->
<td> <input type="radio" value="<?php echo $row['option2'] ?>" name="radiospage0<?php echo $counter; ?>" id="rOption<?php echo $counter; ?>_1"> 2 )<?php
echo $row['option2'];

?></td>
<!-- option c -->
<td> <input type="radio" value="<?php echo $row['option3'] ?>" name="radiospage0<?php echo $counter; ?>" id="rOption<?php echo $counter; ?>_1"> 3 )<?php 
echo $row['option3'];

?> </td>
<!-- option d -->
<td> <input type="radio" value="<?php echo $row['option4'] ?>" name="radiospage0<?php echo $counter; ?>" id="rOption<?php echo $counter; ?>_1"> 4 )<?php 
echo $row['option4'];
?> </td>
</tr>
</tbody>
</table>
</div>
</div>
<?php } ?>

<div class="clearfix"></div>
<div class="row">
    <div class="col-md-4">
        <button class="mb5 full-width btn btn-success btn-block btn-save-answer">Save &amp; Next</button>
    </div>
    <div class="col-md-4">
        <button class="mb5 full-width btn btn-warning btn-block btn-save-mark-answer">Save &amp; Mark For Review</button>
    </div>
    <div class="col-md-4">
        <button class="mb5 full-width btn btn-default btn-block btn-reset-answer">Clear Response</button>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-4">
        <button class="mb5 full-width btn btn-primary btn-block btn-mark-answer">Mark For Review &amp; Next</button>
    </div>
</div>
</div>
</div>


<div class="panel-footer">
    <div class="row">
        <div class="col-md-12"> <button class="btn btn-success btn-submit-all-answers pull-right">Submit</button>&nbsp;&nbsp;
            <a href="javascript:void(0);" class="btn btn-default pull-left" id="btnPrevQue">
                << Back </a>&nbsp;&nbsp; <a href="javascript:void(0);" class="btn btn-default pull-left" id="btnNextQue">Next >></a>&nbsp;&nbsp; </div>
            </div>
        </div>
    </td>
    <td>
        <div class="full_screen pull-right" style="cursor: pointer; background-color: #000; color: #fff; padding: 5px;">
            <i class="fa fa-angle-right fa-2x"></i>
        </div>
        <div class="collapse_screen hidden pull-right" style="cursor: pointer; background-color: #000; color: #fff; padding: 5px;">
            <i class="fa fa-angle-left fa-2x"></i>
        </div>
    </td>
</tr>
</table>
</div>
<div class="col-md-4" id="pallette" >
    <div class="panel panel-default mb0">
        <div class="panel-body">
            <table class="table table-borderless mb0">
                <tr>
                    <td class="full-width"> <a class="test-ques-stats que-not-attempted lblNotVisited">0</a> Not Visited </td>
                    <td class="full-width"> <a class="test-ques-stats que-not-answered lblNotAttempted">0</a> Not Answered </td>
                </tr>
                <tr>
                    <td class="full-width"> <a class="test-ques-stats que-save lblTotalSaved">0</a> Answered </td>
                    <td class="full-width"> <a class="test-ques-stats que-mark lblTotalMarkForReview">0</a> Marked for Review </td>
                </tr>
                <tr>
                    <td colspan="2"> <a class="test-ques-stats que-save-mark lblTotalSaveMarkForReview">0</a> Answered &amp; Marked for Review (will be considered for evaluation) </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="panel panel-default" style="border:1px solid black;">
        <div class="panel-body " style="height:320px;overflow-y:auto;">
            <ul class="pagination test-questions">
                <?php $count=0;
                $sql = "SELECT * FROM tbl_questions WHERE exam_id = '$exam_id'";
                $result = mysqli_query($conn, $sql);

                while($r = mysqli_fetch_array($result)){
                    $count+=1;
                    $zero = "";
                    if($count<9){$zero=0;}
                    if($count==1)
                        {?>
                         <li class="active" data-seq="1"><a class="test-ques que-not-answered" href="javascript:void(0);" data-href="page0<?php echo $count; ?>"><?php echo $zero.$count; ?></a></li>
                         <?php }
                         else
                           {?>

                             <li data-seq="1"><a class="test-ques que-not-attempted" href="javascript:void(0);" data-href="page0<?php echo $count; ?>"><?php echo $zero.$count; ?></a></li>

                             <?php }?>

                             <?php } ?>

                         </ul>
                     </div>
                 </div>
             </div>
         </div>
         <div class="row">
            <div class="col-md-12 exam-summery" style="display:none;">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="text-center">Exam Summary</h3>
                        <table class="table table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th>Section Name</th>
                                    <th>No of Questions</th>
                                    <th>Answered</th>
                                    <th>Not Answered</th>
                                    <th>Marked for Review</th>
                                    <th>Answered & Marked for Review(will be considered for evaluation)</th>
                                    <th>Not Visited</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="">Paper 1</td>
                                    <td class="lblTotalQuestion"></td>
                                    <td class="lblTotalSaved"></td>
                                    <td class="lblNotAttempted"></td>
                                    <td class="lblTotalMarkForReview"></td>
                                    <td class="lblTotalSaveMarkForReview"></td>
                                    <td class="lblNotVisited"></td>
                                </tr>
                            </tbody>
                        </table>
                        <hr />
                        <div class="col-md-12 text-center">
                            <h4> Are you sure you want to submit for final marking?<br />No changes will be allowed after submission. <br /> </h4>
                            <a class="btn btn-default btn-lg" id="btnYesSubmit">Yes</a> <a class="btn btn-default btn-lg" id="btnNoSubmit">No</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 exam-confirm" style="display:none;">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-12 text-center">
                            <h4> Thank You, your responses will be submitted for final marking - click OK to complete final submission. <br /> </h4>
                            <a class="btn btn-default  btn-lg" id="btnYesSubmitConfirm">Ok</a> <a class="btn btn-default  btn-lg" id="btnNoSubmitConfirm">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 exam-thankyou" style="display:none;">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-12 text-center">
                            <h4> Thank you, Submitted Successfully.</h4>
                            <a class="btn btn-default btn-lg" id="btnViewResult">View Result</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 exam-result" style="display:none;">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-12 text-center">
                            <h3>
                                RESULT
                            </h3>
                            <h4 class="bg-primary" style="padding:10px;">Score: <strong id="lblRScore"></strong></h4>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Total Question</td>
                                        <th id="lblRTotalQuestion"></th>
                                        <td>Total Attempted</td>
                                        <th id="lblRTotalAttempted"></th>
                                    </tr>
                                    <tr>
                                        <td>Correct Answers</td>
                                        <th id="lblRTotalCorrect"></th>
                                        <td>Incorrect Answers</td>
                                        <th id="lblRTotalWrong"></th>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Question No.</th>
                                        <th>selected Option</th>
                                        <th>Status</th>
                                        <th>Correct Option</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyResult"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/JsScript.js"></script>
<script>
    $('.full_screen').click(function() {
            //alert('ff');
            $('#quest').removeClass('col-md-8');
            $('#quest').addClass('col-md-12');
            //pallette
            $('#pallette').addClass('hidden');
            $('.full_screen').addClass('hidden');
            $('.collapse_screen').removeClass('hidden');
        });

    $('.collapse_screen').click(function() {
        $('#quest').removeClass('col-md-12');
        $('#quest').addClass('col-md-8');
            //pallette
            $('#pallette').removeClass('hidden');
            $('.full_screen').removeClass('hidden');
            $('.collapse_screen').addClass('hidden');

        });
    </script>

</body>
</html>


