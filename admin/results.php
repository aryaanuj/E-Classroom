<!-- header section -->
<?php require 'winclude/header.php'; ?>
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
            <h3>Manage Results</h3>
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
                                   $sql = "SELECT * FROM tbl_examinations";
                                   $result = $conn->query($sql);

                                   if ($result->num_rows > 0) {
                                      print '
                                      <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                      <thead>
                                      <tr>
                                      <th>Name</th>
                                      <th>Category</th>
                                      <th>Subject</th>
                                      <th>Date</th>
                                      <th>Duration</th>
                                      <th>Passmark</th>
                                      <th>RE Exam</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                      </tr>
                                      </thead>
                                      <tfoot>
                                      <tr>
                                      <th>Name</th>
                                      <th>Category</th>
                                      <th>Subject</th>
                                      <th>Date</th>
                                      <th>Duration</th>
                                      <th>Passmark</th>
                                      <th>RE Exam</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                      </tr>
                                      </tfoot>
                                      <tbody>';

                                      while($row = $result->fetch_assoc()) {
                                          $status = $row['status'];
                                          if ($status == "Active") {
                                              $st = '<p class="text-success">ACTIVE</p>';
                                              $stl = '<a href="pages/make_ex_in.php?id='.$row['exam_id'].'">Make Inactive</a>';
                                          }else{
                                              $st = '<p class="text-danger">INACTIVE</p>'; 
                                              $stl = '<a href="pages/make_ex_ac.php?id='.$row['exam_id'].'">Make Active</a>';											   
                                          }
                                          print '
                                          <tr>
                                          <td>'.$row['exam_name'].'</td>
                                          <td>'.$row['category'].'</td>
                                          <td>'.$row['subject'].'</td>
                                          <td>'.$row['date'].'</td>
                                          <td>'.$row['duration'].'</td>
                                          <td>'.$row['passmark'].'<b>%</b></td>
                                          <td>'.$row['re_exam'].'<b> day(s)</b></td>
                                          <td>'.$st.'</td>
                                          <td><div class="btn-group" role="group">
                                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                          Select Action
                                          <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu" role="menu">

                                          <li><a href="view-results.php?eid='.$row['exam_id'].'">View Results</a></li>
                                          <li><a href="summary.php?eid='.$row['exam_id'].'">Short Summary</a></li>

                                          </ul>
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