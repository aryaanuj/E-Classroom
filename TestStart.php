<?php 
//start session
session_start();

//database connection
include("../database_connection.php");

//check session
include("SessionCheck.php");

$user = $_POST['user'];
$sid = $_POST['sid'];
$date = date('y-m-d');
$time = date('H:i:s');

if($user!="" && $sid!="")
{
 
  $course = " ";
  $isExam = true;
  //fetch latest exam
  $query2 = mysqli_query($con, "SELECT * FROM visitor WHERE startdate='$date' AND end_duration >= '$time' ORDER BY duration ASC LIMIT 1 ")or die(mysqli_error($con));
  if(mysqli_num_rows($query2)>0)
  {
    while($row2 = mysqli_fetch_array($query2)){
      $course = $row2['examdesc'];
    } 
  }
  else
  {
    $isExam = false;
  }

  // echo "<script>alert('".$course."')</script>";

  ?>

  <!DOCTYPE html>
  <html>
  <head>
    <title>Triyambak Life Sciences | Online Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="CSIR NET life science coaching kanpur, CSIR net coaching kanpur, GATE COACHING KANPUR, NET life science coaching kanpur, Life science coaching kanpur, GATE Biotechnology coaching Kanpur" />
    <meta name="description" content="CSIR NET life science coaching kanpur. CSIR net coaching kanpur. GATE COACHING KANPUR. NET life science coaching kanpur. Life science coaching kanpur. GATE Biotechnology coaching Kanpur." />
    <link href="../img/tls_logo.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->

    <!-- Libraries CSS Files -->

    <!-- <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet"> -->
    <!-- <link href="../lib/animate/animate.min.css" rel="stylesheet"> -->
    <!-- <link href="../lib/venobox/venobox.css" media="screen" rel="stylesheet"> -->
    <!-- <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet"> -->
    <!-- <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet"> -->
    <!-- <link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet"> -->

    <!-- Main Stylesheet File -->
    <link rel="stylesheet" type="text/css" href="../style.css">
    <style>
    @media
    only screen and (-webkit-min-device-pixel-ratio: 1.5),
    only screen and (-o-min-device-pixel-ratio: 3/2),
    only screen and (min--moz-device-pixel-ratio: 1.5),
    only screen and (min-device-pixel-ratio: 1.5){
    html,body{width:100%;overflow-x:hidden;}
    }
  </style>

</head>
<body>

  <?php include("test_header.php") ?>

  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <div class="carousel-background"><img width="100%" height="auto" src="../img/home-slide/background.JPG" alt="" ></div>
            <div class="carousel-container">
              <div class="carousel-content">
              <?php
                $cour = "";
                $query = "SELECT * FROM users WHERE email='$user' OR s_contact='$user'";
                $res = mysqli_query($con, $query);
                if(mysqli_num_rows($res)>0)
                { while ($row=mysqli_fetch_array($res)) {
                 // $cour = $row['registered_course'];
                    $cour = $course;
                  }
                }
                $startdate ="";
                $starttime = "";
                $endtime = "";
                $enddate = "";
                $ttime = "";
                $sdate = "";
                $flag= false;
                $squery = "SELECT * FROM visitor WHERE startdate='$date' ORDER BY duration ASC LIMIT 1 ";
                $res = mysqli_query($con, $squery);
                if(mysqli_num_rows($res)>0)
                {
                  while($row=mysqli_fetch_array($res))
                  {
                    $startdate = strtotime($row['startdate']);
                    $enddate = strtotime($row['enddate']);
                    $starttime = strtotime($row['duration']);
                    $endtime = strtotime($row['end_duration']);
                    $ttime = strtotime($row['enddate'].$row['end_duration']);
                    $sdate = $row['startdate'];
                    if($enddate>$startdate)
                    {
                      $endtime = strtotime($row['enddate'].$row['end_duration']);
                    }
                  }
                }
                $query="SELECT * FROM result WHERE student_id='$sid' AND subDate='$sdate'";
                $run = mysqli_query($con, $query);
                if(mysqli_num_rows($run)>0)
                { 
                  while($row1= mysqli_fetch_array($run))
                  {
                    $sttime = strtotime($row1['subTime']);
                    $stdate = strtotime($row1['subDate']);

                    if(($sttime>$starttime) && ($sttime<$endtime) && ($stdate<=$enddate))
                    {
                      $flag = true;
                    }
                  }
                }
                if($flag==true)
                { ?>
                  <form method="post" action="" id="sform" style="visibility:hidden;">
                    <input type="hidden" id="s1" name="course" value="1"> 
                    <input type="submit"  class="btn btn-outline-warning btn-lg" disabled value="Done">
                  </form>
                  <?php }else{?>
                     <input type="hidden" id="s1" name="course" value="2"> 
                     <?php } ?>
                     <div id="rs">
                      <h2 id="smsg"><?php if($isExam){ echo "Exam Starts in";}else {echo "Exam Ended";} ?></h2>
                      <h2 id="stime"></h2>
                      <form name="course" id="course" method="post" action="OnlineTest.php">
                        <?php
                        if($course!=" ")
                        {
                          
                          $query = "SELECT * FROM users WHERE email='$user' OR s_contact='$user' LIMIT 1" ;
                          $res = mysqli_query($con, $query);
                          if(mysqli_num_rows($res)>0)
                          {
                            while ($row=mysqli_fetch_array($res)) {
                            // $course = $row['registered_course'];
                              ?>
                             
                                <input type="hidden" id="cou" name="courses" value="<?php echo $course; ?>"> 
                                <input type="hidden" name="user" value="<?php echo $user; ?>">
                                <input type="hidden" name="sid" value="<?php echo $sid; ?>">
                                <input type="submit" class="btn btn-outline-warning btn-lg" value="Start Test" id="exam_ready_btn" disabled>
                             
                              <br>
                              <?php
                            }
                          }
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section><!-- #intro -->

        <!--Javascripts Files-->

        <script src="../lib/jquery/jquery.min.js"></script>
        <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
       <!--  <script src="../lib/easing/easing.min.js"></script>
        <script src="../lib/superfish/hoverIntent.js"></script>
        <script src="../lib/superfish/superfish.min.js"></script>
        <script src="../lib/wow/wow.min.js"></script>
        <script src="../lib/venobox/venobox.min.js"></script>
        <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="../lib/waypoints/waypoints.min.js"></script>
        <script src="../lib/counterup/counterup.min.js"></script>
        <script src="../lib/isotope/isotope.pkgd.min.js"></script>
        <script src="../lib/lightbox/js/lightbox.min.js"></script>
        <script src="../lib/touchSwipe/jquery.touchSwipe.min.js"></script> -->

        <!-- Main Javascript File -->
        <!-- <script src="../js/main.js"></script> -->

        <script type="text/javascript">

         
          var times = setInterval(function(){
           var course = document.getElementById("cou").value;
           var ss = document.getElementById("s1").value;
           var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               if( xmlhttp.responseText == 1 ){
            if(ss=='2')
            {
              document.getElementById("stime").innerHTML ="Exam is Running";
              document.getElementById("exam_ready_btn").disabled=false;
              document.getElementById("smsg").innerHTML ="";
            }
            else if(ss=='1')
            {
             document.getElementById("rs").innerHTML ="";
             document.getElementById("sform").style.visibility ="visible";
           }
           clearInterval(times);
         }else if (xmlhttp.responseText == 0) {
          document.getElementById("stime").innerHTML ="Exam Ended";
          document.getElementById("smsg").innerHTML ="";
          clearInterval(times);
        }
        else
        {
          document.getElementById("stime").innerHTML = xmlhttp.responseText;
        }
              }
            };
           xmlhttp.open("GET","examresponse.php?course="+course,true);
           xmlhttp.send(null);
          
      },1000);

    </script>
    <script>
     $(document).ready(function(){
      $('.dropdown-toggle').dropdown();
      $('#add').tooltip('show');
      $('#add').tooltip('hide');
    });
  </script> 
</body>
</html>
<?php }else { echo "<script>window.location='../Courses.php'; </script>";} ?>