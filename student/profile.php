<!-- header section -->
<?php require 'winclude/header.php'; ?>

<?php 
// profile QR-CODE section
$qrcodetxt = 'ID:'.$myid.', NAME: '.$myfname.' '.$mylname.', GENDER: '.$mygender.', DEPARTMENT : '.$mydepartment.', CATEGORY : '.$mycategory.'';
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

      <!-- main body section -->
      <div class="page-inner">
        <div class="page-title">
            <h3>Student Profile</h3>
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="./">Home</a></li>
                    <li class="active">Student Profile</li>
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
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Registration Number</td>
                                <td><b><?php echo "$myid"; ?></b></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>First Name</td>
                                <td><b><?php echo "$myfname"; ?></b></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Last Name</td>
                                <td><b><?php echo "$mylname"; ?></b></td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Gender</td>
                                <td><b><?php echo "$mygender"; ?></b></td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Date of birth</td>
                                <td><b><?php echo "$mydob"; ?></b></td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td colspan="2">Address<br><i><?php echo "$myaddress"; ?></i></td>
                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td>Email Address</td>
                                <td><b><?php echo "$myemail"; ?></b></td>
                            </tr>
                            <tr>
                                <th scope="row">8</th>
                                <td>Phone Number</td>
                                <td><b><?php echo "$myphone"; ?></b></td>
                            </tr>
                            <tr>
                                <th scope="row">9</th>
                                <td>Department</td>
                                <td><b><?php echo "$mydepartment"; ?></b></td>
                            </tr>
                            <tr>
                                <th scope="row">10</th>
                                <td>Category</td>
                                <td><b><?php echo "$mycategory"; ?></b></td>
                            </tr>
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
              </div>
          </div>
      </div>
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