<!-- header section -->
<?php require 'winclude/header.php'; ?>
<?php 
$qrcodetxt = 'ID:'.$myid.', NAME: '.$myfname.' '.$mylname.', GENDER: '.$mygender.', DEPARTMENT : Administration';
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
                    <h3>Admin Profile</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="./">Home</a></li>
                            <li class="active">Admin Profile</li>
                        </ol>
                    </div>
                </div>
                <div id="main-wrapper">
                      <div class="row">
                        <div class="col-md-12">
						<div class="row">
                            <div class="col-md-5">

                                <div class="panel panel-white">
                                    <div class="panel-body">
									<div class="col-md-6">
                                <?php 
						        if ($myavatar == NULL) {
						        print' <img class="img-responsive" src="../assets/images/'.$mygender.'.png" alt="'.$myfname.'">';
						        }else{
						        echo '<img src="data:image/jpeg;base64,'.base64_encode($myavatar).'" class="img-responsive"  alt="'.$myfname.'"/>';	
						        }
						
						        ?></div>
								<div class="col-md-6">
						        <?php print '<img width="150" src="../assets/qrcode/qr_img.php?d='.$qrcodetxt.'">'; ?>
						        </div>
								
                                    </div>
									<table class="table">
									<form action="pages/update_profile.php" method="POST">
                                        <tbody>
     
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>First Name</td>
                                                <td>
												<input type="text" value="<?php echo "$myfname"; ?>" class="form-control" name="fname" placeholder="Enter first name" required autocomplete="off"> 
												</td>
                                                
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Last Name</td>
                                                <td><input type="text" value="<?php echo"$mylname"; ?>" class="form-control" name="lname" placeholder="Enter last name" required autocomplete="off"> </td>
                                               
                                            </tr>
											<tr>
                                                <th scope="row">4</th>
                                                <td>Gender</td>
                                                <td>
												<select name="gender" required class="form-control">
												<option selected disbaled value="">-Select gender-</option>
												<option <?php if($mygender == "Male"){ print ' selected '; } ?> value="Male">Male</option>
												<option <?php if($mygender == "Female"){ print ' selected '; } ?>value="Female">Female</option>
												</select>
							                    </td>
                                               
                                            </tr>
											<tr>
                                                <th scope="row">5</th>
                                                <td>Date of birth</td>
                                                <td><input type="text" value="<?php echo "$mydob"; ?>"  class="form-control" name="dob" placeholder="mm/dd/YYYY" required autocomplete="off"> </td>
                                               
                                            </tr>

											<tr>
                                                <th scope="row">7</th>
                                                <td>Email Address</td>
                                                <td><input type="email" value="<?php echo "$myemail"; ?>"  class="form-control" name="email" placeholder="Enter email address" required autocomplete="off"> </td>
                                               
                                            </tr>
											<tr>
                                                <th scope="row">8</th>
                                                <td>Phone Number</td>
                                                <td><input type="text" value="<?php echo "$myphone"; ?>" class="form-control" name="phone" placeholder="Enter phone number" required autocomplete="off"> </td>
                                               
                                            </tr>
											<tr>
                                                <th scope="row"></th>
                                                <td colspan="2"><button type="submit" class="btn btn-primary">Save Changes</button></td>
                         
                                               
                                            </tr>
                                            </form>
                                        </tbody>
                                    </table>
                                </div>  
  
                            </div>
							
							<div class="col-md-7">

                                <div class="panel panel-white">
                                    <div class="panel-body">
									<h3>Update display picture</h3>
			                    <form action="pages/new_dp.php" method="POST" enctype="multipart/form-data">
								<div class="form-group">
                                <label for="exampleInputEmail1">Select image to upload</label>
                                <input type="file" name="image" accept="image/*" required autocomplete="off">
                                </div>
								<button type="submit" class="btn btn-primary">Upload</button>
								<?php 
						        if ($myavatar == NULL) {
						        
						        }else{
						        print '<a';?> onclick="return confirm('Delete image ?')" <?php print ' class="btn btn-danger" href="pages/drop_dp.php">Delete Image</a>'; 
						        }
						
						        ?>
								</form>
									
                             </div></div></div>
							 
							 
							 	<div class="col-md-7">

                                <div class="panel panel-white">
                                    <div class="panel-body">
									<h3>Update login password</h3>
			                    <form action="pages/new_pw.php" method="POST">
								<div class="form-group">
                                <label for="exampleInputEmail1">Enter new password</label>
                                <input type="password" id="password" class="form-control" name="pass1" required placeholder="Enter new password">
                                </div>
								
								<div class="form-group">
                                <label for="exampleInputEmail1">Confirm new password</label>
                                <input type="password" id="confirm_password" class="form-control" name="pass2" required placeholder="Confirm new password">
                                </div>
								<button type="submit" class="btn btn-primary">Change Password</button>
								<script>
	                                        var password = document.getElementById("password")
                                           , confirm_password = document.getElementById("confirm_password");

                                           function validatePassword(){
                                            if(password.value != confirm_password.value) {
                                           confirm_password.setCustomValidity("Passwords Don't Match");
                                           } else {
                                           confirm_password.setCustomValidity('');
                                            }
                                               }

                                            password.onchange = validatePassword;
                                            confirm_password.onkeyup = validatePassword;
                                 </script>
								</form>
									
                             </div></div></div>
							
							
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
        $("#dashboardA").addClass("active");
    });
</script>