<?php
if(!isset($_GET['sub']) && !isset($_GET['cat']))
{
  header("location:lectures.php");
}
?>
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
        <h3>Video Lectures of <?php echo $_GET['sub']; ?></h3>
      </div>
      <div id="main-wrapper">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-white">
                  <div class="panel-body">
                    <div class="row">
                      <?php 
                        include '../database/config.php';
                        $query = "SELECT * FROM tbl_video_lecture WHERE subject='".$_GET['sub']."' AND category='".$_GET['cat']."'";
                        $result = mysqli_query($conn, $query);
                        if(mysqli_num_rows($result))
                        {
                          while($row=mysqli_fetch_array($result))
                          {
                        ?>
                      <div class="col-md-3">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <video src="../video-lectures/<?php echo $row['video']; ?>" class="img-fluid" controls width="100%" height="auto"></video>
                          </div>
                          <div class="panel-footer">
                            <div class="row">
                              <p class="text-center text-info"><b><?php echo $row['description']; ?></b><p>
                              </div>
                              <div class="row">
                                <p class="text-center"><b>Date: <?php echo $row['v_datetime']; ?></b></p>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php }
                        }
                        else
                        {
                          echo "<h3 class='text-center'>No Lectures Available.</h3>";
                        }
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
        $("#videoA").addClass("active");
      });
    </script>