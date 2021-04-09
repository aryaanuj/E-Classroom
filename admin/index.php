
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
        <div class="page-inner">
            <div class="page-title">
                <h3>Admin Dashboard</h3>
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="./">Home</a></li>
                        <li class="active">Admin Dashboard</li>
                    </ol>
                </div>
            </div>
            <div id="main-wrapper">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel info-box panel-white" style="background-image: linear-gradient(to right, #77EED8,#9EABE4);">
                            <a href="departments.php"><div class="panel-body">
                                <div class="info-box-stats">
                                    <p class="counter" style="color: white "><?php echo number_format($departments); ?></p>
                                    <span class="info-box-title" style="color: white !important">DEPARTMENTS</span>
                                </div>
                                <div class="info-box-icon">
                                    <i class="icon-folder" style="color: white "></i>
                                </div>
                            </div></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel info-box panel-white" style="background-image: linear-gradient(to right,#FBD72B,#F9484A);">
                            <a href="students.php"><div class="panel-body">
                                <div class="info-box-stats">
                                    <p class="counter" style="color: white !important"><?php echo number_format($students); ?></p>
                                    <span class="info-box-title" style="color: white ">STUDENTS</span>
                                </div>
                                <div class="info-box-icon">
                                    <i class="icon-user" style="color: white "></i>
                                </div>

                            </div></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel info-box panel-white"style="background-image: linear-gradient(to right,#6E45E1,#89D4CF">
                         <a href="examinations.php"> <div class="panel-body">
                            <div class="info-box-stats">
                                <p><span class="counter" style="color: white "><?php echo number_format($examination); ?></span></p>
                                <span class="info-box-title" style="color: white !important">EXAMINATIONS</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-book-open" style="color: white"></i>
                            </div>

                        </div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel info-box panel-white" style="background-image: linear-gradient(to right,#6782B4,#B1BFD8);">
                        <a href="subjects.php"><div class="panel-body">
                            <div class="info-box-stats">
                                <p class="counter" style="color: white "><?php echo number_format($subjects); ?></p>
                                <span class="info-box-title" style="color: white !important">SUBJECTS</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-docs" style="color: white "></i>
                            </div>
                        </div></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel info-box panel-white" style="background-image: linear-gradient(to right,#6782B4,#B1BFD8);">
                        <a href="categories.php"><div class="panel-body">
                            <div class="info-box-stats">
                                <p class="counter" style="color: white "><?php echo number_format($categories); ?></p>
                                <span class="info-box-title" style="color: white !important">CATEGORIES <?php echo "$fp $pp"; ?></span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-tag" style="color: white "></i>
                            </div>
                        </div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel info-box panel-white" style="background-image: linear-gradient(to right,#3EADCF,#ABE9CD);">
                        <a href="notice.php"><div class="panel-body">
                            <div class="info-box-stats">
                                <p class="counter" style="color: white"><?php echo number_format($notice); ?></p>
                                <span class="info-box-title" style="color: white !important">NOTICE</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-list" style="color: white"></i>
                            </div>

                        </div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel info-box panel-white" style="background-image: linear-gradient(to right,#FBD72B,#F9484A);">
                        <a href="questions.php"><div class="panel-body">
                            <div class="info-box-stats">
                                <p><span class="counter" style="color: white"><?php echo number_format($questions); ?></span></p>
                                <span class="info-box-title" style="color: white !important">QUESTIONS</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-question" style="color: white"></i>
                            </div>

                        </div></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel info-box panel-white" style="background-image: linear-gradient(to right,#6E45E1,#89D4CF);">
                        <a href=""><div class="panel-body">
                            <div class="info-box-stats">
                                <p class="counter" style="color: white "><?php echo number_format($banned_students); ?></p>
                                <span class="info-box-title" style="color: white !important">BANNED STUDENTS</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-lock" style="color: white "></i>
                            </div>
                        </div></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="panel panel-white">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="visitors-chart">
                                    <div class="panel-body">
                                        <div id="chartContainer"  style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
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

<!-- footer -->
<?php require 'winclude/footer.php'; ?>