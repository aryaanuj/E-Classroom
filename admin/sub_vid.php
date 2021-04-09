<!-- header section -->
<?php require 'winclude/header.php'; ?>
<?php
include '../database/config.php';
$cat_id = $_GET['id'];
$sql = "SELECT * FROM tbl_categories WHERE category_id= '$cat_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
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
            <div class="page-inner">
                <div class="page-title">
                    <h3>Manage Video Lectures</h3>
                   <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="vid_lectures.php">Department</a></li>
                            <li class="active"><?= $row['name']; ?></li>
                            <li >Subjects</li>
                        </ol>
                    </div>
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
                                                <li role="presentation" class="active"><a href="#tab5" role="tab" data-toggle="tab">Subjects</a></li>
                                            </ul>
                                    
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active fade in" id="tab5">
                                           <div class="table-responsive">
										   <?php
										   include '../database/config.php';
										   $sqls = "SELECT * FROM tbl_subjects WHERE category='".$row['name']."'";
                                           $results = $conn->query($sqls);

                                           if ($results->num_rows > 0) {
										print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
												<th>Subject ID</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
												<th>Category ID</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';
     
                                           while($rows = $results->fetch_assoc()) {
											   $stl = '<a href="L-videos.php?cat='.$rows['category'].'&&sub='.$rows['name'].'&&cat_id='.$cat_id.'">View Lectures</a>';
											   
                                          print '
										       <tr>
                                                <td>'.$rows['name'].'</td>
												<td>'.$rows['subject_id'].'</td>
                                                <td><div class="btn-group" role="group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    Select Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>'.$stl.'</li>
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
                                         <form action="pages/add_video.php" method="POST" enctype="multipart/form-data">
										<div class="form-group">
                                            <label for="exampleInputEmail1">Select Department</label>
                                            <select class="form-control" name="department" id="dept" required>
											<option value="" selected disabled>-Select department-</option>
											<?php
											include '../database/config.php';
											$sql = "SELECT * FROM tbl_departments WHERE status = 'Active' ORDER BY name";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
    
                                            while($row = $result->fetch_assoc()) {
                                            print '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                                            }
                                           } else {
                          
                                            }
                                             $conn->close();
											 ?>
											
											</select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category Name</label>
                                            <select class="form-control" name="category" id="category" required>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputEmail1">Subject Name</label>
                                            <select class="form-control" name="subject" id="subject" required>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Choose Video</label>
                                            <input type="file" name="video_lec" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> Topic</label>
                                            <textarea type="text" name="description" class="form-control"></textarea> 
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
        $("#videoA").addClass("active");

        $("#dept").change(function(){

            var dept = $(this).val();
            $.ajax({
                url:"fetch_categories.php",
                method:"POST",
                data:{dept:dept},
                success:function(data)
                {
                    $("#category").html(data);
                }
            });
        }); 

        $("#category").change(function(){

            var dept = $("#dept").val();
            var cat = $("#category").val();
            $.ajax({
                url:"fetch_subject.php",
                method:"POST",
                data:{dept:dept, cat:cat},
                success:function(data)
                {
                    $("#subject").html(data);
                }
            });
        }); 
    });
</script>