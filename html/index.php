<?php
session_start();
include_once('./apis/auth.php');

$au = new Auth();
$au->LoadUserPage();
$au->requireLoginClient();




?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Projects.ae</title>
    <!-- Custom CSS -->
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    
<![endif]-->

    <style>
        .table tbody td .active,
        .table tbody td .waiting {
            background-color: #B9F6CA;
            color: #388E3C;
            font-weight: 600;
            padding: 1px 10px;
            border-radius: 15px;
            font-size: 0.9rem;
        }

        .table tbody td .waiting {
            background-color: #FFECB3;
            color: #FFA000;
        }

        .table tbody td .active .circle,
        .table tbody td .waiting .circle {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #388E3C;
        }

        .table tbody td .waiting .circle {
            background-color: #FFA000;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>


    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="index.php">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="../assets/images/big/newicon.png" alt="homepage" class="dark-logo" width="90px" />
                                <!-- Light Logo icon -->
                                <img src="../assets/images/big/newicon.png" alt="homepage" class="light-logo" width="90px" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->

                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <span class="ml-2 d-none d-lg-inline-block"><span>Welcome ,</span> <span class="text-dark"><?php echo $_SESSION['username'] ?></span> <i data-feather="chevron-down" class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">


                                <a class="dropdown-item" href="logout.php"><i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                                <div class="dropdown-divider"></div>

                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="index.php" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Applications</span>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="uploadassign.php" aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span class="hide-menu">Upload New Task
                                </span></a>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="logout.php" aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span class="hide-menu">Logout</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Morning <?php echo $_SESSION['username'] ?>!</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a>

                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>


                </div>
            </div>

            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->
                <div class="card-group">
                    <div class="card border-right">
                        <a href="uploadassign.php">
                            <div class="card-body">
                                <div class="d-flex d-lg-flex d-md-block align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium">Upload New Assignment</h2>

                                            <span class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">Click here</span>
                                        </div>

                                    </div>

                                </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">TASK</h4>

                            <div class="table-responsive">

                                <table id="zero_config" class="table table-striped table-bordered no-wrap">

                                    <?php
                                    include_once 'dbcon.php';
                                    $username = $_SESSION['username'];
                                    $result = mysqli_query($conn, "SELECT * FROM task WHERE user_name='$username'");
                                    ?>
                                    <?php
                                    if (mysqli_num_rows($result) > 0) { ?>
                                        <thead>
                                            <tr>
                                                <th>TASK ID</th>
                                                <th>Project Name</th>
                                                <th>Employee Assigned</th>
                                                <th>Deadline Date</th>
                                                <th>Status</th>
                                                <th>Cost</th>
                                                <th>File</th>
                                                <th>Actions</th>
                                                <th style="">Completed File</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row["task_id"]; ?></td>
                                                    <td><?php echo $row["proj_name"]; ?></td>
                                                    <td><?php echo $row["employee_assigned"]; ?></td>
                                                    <td><?php echo $row["task_deadline"]; ?></td>
                                                    <td>
                                                        <div class="d-inline-flex align-items-center active">

                                                            <div class="ps-2"><?php echo $row["task_status"]; ?></div>
                                                        </div>
                                                    </td>
                                                    <td><?php if ($row["task_cost"] != "") {
                                                            echo "$" . $row["task_cost"];
                                                        } else {
                                                            echo "Kindly wait for Cost";
                                                        } ?></td>
                                                    <td> <?php echo '<p><a href="download.php?file=' . urlencode($row['fileaddress']) . '">Download</a></p>'; ?></td>
                                                    <td>
                                                        <?php if ($row["task_cost"] != "" && $row['task_status'] == "Cost Submitted") {
                                                        ?>
                                                            <a href="acceptcost.php?userid=<?php echo $row['task_id'] ?>" class="btn btn-success btn-lg active" role="button">Accept Cost</a>
                                                            <a href="declinecost.php?userid=<?php echo $row['task_id'] ?>" class="btn btn-danger btn-lg active" role="button">Decline Cost</a>
                                                        <?php
                                                        } ?>
                                                    </td>
                                                    <td><?php if ($row["submittedfileaddress"] != "") {
                                                            echo '<p><a href="download.php?file=' . urlencode($row['submittedfileaddress']) . '">Download</a></p>';
                                                        } else { ?> <div class="d-inline-flex align-items-center waiting">

                                                                <div class="ps-2"><?php echo "Pending";
                                                                                } ?>
                                                    </td>
                                                </tr>

                                        </tbody>
                                    <?php
                                                $i++;
                                            }
                                    ?>
                                </table>
                            <?php
                                    } else {
                                        echo "No Task Created Yet, Click Above to Create new Task";
                                    }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- *************************************************************** -->
            <!-- End Top Leader Table -->
            <!-- *************************************************************** -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center text-muted">
            All Rights Reserved by Projects.ae
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../assets/extra-libs/c3/c3.min.js"></script>
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.min.js"></script>
</body>

</html>