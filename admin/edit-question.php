<!-- header section -->
<?php require 'winclude/header.php'; ?>
<?php 
include '../database/config.php';
if (isset($_GET['id'])) {
$question_id = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "SELECT * FROM tbl_questions WHERE question_id = '$question_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $type = $row['type'];
	$question = $row['question'];
	$opt1 = $row['option1'];
	$opt2 = $row['option2'];
	$opt3 = $row['option3'];
	$opt4 = $row['option4'];
	$ans = $row['answer'];
    if($ans==$opt1)
    {
        $ans = "option1";
    }
    else if($ans==$opt2)
    {
        $ans = "option2";
    }
    else if($ans==$opt3)
    {
        $ans = "option3";
    }
    else if($ans==$opt4)
    {
        $ans = "option4";
    }

	
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
                    <h3>Edit Questions : <?php echo "$question_id"; ?></h3>
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
						<div class="row">
                            <div class="col-md-12">

                                <div class="panel panel-white">
                                    <div class="panel-body">
                                 <?php
									 print '
									  <form action="pages/update_question.php?type=mc" method="POST">
												<div class="form-group">
                                                <label for="exampleInputEmail1">Question</label>
                                                 <textarea placeholder="Enter question" name="question" required autocomplete="off" id="content" class="form-control ckeditor" >'.$question.'</textarea>
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
                                                <textarea type="text" class="form-control" placeholder="Enter option 1" name="opt1" required autocomplete="off">'.$opt1.'</textarea>
                                                </div>
												</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>
												<div class="form-group">
                                                <label for="exampleInputEmail1">Option 2</label>
                                                <textarea type="text" class="form-control" placeholder="Enter option 2" name="opt2" required autocomplete="off">'.$opt2.'</textarea>
                                                </div>
												</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>
												<div class="form-group">
                                                <label for="exampleInputEmail1">Option 3</label>
                                                <textarea type="text" class="form-control"  placeholder="Enter option 3" name="opt3" required autocomplete="off">'.$opt3.'</textarea>
                                                </div>
												</td>
                                            </tr>
											
											<tr>
                                                <th scope="row">3</th>
                                                <td>
												<div class="form-group">
                                                <label for="exampleInputEmail1">Option 4</label>
                                                <textarea type="text" class="form-control"  placeholder="Enter option 4" name="opt4" required autocomplete="off">'.$opt4.'</textarea>
                                                </div>
												</td>
                                            </tr>
                                             <tr>
                                            <td colspan="4">
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Answer:</label>
                                            <select class="form-control" name="answer">
                                            <option value="'.$ans.'">'.$ans.'</option>
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

									<input type="hidden" name="type" value="MC">
									<input type="hidden" name="question_id" value="'.$question_id.'">
									
									 <button type="submit" class="btn btn-primary">Submit</button>
												

												
												</form>';
									 
								 
								 
								 ?>
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