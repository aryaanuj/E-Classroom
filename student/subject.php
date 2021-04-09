<!-- header section -->
<?php require 'winclude/header.php'; ?>
<!-- body -->
<body <?php if ($ms == "1") { print 'onload="myFunction()"'; } ?>  class="page-header-fixed">
    <div class="overlay"></div>

    <!-- profile side menu -->
    <?php require 'winclude/nav-sidemenu.php'; ?>

    <main class="page-content content-wrap">
      <!-- navbar section -->
      <?php require 'winclude/navbar.php'; ?>
      <!-- sidebar section -->
      <?php require 'winclude/sidebar.php'; ?>

      <!-- main body section  -->
      <div class="page-inner">
        <div class="page-title">
            <h3>My Subjects</h3>
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
                               $sql = "SELECT * FROM tbl_subjects WHERE department = '$mydepartment' AND category = '$mycategory'";
                               $result = $conn->query($sql);

                               if ($result->num_rows > 0) {
                                  print '
                                  <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                  <thead>
                                      <tr>
                                          <th>Name</th>
                                          <th>Category</th>
                                          <th>Department</th>
                                          <th>Status</th>
                                          <th>Date Registered</th>
                                      </tr>
                                  </thead>
                                  <tfoot>
                                      <tr>
                                          <th>Name</th>
                                          <th>Category</th>
                                          <th>Department</th>
                                          <th>Status</th>
                                          <th>Date Registered</th>
                                      </tr>
                                  </tfoot>
                                  <tbody>';

                                  while($row = $result->fetch_assoc()) {
                                      $status = $row['status'];
                                      if ($status == "Active") {
                                          $st = '<p class="text-success">ACTIVE</p>';
                                          $stl = '<a href="pages/make_sb_in.php?id='.$row['subject_id'].'">Make Inactive</a>';
                                      }else{
                                          $st = '<p class="text-danger">INACTIVE</p>'; 
                                          $stl = '<a href="pages/make_sb_ac.php?id='.$row['subject_id'].'">Make Active</a>';											   
                                      }
                                      print '
                                      <tr>
                                      <td>'.$row['name'].'</td>
                                      <td>'.$row['category'].'</td>
                                      <td>'.$row['department'].'</td>
                                      <td>'.$st.'</td>
                                      <td>'.$row['date_registered'].'</td>

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
<!-- main body section end -->
</main>
<?php if ($ms == "1") { ?> 
<div class="alert alert-success" id="snackbar"><?php echo "$description"; ?></div> <?php } else { } ?>

<!-- footer section  -->
<?php require 'winclude/footer.php'; ?>

<!-- for active sidebar menu -->
<script type="text/javascript">
    $(document).ready(function(){
        $(".side_menu").removeClass("active");
        $("#subjectA").addClass("active");
    });
</script>