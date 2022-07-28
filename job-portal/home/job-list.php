<!DOCTYPE html>
<html lang="en">
        <?php
            require '../constants/settings.php';
            require '../constants/check-login.php';
            $fromsearch = false;

            if (isset($_GET['search']) && $_GET['search'] == "1") {

            } else {

            }

            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                if ($page == "" || $page == "1") {
                    $page1 = 0;
                    $page = 1;
                } else {
                    $page1 = ($page * 16) - 16;
                }
            } else {
                $page1 = 0;
                $page = 1;
            }

            if ( isset( $_GET['country'] ) && isset( $_GET['category'] ) ) {
                $cate = $_GET['category'];
                $country = $_GET['country'];
                $query1 = "SELECT * FROM tbl_jobs WHERE category = :cate AND country = :country ORDER BY enc_id DESC LIMIT $page1,12";
                $query2 = "SELECT * FROM tbl_jobs WHERE category = :cate AND country = :country ORDER BY enc_id DESC";
                $fromsearch = true;

                $slc_country = "$country";
                $slc_category = "$cate";
                $title = "$slc_category jobs in $slc_country";
            } else {
                $query1 = "SELECT * FROM tbl_jobs ORDER BY enc_id DESC LIMIT $page1,12";
                $query2 = "SELECT * FROM tbl_jobs ORDER BY enc_id DESC";
                $slc_country = "NULL";
                $slc_category = "NULL";
                $title = "Job List";
            }
        ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  CSS LINK    -->
    <link rel="stylesheet" href="../css/styles.css">


    <title>FIND JOBS</title>
    <style>
        .main {
            padding: 10rem;
            height: 40vh;
            display: flex;
            justify-content: center;

        }
    </style>
</head>

