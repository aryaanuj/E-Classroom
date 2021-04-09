<!-- header section -->
<?php require 'winclude/header.php'; ?>
<?php 

if (isset($_GET['eid'])) {
include '../database/config.php';
$exam_id = mysqli_real_escape_string($conn, $_GET['eid']);	

$sql = "SELECT * FROM tbl_examinations WHERE exam_id = '$exam_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $exam_name =$row['exam_name'];
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
            <div class="page-inner">
                <div class="page-title">
                    <h3>Add Questions - <?php echo "$exam_name"; ?></h3>
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
                                                <li role="presentation" class="active"><a href="#tab5" role="tab" data-toggle="tab">Multiple Choice</a></li>
                                            </ul>
                                    
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active fade in" id="tab5">
                                                <form action="pages/add_question.php?type=mc" method="POST">
											     <div class="form-group">
                                                <label for="exampleInputEmail1">Question</label>
                                                <!-- <input type="text" class="form-control" placeholder="Enter question" name="question" required autocomplete="off"> -->
                                                <textarea placeholder="Enter question" name="question" required autocomplete="off" id="content" class="form-control ckeditor"></textarea>
                                                </div>
                                                
                                      <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="100">Option No.</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row" >1</th>
                                                <td>
                                                <div class="form-group">
                                                <label for="exampleInputEmail1">Option 1</label>
                                                <textarea type="text" class="form-control" placeholder="Enter option 1" name="opt1" required autocomplete="off"></textarea>
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>
                                                <div class="form-group">
                                                <label for="exampleInputEmail1">Option 2</label>
                                                <textarea type="text" class="form-control" placeholder="Enter option 2" name="opt2" required autocomplete="off"></textarea>
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>
                                                <div class="form-group">
                                                <label for="exampleInputEmail1">Option 3</label>
                                                <textarea type="text" class="form-control" placeholder="Enter option 3" name="opt3" required autocomplete="off"></textarea>
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>
                                                <div class="form-group">
                                                <label for="exampleInputEmail1">Option 4</label>
                                                <textarea type="text" class="form-control" placeholder="Enter option 4" name="opt4" required autocomplete="off"></textarea>
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                            <td colspan="4">
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Answer:</label>
                                            <select class="form-control" name="answer">
                                            <option value="option1">option1</option>
                                            <option value="option2">option2</option>
                                            <option value="option3">option3</option>
                                            <option value="option4">option4</option>
                                            </select>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                        
                                    </table>
									<input type="hidden" name="exam_id" value="<?php echo "$exam_id"; ?>">
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
        $("#questionA").addClass("active");
    });
</script>
<script>
CKEDITOR.replace( 'content', {
    height: 200,
    filebrowserUploadUrl: "upload_question_image.php"
});
</script>
