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

       <div class="page-inner">
        <div class="page-title">
            <h3>Manage Departments</h3>
        </div>
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-white">
                            <div class="panel-body">
                                <div role="tabpanel">

                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#tab5" role="tab" data-toggle="tab">Departments</a></li>
                                        <li role="presentation"><a href="#tab6" role="tab" data-toggle="tab">Add Departments</a></li>
                                    </ul>
                                    
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active fade in" id="tab5">
                                           <div class="table-responsive">
                                             <?php
                                             include '../database/config.php';
                                             $sql = "SELECT * FROM tbl_departments";
                                             $result = $conn->query($sql);

                                             if ($result->num_rows > 0) {
                                              print '
                                              <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                              <thead>
                                              <tr>
                                              <th>Name</th>
                                              <th>Status</th>
                                              <th>Department ID</th>
                                              <th>Date Registered</th>
                                              <th>Action</th>
                                              </tr>
                                              </thead>
                                              <tfoot>
                                              <tr>
                                              <th>Name</th>
                                              <th>Status</th>
                                              <th>Department ID</th>
                                              <th>Date Registered</th>
                                              <th>Action</th>
                                              </tr>
                                              </tfoot>
                                              <tbody>';

                                              while($row = $result->fetch_assoc()) {
                                                  $status = $row['status'];
                                                  if ($status == "Active") {
                                                      $st = '<p class="text-success">ACTIVE</p>';
                                                      $stl = '<a href="pages/make_dp_in.php?id='.$row['department_id'].'">Make Inactive</a>';
                                                  }else{
                                                      $st = '<p class="text-danger">INACTIVE</p>'; 
                                                      $stl = '<a href="pages/make_dp_ac.php?id='.$row['department_id'].'">Make Active</a>';											   
                                                  }
                                                  print '
                                                  <tr>
                                                  <td>'.$row['name'].'</td>
                                                  <td>'.$st.'</td>
                                                  <td>'.$row['department_id'].'</td>
                                                  <td>'.$row['date_registered'].'</td>
                                                  <td><div class="btn-group" role="group">
                                                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                  Select Action
                                                  <span class="caret"></span>
                                                  </button>
                                                  <ul class="dropdown-menu" role="menu">
                                                  <li>'.$stl.'</li>
                                                  <li><a'; ?> onclick = "return confirm('Drop <?php echo $row['name']; ?> ?')" <?php print ' href="pages/drop_dep.php?id='.$row['department_id'].'">Drop Department</a></li>
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
                                <div role="tabpanel" class="tab-pane fade" id="tab6">
                                 <form action="pages/add_department.php" method="POST">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Department Name</label>
                                        <input type="text" class="form-control" placeholder="Enter department name" name="department" required autocomplete="off">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
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
        $("#departmentA").addClass("active");
    });
</script>