<body>


    <nav id="navbar">

        <div class="navbar-logo">
            <a href="./"><img src="../img/large_jobguy.png" alt=""></a>
        </div>
        <div class="nav-links">

            <a href="./index.php">
                <div class="nav-link"><span>Home</span></div>

            </a>
            <a href="./job-list.php">
                <div class="nav-link"><span>Find Jobs</span></div>
            </a>
            <a href="./contact.php">
                <div class="nav-link"><span>Contact</span></div>
            </a>
        </div>
        <div class="buttons">
        <?php
                if ($user_online) {
                    print '
                            <a href="../login/logout.php">
                                 <div class="button log-out-btn"><button>Log out</button></div>
                            </a>
                            <a href="' .isset($_SESSION['role']). '">
                                <div class="button profile-btn"><button><a href="../home/profile.php">Profile</a></button></div>
                             </a>
                        ';
                } else {
                    print '
                            <a href="../login/login.php">
                                 <div class="button log-in"><button>Log in</button></div>
                            </a>

                        ';
                }
            ?>
        </div>


    </nav>
    <div class="main">
        <form action="job-list.php" method="GET">
            <div class="search-box">

                <div class="search-box-job">
                    <i class="fa-solid fa-briefcase"></i>
                    <select id="job-title" name="job-title">
                        <option disabled selected hidden value="hide">job title</option>
                        <?php
										 require '../constants/db_config.php';
										 try {
                                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
                                                $stmt = $conn->prepare("SELECT * FROM tbl_categories ORDER BY category");
                                                $stmt->execute();
                                                $result = $stmt->fetchAll();

                                                foreach($result as $row)
                                                
                                                {
                                                    $cat = $row['category'];
                            ?>
                                                    <option  <?php if ($slc_category == "$cat") { print ' selected '; } ?> value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
                            <?php
                                                }
                                                $stmt->execute();
					  
                                        }catch(PDOException $e){
                                        
                                            }
	
						    ?>
                </select>
            </div>

            <div class="search-box-location">
                <i class="fa-solid fa-location-arrow"></i>
                <select name="job-location" id="year">
                    <option disabled selected hidden value="hide">location</option>
                    <?php
										 require '../constants/db_config.php';
										 try {
                                         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
                                         $stmt = $conn->prepare("SELECT * FROM tbl_countries ORDER BY country_name");
                                         $stmt->execute();
                                         $result = $stmt->fetchAll();

                                         foreach($result as $row)
										
                                         {
											  $cnt = $row['country_name'];
                            ?>
										
										<option <?php if ($slc_country == "$cnt") { print ' selected '; } ?> value="<?php echo $row['country_name']; ?>"><?php echo $row['country_name']; ?></option>
						    <?php
	                                     }
                                            $stmt->execute();
					  
	                                     }catch(PDOException $e)
                                         {
               
                                         }
	
							    ?>
                </select>
            </div>
            <button name="search" value="1" type="submit">Find Job</button>


    </div>





    </form>
    </div>



    <div class="find-jobs">
        <div class="jobs-intro-text">
            <h2>job list</h2>
        </div>
        <div class="all-jobs-list">
            <?php
                    require '../constants/db_config.php';
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare($query1);
                    if ($fromsearch == true) {
                        $stmt->bindParam(':date', $slc_category);
                        $stmt->bindParam(':country', $slc_country);
                    }
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach ($result as $row) {
                        $post_date = date_format(date_create_from_format('d/m/Y', $row['closing_date']), 'd');
                        $post_month = date_format(date_create_from_format('d/m/Y', $row['closing_date']), 'F');
                        $post_year = date_format(date_create_from_format('d/m/Y', $row['closing_date']), 'Y');
                        $type = $row['type'];
                        $compid = $row['company'];

                        $stmtb = $conn->prepare("SELECT * FROM tbl_users WHERE member_no = '$compid' and role = 'employer'");
                        $stmtb->execute();
                        $resultb = $stmtb->fetchAll();
                        foreach ($resultb as $rowb) {
                            $complogo = $rowb['avatar'];
                            $thecompname = $rowb['first_name'];

                        }
                        if ($type == "Freelance") {
                            $sta = '<span class=" label label-success">Freelance</span>';

                        }
                        if ($type == "Part-time") {
                            $sta = '<span class=" label label-danger">Part-time</span>';

                        }
                        if ($type == "Full-time") {
                            $sta = '<span class=" label label-warning">Full-time</span>';

                        }

             ?>


            <div class="courses-container">
                <div class="course">
                    <div class="course-preview">
                        <h6>
                            <?php echo $row['country']; ?>
                        </h6>
                        <h6>
                            <?php echo $row['city']; ?>
                        </h6>
                        <h6>
                            <?php echo $row['experience']; ?>
                        </h6>
                        <h6>Deadline:
                            <?php echo "$post_month"; ?>
                            <?php echo "$post_date"; ?>,
                            <?php echo "$post_year"; ?>
                        </h6>
                    </div>
                    <div class="course-info">
                        <div class="progress-container">
                            <span class="progress-text">
                                <?php echo "$sta"; ?>
                            </span>
                        </div>
                        <h6>
                            <?php echo isset($thecompname); ?>
                        </h6>
                        <h2>
                            <?php echo $row['title']; ?>
                        </h2>
                        <form action="explore-job.php?jobid=<?php echo $row['job_id']; ?>">
                            <button class="btn">View</button>
                        </form>

                    </div>
                  
                </div>


            </div>

            <?php
                     }

            ?>
        </div>
    </div>
    <div class="normal-list-jobs">
        <?php
            $total_records = 0;
            require '../constants/db_config.php';

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare($query2);
                if ($fromsearch == true) {
                    $stmt->bindParam(':cate', $slc_category);
                    $stmt->bindParam(':country', $slc_country);
                }
                $stmt->execute();
                $result = $stmt->fetchAll();

                foreach ($result as $row) {
                    $total_records++;
                }

            } catch (PDOException $e) {

                }

            $records = $total_records / 12;
            $records = ceil($records);
            if ($records > 1) {
                $prevpage = $page - 1;
                $nextpage = $page + 1;

                print '<li class="paging-nav" ';if ($page == "1") {print 'class="disabled"';}
                print '><a ';if ($page == "1") {print '';} else {print 'href="job-list.php?page=' . $prevpage . '';?>
                    <?php if ($fromsearch == true) {print '&category=' . $cate . '&country=' . $country . '&search=✓';}
                    '';}
                print '"><i class="fa fa-chevron-left"></i></a></li>';
                for ($b = 1; $b <= $records; $b++) {

                    ?>
                    <li class="paging-nav"><a <?php if ($b==$page) {print ' style="background-color:#33B6CB; color:white" ' ;}?>
                            href="job-list.php?page=
                            <?php echo "$b"; ?>
                            <?php if ($fromsearch == true) {print '&category=' . $cate . '&country=' . $country . '&search=✓';}?>">
                            <?php echo $b . " "; ?>
                        </a></li>
                    <?php
            }
                print '<li class="paging-nav"';if ($page == $records) {print 'class="disabled"';}
                print '><a ';if ($page == $records) {print '';} else {print 'href="job-list.php?page=' . $nextpage . '';?>
                    <?php if ($fromsearch == true) {print '&category=' . $cate . '&country=' . $country . '&search=✓';}
                    '';}
                print '"><i class="fa fa-chevron-right"></i></a></li>';
            }

        ?>
    </div>



    <div class="about-us">
        <div class="info about-job-guy">
            <h3>About JobGuy</h3>
            <p>JobGuy is a job portal, online job management system </p>
        </div>
        <div class="info quick-links">
            <h3>Quick Links</h3>
            <ul type="none">
                <li><a href="#">Home</a></li>
                <li><a href="#">Find Jobs</a></li>
                <li><a href="contact.php">Contact</a></li>

            </ul>
        </div>
        <div class="info job-guy-contacts">
            <h3>JobGuy contact</h3>
            <ul type="none">
                <li>Address : Kathmandu, Nepal</li>
                <li>E-mail : jobguy222@gmail.com</li>
                <li>Phone : 9867543210</li>
            </ul>

        </div>
    </div>



    <script src="../js/main.js"></script>
    <script src="https://kit.fontawesome.com/58b14362d6.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>