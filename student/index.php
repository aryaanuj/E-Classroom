<!-- header section -->
<?php require 'winclude/header.php'; ?>

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
                <h3>Student Dashboard</h3>
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="./">Home</a></li>
                        <li class="active">Student Dashboard</li>
                    </ol>
                </div>
            </div>
            <div id="main-wrapper">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel info-box panel-white" style="background-image: linear-gradient(to right, #77EED8,#9EABE4);">
                            <a href="students.php">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter" style="color: white"><?php echo number_format($students_in_my_class); ?></p>
                                        <span class="info-box-title" style="color:white !important ">STUDENTS IN MY CLASS</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-user iconsd"></i>
                                    </div>

                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel info-box panel-white" style="background-image: linear-gradient(to right,#FBD72B,#F9484A);">
                            <a href="examinations.php">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p><span class="counter" style="color: white"><?php echo number_format($active_examinations); ?></span></p>
                                        <span class="info-box-title" style="color:white !important ">ACTIVE EXAMINATIONS</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-book-open iconsd"></i>
                                    </div>

                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel info-box panel-white" style="background-image: linear-gradient(to right,#3EADCF,#ABE9CD);">
                            <a href="subject.php">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter" style="color: white"><?php echo number_format($my_subjects); ?></p>
                                        <span class="info-box-title" style="color:white !important ">SUBJECTS</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-docs iconsd"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="panel info-box panel-white"  style="background-image: linear-gradient(to right,#6E45E1,#89D4CF);">
                            <a href="">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter" style="color: white"><?php echo number_format($passed_exam); ?></p>
                                        <span class="info-box-title" style="color:white !important ">PASSED EXAMS</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-like iconsd"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel info-box panel-white" style="background-image: linear-gradient(to right,#6782B4,#B1BFD8);">
                            <a href="">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter" style="color: white"><?php echo number_format($notice); ?></p>
                                        <span class="info-box-title" style="color:white !important ">NOTICE</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-list iconsd"></i>
                                    </div>

                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel info-box panel-white" style="background-image: linear-gradient(to right,#6E45E1,#89D4CF);">
                            <a href="">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p><span class="counter" style="color: white"><?php echo number_format($failed_exam); ?></span></p>
                                        <span class="info-box-title" style="color:white !important ">FAILED EXAMS</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-dislike iconsd"></i>
                                    </div>

                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel info-box panel-white" style="background-image: linear-gradient(to right,#FBD72B,#F9484A);">
                            <a href="">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter" style="color: white"><?php echo number_format($locked_exams); ?></p>
                                        <span class="info-box-title" style="color:white !important ">LOCKED EXAMS</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-lock iconsd"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="panel info-box panel-white" style="background-image: linear-gradient(to right, #77EED8,#9EABE4);">
                            <a href=""><div class="panel-body">
                                <div class="info-box-stats">
                                    <p class="counter" style="color: white"><?php echo number_format($attended_exams); ?></p>
                                    <span class="info-box-title" style="color:white !important ">ATTENDED EXAMS</span>
                                </div>
                                <div class="info-box-icon">
                                    <i class="icon-check iconsd"></i>
                                </div>
                            </div></a>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h4 class="panel-title">Notice</h4>
                            </div>
                            <div class="panel-body">
                              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                <?php
                                include '../database/config.php';
                                $sql = "SELECT * FROM tbl_notice ORDER by id DESC";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                 $tabno = 1;
                                 while($row = $result->fetch_assoc()) {
                                    print '
                                    <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading'.$tabno.'">
                                    <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$tabno.'" aria-expanded="false" aria-controls="collapse'.$tabno.'">
                                    '.$row['title'].'
                                    </a>
                                    </h4>
                                    </div>
                                    <div id="collapse'.$tabno.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$tabno.'">
                                    <div class="panel-body">
                                    '.$row['description'].'
                                    <hr><i class="fa fa-calendar"></i> '.$row['post_date'].' | <i class="fa fa-refresh"></i> '.$row['last_update'].'
                                    </div>
                                    </div>
                                    </div>';
                                    $tabno++;
                                }
                            } else {
                                print '
                                <div class="alert alert-info" role="alert">
                                Nothing was found in database.
                                </div>';
                            }
                            $conn->close();

                            ?>

                        </div>
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