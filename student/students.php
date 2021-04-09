<!-- header section -->
<?php require 'winclude/header.php'; ?>

<!-- body -->
<body class="page-header-fixed">
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
                <h3>Students In My Class</h3>
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="./">Home</a></li>
                        <li class="active">Students In My Class</li>
                    </ol>
                </div>
            </div>
            <div id="main-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-white">
                            <div class="panel-body">
                             <?php
                             include '../database/config.php';

                             $sql = "SELECT * FROM tbl_users WHERE category = '$mycategory' ORDER BY first_name";
                             $result = $conn->query($sql);

                             if ($result->num_rows > 0) {

                               while($row = $result->fetch_assoc()) {
                                   $user_avatar = $row['avatar'];
                                   $user_gender = $row['gender'];
                                   print '
                                   <div class="search-item clearfix">
                                   <div class="pull-left m-r-md">
                                   ';
                                   if ($user_avatar == NULL) {
                                      print' <img class="img-circle" width="80" src="../assets/images/'.$user_gender.'.png" alt="'.$row['first_name'].'">';
                                  }else{
                                      echo '<img src="data:image/jpeg;base64,'.base64_encode($user_avatar).'" class="img-circle" width="80"  alt="'.$row['first_name'].'"/>';	
                                  }
                                  print '	

                                  </div>
                                  <h3 class="no-m m-t-xs"><a href="javascript:void(0);">'.$row['first_name'].' '.$row['last_name'].'</a></h3>
                                  <p>'.$row['email'].'<br>'.$user_gender.'</p>
                                  </div>';
                              }
                          } else {

                          }
                          $conn->close();

                          ?>
                      </div>
                  </div>
              </div>
          </div>
      </div> 
  </div>
  <!-- main body section end -->
</main>

<!-- footer section -->
<?php require 'winclude/footer.php'; ?>

<!-- for active sidebar menu -->
<script type="text/javascript">
    $(document).ready(function(){
        $(".side_menu").removeClass("active");
        $("#studentA").addClass("active");
    });
</script>