<!-- header section -->
<?php require 'winclude/header.php'; ?>
<?php 
if (isset($_GET['eid'])) {
include '../database/config.php';
$exam_id = mysqli_real_escape_string($conn, $_GET['eid']);
$sql = "SELECT * FROM tbl_examinations WHERE exam_id = '$exam_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
     $excate = $row['category'];
	 $exsubject = $row['subject'];
	 $exname = $row['exam_name'];
	 $exdate = $row['date'];
	 $exduration = $row['duration'];
	 $expassmark = $row['passmark'];
	 $exreex = $row['re_exam'];
	 $exterms = $row['terms'];
    }
} else {
    header("location:./");
}

$stdpass = 0;
$stdfail = 0;

$sql = "SELECT * FROM tbl_assessment_records WHERE exam_id = '$exam_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $status = $row['status'];
	 if ($status == "PASS"){
		 $stdpass++;
	 }else{
		$stdfail++; 
		 
	 }
	 
    }
} else {

}

$conn->close();	
}else{
	header("location:./");
}
?>

<body <?php if ($ms == "1") { print 'onload="myFunction()"'; } ?>  class="page-header-fixed">
    <div class="overlay"></div>
    <!-- profile side menu -->
    <?php require 'winclude/nav-sidemenu.php'; ?>
    <main class="page-content content-wrap">
     <!-- navbar section -->
     <?php require 'winclude/navbar.php'; ?>

     <!-- sidebar section -->
     <?php require 'winclude/sidebar.php'; ?>
     <!-- main section -->
            <div class="page-inner">
                <div class="page-title">
                    <h3>Results Summary - <?php echo "$exname"; ?></h3>
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
						<div class="row">
                            <div class="col-md-12">

                                <div class="panel panel-white">
                                    <div class="panel-body">
									                               <div class="table-responsive project-stats col-md-4">  
                                       <table class="table">
                                           </thead>
                                           <tbody>
                                               <tr>
                                                   <th scope="row">1</th>
                                                   <td>Exam Name</td>
                                                   <td><?php echo "$exname"; ?></td>
                                               </tr>
											     <tr>
                                                   <th scope="row">2</th>
                                                   <td>Subject</td>
                                                   <td><?php echo "$exsubject"; ?></td>
                                               </tr>
											    <tr>
                                                   <th scope="row">3</th>
                                                   <td>Deadline</td>
                                                   <td><?php echo "$exdate"; ?></td>
                                               </tr>
											   
											    <tr>
                                                   <th scope="row">4</th>
                                                   <td>Duration</td>
                                                   <td><?php echo "$exduration"; ?> <b>min.</b></td>
                                               </tr>
											   
											   
											   <tr>
                                                   <th scope="row">5</th>
                                                   <td>Passmark</td>
                                                   <td><?php echo "$expassmark"; ?>%</td>
                                               </tr>
											   
					
                                              
                                           </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-8">
									<div id="chartContainer" style="height: 370px;"></div>
									</div>
                                    </div>
                                </div>  
  
                            </div>
                        </div>


                        </div>
                    </div>
                </div>
                
            </div>
        </main>
<?php if ($ms == "1") { ?> 
<div class="alert alert-success" id="snackbar"><?php echo "$description"; ?></div> <?php } ?>
<!-- footer section -->
<?php require 'winclude/footer.php'; ?>
<!-- for active sidebar menu -->
<script type="text/javascript">
    $(document).ready(function(){
        $(".side_menu").removeClass("active");
        $("#resultA").addClass("active");
    });
</script>
<script src="../assets/js/canvasjs.min.js"></script>
<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
exportEnabled: true,
	data: [{
		type: "pie",
		startAngle: 240,
				showInLegend: "true",
		legendText: "{label}",
		indexLabel: "{label} - {y}",
		dataPoints: [
			{y: <?php echo "$stdpass"; ?>, label: "Passed Students"},
			{y: <?php echo "$stdfail"; ?>, label: "Failed Students"},

		]
	}]
});
chart.render();

}
</script>
