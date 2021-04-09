<?php
include('database/config.php'); 
include('include/head.php');
$dept = $_GET['dept'];
?>

	<!-- Courses -->

	<div class="courses" style="margin-top: 100px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="section_title text-center"><h2>Choose your Department</h2></div>
					<div class="section_subtitle">Suspendisse tincidunt magna eget massa hendrerit efficitur. Ut euismod pellentesque imperdiet. Cras laoreet gravida lectus, at viverra lorem venenatis in. Aenean id varius quam. Nullam bibendum interdum dui, ac tempor lorem convallis ut</div>
				</div>
			</div>
			<div class="row courses_row mt-5">
				<?php 

				$sql = "SELECT * FROM tbl_categories WHERE department = '$dept'";
				$res = mysqli_query($conn, $sql);
				if(mysqli_num_rows($res)>0){
					while($row=mysqli_fetch_array($res)){
						?>

				<!-- Course -->
				<div class="col-lg-4 col-md-6">
					<div class="course">
						<div class="course_image"><img src="images/course_1.jpg" alt=""></div>
						<div class="course_body">
							
							<div class="course_title"><h3><a href="branchdetails.php?dept=<?php echo $row['name'] ?>"><?php echo $row['name'] ?></a></h3></div>
							<div class="course_text">Maecenas rutrum viverra sapien sed ferm entum. Morbi tempor odio eget lacus tempus pulvinar.</div>
							<div class="course_footer d-flex align-items-center justify-content-start">
								<!-- <div class="course_author_image"><img src="images/featured_author.jpg" alt="https://unsplash.com/@anthonytran"></div> -->
								<!-- <div class="course_author_name">By <a href="#">James S. Morrison</a></div> -->
								<div class="course_sales ml-auto"><span>Registered: </span><?php echo $row['date_registered']; ?></div>
							</div>
						</div>
					</div>
				</div>
				<?php
					}
				}else{
					echo '<p>No department Found</p>';
				}
				?>

			</div>

			<!-- Pagination -->
			<!-- <div class="row">
				<div class="col">
					<div class="courses_paginations d-inline" >
						<ul>
							<li class="active d-inline"><a href="#">01</a></li>
							<li><a href="#">02</a></li>
							<li><a href="#">03</a></li>
							<li><a href="#">04</a></li>
							<li><a href="#">05</a></li>
						</ul>
					</div>
				</div>
			</div> -->
		</div>
	</div>
<?php 
include('include/footer.php');
?>