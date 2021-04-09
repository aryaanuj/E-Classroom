<!-- header section -->
<?php require 'winclude/header.php'; ?>
<?php 
if (isset($_GET['sid'])) {
	include '../database/config.php';
	$student_id = mysqli_real_escape_string($conn, $_GET['sid']);
	$sql = "SELECT * FROM tbl_users WHERE user_id = '$student_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
	$sdfname = $row['first_name'];
	$sdlname = $row['last_name'];
	$sdgender = $row['gender'];
	$sddob = $row['dob'];
	$sdaddress = $row['address'];
	$sdemail = $row['email'];
	$sdphone = $row['phone'];
	$sddepartment = $row['department'];
	$sdcategory = $row['category'];
	$sdavatar = $row['avatar'];
	$sdstat = $row['acc_stat'];

    }
} else {
    header("location:./");
}
	
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
                    <h3>Edit Student - <?php echo "$sdfname"; ?> <?php echo "$sdlname"; ?></h3>
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
						<div class="row">
                            <div class="col-md-12">

                                <div class="panel panel-white">
                                    <div class="panel-body">
                                         <form action="pages/update_student.php" method="POST">
										<div class="form-group">
                                            <label for="exampleInputEmail1">First Name</label>
                                            <input type="text" value="<?php echo "$sdfname"; ?>" class="form-control" placeholder="Enter first name" name="fname" required autocomplete="off">
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputEmail1">Last Name</label>
                                            <input type="text" value="<?php echo "$sdlname"; ?>" class="form-control" placeholder="Enter last name" name="lname" required autocomplete="off">
                                        </div>
										<div class="form-group">
										  <label for="exampleInputEmail1">Male</label>
                                            <input type="radio"  <?php if ($sdgender == "Male") { print ' checked '; } ?> name="gender" value="Male" required>
                                            <label for="exampleInputEmail1">Female</label>
                                            <input type="radio" <?php if ($sdgender == "Female") { print ' checked '; } ?> name="gender" value="Female" required>
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputEmail1">Email Address</label>
                                            <input type="email" value="<?php echo "$sdemail"; ?>" class="form-control" placeholder="Enter email address" name="email" required autocomplete="off">
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputEmail1">Phone</label>
                                            <input type="text" value="<?php echo "$sdphone"; ?>" class="form-control" placeholder="Enter phone" name="phone" required autocomplete="off">
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputEmail1">Select Department</label>
                                            <select class="form-control" name="department" required>
											<option value="" selected disabled>-Select department-</option>
											<?php
											include '../database/config.php';
											$sql = "SELECT * FROM tbl_departments WHERE status = 'Active' ORDER BY name";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
    
                                            while($row = $result->fetch_assoc()) {
											if ($sddepartment == $row['name'] ) {
											print '<option selected value="'.$row['name'].'">'.$row['name'].'</option>';	
											}else{
											print '<option value="'.$row['name'].'">'.$row['name'].'</option>';	
											}
                                            
                                            }
                                           } else {
                          
                                            }
                                             $conn->close();
											 ?>
											
											</select>
                                        </div>
										
										<div class="form-group">
                                            <label for="exampleInputEmail1">Select Category</label>
                                            <select class="form-control" name="category" required>
											<option value="" selected disabled>-Select category-</option>
											<?php
											include '../database/config.php';
											$sql = "SELECT * FROM tbl_categories WHERE status = 'Active' ORDER BY name";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
    
                                            while($row = $result->fetch_assoc()) {
                                            if ($sdcategory == $row['name'] ) {
											print '<option selected value="'.$row['name'].'">'.$row['name'].'</option>';	
											}else{
											print '<option value="'.$row['name'].'">'.$row['name'].'</option>';	
											}
                                            }
                                           } else {
                          
                                            }
                                             $conn->close();
											 ?>
											
											</select>
                                        </div>
										
									<div class="form-group">
                                    <label >Date of Birth</label>
                                    <input value="<?php echo "$sddob"; ?>" type="text" class="form-control date-picker" name="dob" required autocomplete="off" placeholder="Select date of birth">
                                    </div>
									
									<div class="form-group">
                                            <label for="exampleInputEmail1">Address</label>
                                            <textarea style="resize: none;" rows="4" class="form-control" placeholder="Enter address" name="address" required autocomplete="off"><?php echo "$sdaddress"; ?></textarea>
                                     </div>
                                      <input type="hidden" name="student_id" value="<?php echo "$student_id"; ?>">

                                        <button type="submit" class="btn btn-primary">Update <?php echo "$sdfname"; ?></button>
                                       </form>
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
        $("#studentA").addClass("active");
    });
</script>