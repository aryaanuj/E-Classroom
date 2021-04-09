 <div class="page-sidebar sidebar">
                <div class="page-sidebar-inner slimscroll">
                    <div class="sidebar-header">
                        <div class="sidebar-profile">
                            <a href="javascript:void(0);" id="profile-menu-link">
                                <div class="sidebar-profile-image">
								<?php 
						        if ($myavatar == NULL) {
						        print' <img class="img-circle img-responsive" src="../assets/images/'.$mygender.'.png" alt="'.$myfname.'">';
						        }else{
						        echo '<img src="data:image/jpeg;base64,'.base64_encode($myavatar).'" class="img-circle img-responsive"  alt="'.$myfname.'"/>';	
						        }
						
						        ?>
                       
                                </div>
                                <div class="sidebar-profile-details">
                                    <span><?php echo "$myfname"; ?> <?php echo "$mylname"; ?><br><small>Administrator</small></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <ul class="menu accordion-menu">
                        <li class="active side_menu" id="dashboardA">
                            <a href="./" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a>
                        </li>
                        <li class="side_menu" id="departmentA">
                            <a href="departments.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-folder-open"></span><p>Departments</p></a>
                        </li>
                        <li class="side_menu" id="categoriesA">
                            <a href="categories.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-tags"></span><p>Categories</p></a>
                        </li>
                        <li class="side_menu" id="videoA">
                            <a href="vid_lectures.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-play"></span><p>Videos</p></a>
                        </li>
                        <li class="side_menu" id="subjectA">
                            <a href="subject.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-file"></span><p>Subjects</p></a>
                        </li>
                        <li class="side_menu" id="studentA">
                            <a href="students.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-user"></span><p>Students</p></a>
                        </li>
                        <li class="side_menu" id="examinationA">
                            <a href="examinations.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-book"></span><p>Examinations</p></a>
                        </li>
                        <li class="side_menu" id="questionA">
                            <a href="questions.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-question-sign"></span><p>Questions</p></a>
                        </li>
                        <li class="side_menu" id="noticeA">
                            <a href="notice.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-th-list"></span><p>Notice</p></a>
                        </li>
                        <li class="side_menu" id="resultA">
                            <a href="results.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-certificate"></span><p>Exam Results</p></a>
                        </li>
                    </ul>
                </div>
            </div>