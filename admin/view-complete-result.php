<!-- header section -->
<?php require 'winclude/header.php'; ?>
<?php 

if (isset($_GET['eid']) && isset($_GET['sid'])) {
include '../database/config.php';
$exam_id = $_GET['eid'];
$student_id = $_GET['sid'];
$sql = "SELECT * FROM tbl_assessment_records WHERE exam_id = '$exam_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $exam_name = $row['exam_name'];
    }
} else {

}
$conn->close();
    
}else{
    
header("location:./");  
}
?>
       
<title><?php echo "$exam_name" ?> Results</title>

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
                    <h3><?php echo "$exam_name" ?> Results</h3>
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="panel panel-white">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                           <?php
                                           include '../database/config.php';
                                           $sql = "SELECT * FROM tbl_result WHERE exam_id = '$exam_id' AND student_id='$student_id'";
                                           $result = $conn->query($sql);

                                           if ($result->num_rows > 0) {
                                        print '
                                        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Student Id</th>
                                                <th>Total Questions</th>
                                                <th>Attempted</th>
                                                <th>Correct</th>
                                                <th>Incorrect</th>
                                                <th>Score</th>
                                                <th>Date</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Student Id</th>
                                                <th>Total Questions</th>
                                                <th>Attempted</th>
                                                <th>Correct</th>
                                                <th>Incorrect</th>
                                                <th>Score</th>
                                                <th>Date</th>
                                                <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';
     
                                           while($row = $result->fetch_assoc()) {
                                          print '
                                               <tr>
                                                <td>'.$row['student_id'].'</td>
                                                <td>'.$row['totalQ'].'</td>
                                                <td>'.$row['attempted'].'</td>
                                                <td><b>'.$row['correct'].'</b></td>
                                                <td>'.$row['incorrect'].'</td>
                                                <td>'.$row['score'].'%</td>
                                                <td>'.$row['subDate'].'</td>
                                                <td><div class="btn-group" role="group">
                                                <a '; ?> onclick = "return confirm('Delete Result')" <?php print ' href="pages/drop-result.php?sid='.$row['student_id'].'&eid='.$exam_id.'" type="button" class="btn btn-danger">
                                                    Delete
                                                </a>
                    
                                            </div></td>
          
                                            </tr>';
                                           }
                                           
                                           print '
                                       </tbody>
                                       </table>  ';
                                            } else {
                                            print '
                                                <div class="alert alert-info" role="alert">
                                        Nothing was found in database.
                                    </div>';
    
                                           }
                                           $conn->close();
                                           
                                           ?>


                 

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