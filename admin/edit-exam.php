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
           $excate = $row['category'];
           $exsubject = $row['subject'];
           $exname = $row['exam_name'];
           $exdate = $row['date'];
           $exenddate = $row['end_date'];
           $exduration = $row['duration'];
           $exendduration = $row['end_duration'];
           $expassmark = $row['passmark'];
           $exreex = $row['re_exam'];
           $exterms = $row['terms'];
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
            <h3>Edit Exam - <?php echo "$exname"; ?></h3>
        </div>
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-white">
                            <div class="panel-body">
                               <form action="pages/update_exam.php" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Exam Name</label>
                                    <input type="text" value="<?php echo"$exname"; ?>" class="form-control" placeholder="Enter exam name" name="exam" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Start Date</label>
                                    <input type="text" class="form-control date-picker" value="<?php echo"$exdate"; ?>" name="start_date" required autocomplete="off" placeholder="Select start Date">
                                </div>
                                <div class="form-group">
                                    <label >Deadline</label>
                                    <input type="text" class="form-control date-picker" name="end_date" value="<?php echo"$exenddate"; ?>" required autocomplete="off" placeholder="Select deadline">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Start Time</label>
                                    <input type="time" value="<?php echo"$exduration"; ?>" class="form-control" placeholder="Enter exam start time" name="duration" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">End Time</label>
                                    <input type="time" value="<?php echo"$exendduration"; ?>" class="form-control" placeholder="Enter exam end duration" name="end_duration" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Passmark (%)</label>
                                    <input type="number" class="form-control" value="<?php echo"$expassmark"; ?>" placeholder="Enter passmark" name="passmark" required autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">RE exam (if you take exam then show it again after some days)</label>
                                    <input type="number" class="form-control" value="<?php echo"$exreex"; ?>" placeholder="Enter days to attempt" name="attempts" required autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Select Subject</label>
                                    <select class="form-control" name="subject" required>
                                     <option value="" selected disabled>-Select subject</option>
                                     <?php
                                     include '../database/config.php';
                                     $sql = "SELECT * FROM tbl_subjects WHERE status = 'Active' ORDER BY name";
                                     $result = $conn->query($sql);

                                     if ($result->num_rows > 0) {

                                        while($row = $result->fetch_assoc()) {
                                         if ($exsubject == $row['name']) {
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
                                 if ($excate == $row['name']) {
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
                    <label for="exampleInputEmail1">Terms and conditions</label>
                    <textarea style="resize: none;" rows="6" class="form-control" placeholder="Enter Terms and conditions" name="instructions" required autocomplete="off"><?php echo"$exterms"; ?></textarea>
                </div>
                <input type="hidden" name="examid" value="<?php echo "$exam_id"; ?>">


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
        $("#examinationA").addClass("active");
    });
</script>