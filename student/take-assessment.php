<?php 
include 'includes/check_user.php';
date_default_timezone_set('Asia/Kolkata');
if (isset($_GET['id'])) {
    include '../database/config.php';	
    $exam_id = mysqli_real_escape_string($conn, $_GET['id']);
    $record_found = 0;
    $duration = "";
    $startdate = "";
    $mduration = "";
    $eduration = "";
    $sql = "SELECT * FROM tbl_examinations WHERE exam_id = '$exam_id' AND category = '$mycategory'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
           $subject = $row['subject'];
           $exam_name = $row['exam_name'];
           $startdate = $row['date'];
           $deadline = $row['end_date'];
           $mduration = $row['duration'];
           $eduration = $row['end_duration'];
           $duration = date("g:iA", strtotime($row['duration']));
           $endduration = date("g:iA", strtotime($row['end_duration']));
           $passmark = $row['passmark'];
           $reexam = $row['re_exam'];
           $terms = $row['terms'];
           $status = $row['status'];
           $today_date = date('Y/m/d');
           $next_retake = date('m/d/Y', strtotime($today_date. ' + '.$reexam.' days'));
           $dcv = date_format(date_create_from_format('m/d/Y', $deadline), 'Y/m/d');

           if ($status == "Inactive") {
               header("location:./");	
           }
       }
   } else {
    header("location:./");	
}

$quest = 0;
$sql = "SELECT * FROM tbl_questions WHERE exam_id = '$exam_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $quest++;
    }
} 

$sql = "SELECT * FROM tbl_assessment_records WHERE student_id = '$myid' AND exam_id = '$exam_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $record_found = 1;
        $score = $row['score'];
        $status = $row['status'];
        $take_date = $row['date'];
        $retake_date = $row['next_retake'];
        $today_date = date('Y/m/d');
        $retakeconv = date_format(date_create_from_format('m/d/Y', $retake_date), 'Y/m/d');
        $tc = strtotime($today_date);
        $rc = strtotime($retakeconv);
        $dc = strtotime($dcv);
        $td = ($tc - $rc)/86400;
        $dcc = ($tc - $dc)/86400;

    }
} else {

}


$conn->close();
}else{

    header("location:./");	
}

?>
<!-- header section -->
<?php require 'winclude/header.php'; ?>

<!-- body -->
<body class="page-header-fixed">
    <div class="overlay"></div>

    <!-- profile side menu -->
    <?php require 'winclude/nav-sidemenu.php'; ?>
    <main class="page-content content-wrap">
        <!-- navbar section -->
        <?php require 'winclude/navbar.php'; ?>
        <!-- sidebar section -->
        <?php require 'winclude/sidebar.php'; ?>

        <!-- main body section -->
        <div class="page-inner">
            <div class="page-title">
                <h3>Take Assessment</h3>
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="examinations.php">Assessments</a></li>
                        <li class="active"><?php echo "$exam_name"; ?></li>
                    </ol>
                </div>
            </div>
            <div id="main-wrapper">
                <div class="row col-md-12">
                    <div class="col-md-6">

                        <div class="row">
                         <div class="panel panel-white">
                            <div class="panel-heading">
                                <h4 class="panel-title">Examination Properties</h4>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive project-stats">  
                                 <table class="table">
                                 </thead>
                                 <tbody>
                                     <tr>
                                         <th scope="row">1</th>
                                         <td>Exam Name</td>
                                         <td><?php echo "$exam_name"; ?></td>
                                     </tr>
                                     <tr>
                                         <th scope="row">2</th>
                                         <td>Subject</td>
                                         <td><?php echo "$subject"; ?></td>
                                     </tr>
                                     <tr>
                                         <th scope="row">3</th>
                                         <td>Start Date</td>
                                         <td><?php echo "$startdate"; ?></td>
                                     </tr>
                                     <tr>
                                         <th scope="row">4</th>
                                         <td>End Date</td>
                                         <td><?php echo "$deadline"; ?></td>
                                     </tr>

                                     <tr>
                                         <th scope="row">5</th>
                                         <td>Start Duration</td>
                                         <td><?php echo "$duration"; ?> </td>
                                     </tr>
                                     <tr>
                                         <th scope="row">6</th>
                                         <td>End Duration</td>
                                         <td><?php echo "$endduration"; ?></td>
                                     </tr>

                                     <tr>
                                         <th scope="row">7</th>
                                         <td>Passmark</td>
                                         <td><?php echo "$passmark"; ?>%</td>
                                     </tr>

                                     <tr>
                                         <th scope="row">8</th>
                                         <td>Questions</td>
                                         <td><b><?php echo "$quest"; ?></b></td>
                                     </tr>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h3 class="panel-title">Terms and conditions</h3>
                </div>
                <div class="panel-body">
                    <?php echo "$terms"; ?>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h3 class="panel-title">Take Assessment</h3>
                </div>
                <div class="panel-body">
                    <?php
                    $_SESSION['current_examid'] = $exam_id;
                    $_SESSION['student_retake'] = 1;
                    //get Minutes
                    function Minutes($time) {
                        $timeArr = explode(':', $time);
                        $decTime = round(($timeArr[0]*60) + ($timeArr[1]) + ($timeArr[2]/60));
                        return $decTime;
                    }
                    $Time = 0;
                    if($startdate == date('m/d/yy'))
                    {
                        $startTime = Minutes($mduration);
                        $endTime = Minutes($eduration);
                        $currentTime= Minutes(date("H:i:s"));
                        if(($endTime-$currentTime)>0)
                        {
                            $Time = ($startTime-$currentTime);
                        }  
                    }
                    ?>

                    <input type="hidden" id="examID" value="<?php echo $exam_id; ?>" />
                    <input type="hidden" id="hdfTestDuration" value="<?php echo $Time; ?>" />
                    <div style="padding: 15px 0 13px 0px; " class="alert alert-info" id="time-text">
                     <td>
                        <span style="padding: 0px 10px; font-weight: bold; font-size:18px!important;">Exam Starts In :
                        </span>
                    </td>
                    <td>
                        <span class="timer-title time-started" style="font-size:18px;">00:00:00</span>
                    </td>
                </div>
                <span id="timers"></span> 
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h3 class="panel-title">Assessment History</h3>
            </div>
            <div class="panel-body">
                <?php
                if ($record_found == "1") {
                    print '
                    <div class="alert alert-info" role="alert">
                    You attend this exam on <strong>'.$take_date.'</strong> , your score was <strong>'.$score.'%</strong>
                    </div>';		

                }else{
                    print '
                    <div class="alert alert-info" role="alert">
                    No records found.
                    </div>';								

                }

                ?>

            </div>
        </div>
    </div>
</div>
</div>
</div>
</main>

<!-- footer section  -->
<?php require 'winclude/footer.php'; ?>
