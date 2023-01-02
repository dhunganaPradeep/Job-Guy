<!DOCTYPE html>
<html lang="en">

<?php
require '../constants/db_config.php';
require '../constants/check-login.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--  CSS LINK    -->
    <link rel="stylesheet" href="../css/styles.css">

    <title>JOBGUY</title>
</head>

<body>


    <nav id="navbar">

        <div class="navbar-logo">
            <a href="./"><img src="../img/large_jobguy.png" alt=""></a>
        </div>
        <div class="nav-links">

            <a href="./">
                <div class="nav-link"><span>Home</span></div>
            </a>
            <a href="./job-list.php">
                <div class="nav-link"><span>Find Jobs</span></div>
            </a>
            <a href="contact.php">
                <div class="nav-link"><span>Contact</span></div>
            </a>
        </div>
        <div class="buttons">
            <?php

            if ($user_online) {
                echo '
                            <a href="../login/logout.php">
                                 <div class="button log-out-btn"><button>log out</button></div>
                            </a>
                            <a href="' . isset($_SESSION['role']) . '">
                                <div class="button profile-btn"><a href="../home/profile.php"><button>Profile</button></a></div>
                             </a>
                        ';
            } else {
                echo  '
                            <a href="../login/login.php">
                                 <div class="button log-in"><button>login/register</button></div>
                            </a>
                        ';
            }
            ?>
        </div>
    </nav>


    <div class="main">
        <div>
            <img class="feather" src="../img/Find_Your_Perfect_Job_1.svg" alt="colored feather background image">
        </div>
        <div class="intro">
            <div class="opening-text">
                <h1>Find Your <span class="underline">PERFECT</span> Job <br> Match!</h1>

                <form action="job-list.php" method="GET">

                    <div class="search-box">

                        <div class="search-box-job">
                            <i class="fa-solid fa-briefcase"></i>
                            <select id="job-title" name="category">
                                <option disabled selected hidden value="hide">Job title</option>
                                <?php

                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                $stmt = $conn->prepare("SELECT * FROM tbl_categories ORDER BY category");
                                $stmt->execute();
                                $result = $stmt->fetchAll();
                                foreach ($result as $row) {
                                ?>
                                    <option style="color:black" value="<?php echo $row['category']; ?>">
                                        <?php echo $row['category']; ?>
                                    </option>
                                <?php
                                }
                                ?>

                            </select>
                        </div>

                        <div class="search-box-location">
                            <i class="fa-solid fa-location-arrow"></i>
                            <select name="country" id="year">
                                <option disabled selected hidden value="hide">Location</option>
                                <?php
                                require '../constants/db_config.php';
                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                $stmt = $conn->prepare("SELECT * FROM tbl_countries ORDER BY country_name");
                                $stmt->execute();
                                $result = $stmt->fetchAll();
                                foreach ($result as $row) {
                                ?>
                                    <option style="color:black" value="<?php echo $row['country_name']; ?>">
                                        <?php echo $row['country_name']; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <button name="search" value="1" type="submit">Find Jobs</button>
                    </div>
                </form>
            </div>
        </div>
        <div>
            <img class="bg-img" src="../img/bg.png" alt="">
        </div>


    </div>



    <div class="featured-jobs">
        <div class="jobs-intro-text">
            <h2>Featured Jobs</h2>
            <h4>Know your worth and find the job that qualify your life</h4>
        </div>
        <div class="job-list-in-order">
            <?php
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_jobs ORDER BY enc_id DESC LIMIT 9");
            $stmt->execute();
            $result = $stmt->fetchAll();

            foreach ($result as $row) {
                $jobcity = $row['city'];
                $jobcountry = $row['country'];
                $type = $row['type'];
                $title = $row['title'];
                $closingdate = $row['closing_date'];
                $company_id = $row['company'];
                $post_date = date_format(date_create_from_format('d/m/Y', $closingdate), 'd');
                $post_month = date_format(date_create_from_format('d/m/Y', $closingdate), 'F');
                $post_year = date_format(date_create_from_format('d/m/Y', $closingdate), 'Y');

                $stmtb = $conn->prepare("SELECT * FROM tbl_users WHERE member_no = '$company_id' and role = 'employer'");
                $stmtb->execute();
                $resultb = $stmtb->fetchAll();
                foreach ($resultb as $rowb) {
                    $complogo = $rowb['avatar'];
                    $thecompname = $rowb['first_name'];
                }

                if ($type == "Freelance") {
                    $sta = '<div class="job-label label label-success"> Freelance </div>';
                }
                if ($type == "Part-time") {
                    $sta = '<div class="job-label label label-danger"> Part-time </div>';
                }
                if ($type == "Full-time") {
                    $sta = '<div class="job-label label label-warning"> Full-time </div>';
                }

            ?>
                <a href="explore-job.php?jobid=<?php echo $row['job_id']; ?>">
                    <div class="item">
                        <div class="logo">
                            <?php
                            $complogo = "../img/blank.png";
                            if (isset($complogo)) {
                                print '<img alt="image"  src="../img/large_jobguy_black.png"/>';
                            } else {
                                echo '<img alt="image" title="' . $thecompname . '"src="data:image/jpeg;base64,' . base64_encode($complogo) . '"/>';
                            }
                            ?>
                        </div>
                        <div class="jobname">
                            <?php echo "$title"; ?>
                        </div>
                        <div class="companyname"><i class="fa-solid fa-briefcase"></i>
                            <?php echo isset($thecompname); ?>
                        </div>
                        <div class="location"><i class="fa-solid fa-location-arrow"></i>
                            <?php echo "$jobcountry" ?>
                        </div>
                        <?php echo "$sta"; ?>
                    </div>
                </a>
            <?php
            }

            ?>

        </div>

    </div>


    <div class="about-us">
        <div class="info about-job-guy">
            <h3>About JobGuy</h3>
            <p>JobGuy is a job portal, online job management system.</p>
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

</body>

</html>