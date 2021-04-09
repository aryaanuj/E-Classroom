<!-- header section -->
<?php require 'winclude/header.php'; ?>
<?php 

if (isset($_GET['id'])) {
include '../database/config.php';
$notice_id = $_GET['id'];
$sql = "SELECT * FROM tbl_notice WHERE notice_id = '$notice_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
     $post = $row['description'];
	 $title = $row['title'];
    }
} else {
header("location:./");
}
$conn->close();	
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
                    <h3>Edit Notice - <?php echo "$title"; ?></h3>
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
						<div class="row">
                            <div class="col-md-12">

                                <div class="panel panel-white">
                                    <div class="panel-body">
                                               <form action="pages/update_notice.php" method="POST">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input type="text" value="<?php echo "$title"; ?>" class="form-control" placeholder="Enter notice title" name="title" required autocomplete="off">
                                        </div>
										
										<div class="form-group">
                                            <label for="exampleInputEmail1">Decription</label>
                                            <textarea style="resize: none;" rows="4"  class="form-control" placeholder="Enter description here" name="description" required autocomplete="off"><?php echo "$post"; ?></textarea>
                                        </div>
                                        <input type="hidden" name="notice_id" value="<?php echo "$notice_id"; ?>" >
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
        </main>
       <?php if ($ms == "1") { ?> 
<div class="alert alert-success" id="snackbar"><?php echo "$description"; ?></div> <?php } ?>
<!-- footer section -->
<?php require 'winclude/footer.php'; ?>
<!-- for active sidebar menu -->
<script type="text/javascript">
    $(document).ready(function(){
        $(".side_menu").removeClass("active");
        $("#noticeA").addClass("active");
    });
</script>