<?php
session_start();

include_once('./apis/auth.php');

$au = new Auth();
$au->requireLogin();


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

                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span class="text-dark"><?php echo $_SESSION['username'] ?></span> <i data-feather="chevron-down" class="svg-icon"></i></span>
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
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Welcome, <?php echo $_SESSION['username'] ?>!</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="uploadassign.php">Upload File</a>
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
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">Upload New Assignment</h2>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <!--<div class="card border-right">-->
                    <!--    <div class="card-body">-->
                    <!--        <div class="d-flex d-lg-flex d-md-block align-items-center">-->
                    <!--            <div>-->
                    <!--                <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup-->
                    <!--                        class="set-doller">$</sup>18,306</h2>-->
                    <!--                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Earnings of Month-->
                    <!--                </h6>-->
                    <!--            </div>-->
                    <!--            <div class="ml-auto mt-md-3 mt-lg-0">-->
                    <!--                <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="card border-right">-->
                    <!--    <div class="card-body">-->
                    <!--        <div class="d-flex d-lg-flex d-md-block align-items-center">-->
                    <!--            <div>-->
                    <!--                <div class="d-inline-flex align-items-center">-->
                    <!--                    <h2 class="text-dark mb-1 font-weight-medium">1538</h2>-->
                    <!--                    <span-->
                    <!--                        class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">-18.33%</span>-->
                    <!--                </div>-->
                    <!--                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">New Projects</h6>-->
                    <!--            </div>-->
                    <!--            <div class="ml-auto mt-md-3 mt-lg-0">-->
                    <!--                <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="card">-->
                    <!--    <div class="card-body">-->
                    <!--        <div class="d-flex d-lg-flex d-md-block align-items-center">-->
                    <!--            <div>-->
                    <!--                <h2 class="text-dark mb-1 font-weight-medium">864</h2>-->
                    <!--                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Projects</h6>-->
                    <!--            </div>-->
                    <!--            <div class="ml-auto mt-md-3 mt-lg-0">-->
                    <!--                <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
                <div class="card-group">
                    <div class="card border-right">
                        <div class="card-body">


                            <form action="newitem.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Project Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="projectname" placeholder="Enter Your Project Name" name="projname" autocomplete="off" required>
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Task Deadline</label>
                                    <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Date" name="deadline" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword2">Upload your assignment file here!</label>
                                    <input type="file" class="form-control" id="exampleInputPassword2" placeholder="upload" name="uploadedFile" required>
                                </div>

                                <br>
                                <button type="submit" class="btn btn-primary" name="uploadBtn" value="Upload">Upload</button>

                            </form>


                        </div>
                    </div>

                    <!-- *************************************************************** -->
                    <!-- End First Cards -->

                    <!-- *************************************************************** -->

                    <!-- *************************************************************** -->
                    <!-- Start Sales Charts Section -->
                    <!-- *************************************************************** -->
                    <!--<div class="row">-->
                    <!--    <div class="col-lg-4 col-md-12">-->
                    <!--        <div class="card">-->
                    <!--            <div class="card-body">-->
                    <!--                <h4 class="card-title">Total Sales</h4>-->
                    <!--                <div id="campaign-v2" class="mt-2" style="height:283px; width:100%;"></div>-->
                    <!--                <ul class="list-style-none mb-0">-->
                    <!--                    <li>-->
                    <!--                        <i class="fas fa-circle text-primary font-10 mr-2"></i>-->
                    <!--                        <span class="text-muted">Direct Sales</span>-->
                    <!--                        <span class="text-dark float-right font-weight-medium">$2346</span>-->
                    <!--                    </li>-->
                    <!--                    <li class="mt-3">-->
                    <!--                        <i class="fas fa-circle text-danger font-10 mr-2"></i>-->
                    <!--                        <span class="text-muted">Referral Sales</span>-->
                    <!--                        <span class="text-dark float-right font-weight-medium">$2108</span>-->
                    <!--                    </li>-->
                    <!--                    <li class="mt-3">-->
                    <!--                        <i class="fas fa-circle text-cyan font-10 mr-2"></i>-->
                    <!--                        <span class="text-muted">Affiliate Sales</span>-->
                    <!--                        <span class="text-dark float-right font-weight-medium">$1204</span>-->
                    <!--                    </li>-->
                    <!--                </ul>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="col-lg-4 col-md-12">-->
                    <!--        <div class="card">-->
                    <!--            <div class="card-body">-->
                    <!--                <h4 class="card-title">Net Income</h4>-->
                    <!--                <div class="net-income mt-4 position-relative" style="height:294px;"></div>-->
                    <!--                <ul class="list-inline text-center mt-5 mb-2">-->
                    <!--                    <li class="list-inline-item text-muted font-italic">Sales for this month</li>-->
                    <!--                </ul>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="col-lg-4 col-md-12">-->
                    <!--        <div class="card">-->
                    <!--            <div class="card-body">-->
                    <!--                <h4 class="card-title mb-4">Earning by Location</h4>-->
                    <!--                <div class="" style="height:180px">-->
                    <!--                    <div id="visitbylocate" style="height:100%"></div>-->
                    <!--                </div>-->
                    <!--                <div class="row mb-3 align-items-center mt-1 mt-5">-->
                    <!--                    <div class="col-4 text-right">-->
                    <!--                        <span class="text-muted font-14">India</span>-->
                    <!--                    </div>-->
                    <!--                    <div class="col-5">-->
                    <!--                        <div class="progress" style="height: 5px;">-->
                    <!--                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"-->
                    <!--                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="col-3 text-right">-->
                    <!--                        <span class="mb-0 font-14 text-dark font-weight-medium">28%</span>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--                <div class="row mb-3 align-items-center">-->
                    <!--                    <div class="col-4 text-right">-->
                    <!--                        <span class="text-muted font-14">UK</span>-->
                    <!--                    </div>-->
                    <!--                    <div class="col-5">-->
                    <!--                        <div class="progress" style="height: 5px;">-->
                    <!--                            <div class="progress-bar bg-danger" role="progressbar" style="width: 74%"-->
                    <!--                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="col-3 text-right">-->
                    <!--                        <span class="mb-0 font-14 text-dark font-weight-medium">21%</span>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--                <div class="row mb-3 align-items-center">-->
                    <!--                    <div class="col-4 text-right">-->
                    <!--                        <span class="text-muted font-14">USA</span>-->
                    <!--                    </div>-->
                    <!--                    <div class="col-5">-->
                    <!--                        <div class="progress" style="height: 5px;">-->
                    <!--                            <div class="progress-bar bg-cyan" role="progressbar" style="width: 60%"-->
                    <!--                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="col-3 text-right">-->
                    <!--                        <span class="mb-0 font-14 text-dark font-weight-medium">18%</span>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--                <div class="row align-items-center">-->
                    <!--                    <div class="col-4 text-right">-->
                    <!--                        <span class="text-muted font-14">China</span>-->
                    <!--                    </div>-->
                    <!--                    <div class="col-5">-->
                    <!--                        <div class="progress" style="height: 5px;">-->
                    <!--                            <div class="progress-bar bg-success" role="progressbar" style="width: 50%"-->
                    <!--                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="col-3 text-right">-->
                    <!--                        <span class="mb-0 font-14 text-dark font-weight-medium">12%</span>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!-- *************************************************************** -->
                    <!-- End Sales Charts Section -->
                    <!-- *************************************************************** -->
                    <!-- *************************************************************** -->
                    <!-- Start Location and Earnings Charts Section -->
                    <!-- *************************************************************** -->
                    <!--<div class="row">-->
                    <!--    <div class="col-md-6 col-lg-8">-->
                    <!--        <div class="card">-->
                    <!--            <div class="card-body">-->
                    <!--                <div class="d-flex align-items-start">-->
                    <!--                    <h4 class="card-title mb-0">Earning Statistics</h4>-->
                    <!--                    <div class="ml-auto">-->
                    <!--                        <div class="dropdown sub-dropdown">-->
                    <!--                            <button class="btn btn-link text-muted dropdown-toggle" type="button"-->
                    <!--                                id="dd1" data-toggle="dropdown" aria-haspopup="true"-->
                    <!--                                aria-expanded="false">-->
                    <!--                                <i data-feather="more-vertical"></i>-->
                    <!--                            </button>-->
                    <!--                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1">-->
                    <!--                                <a class="dropdown-item" href="#">Insert</a>-->
                    <!--                                <a class="dropdown-item" href="#">Update</a>-->
                    <!--                                <a class="dropdown-item" href="#">Delete</a>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--                <div class="pl-4 mb-5">-->
                    <!--                    <div class="stats ct-charts position-relative" style="height: 315px;"></div>-->
                    <!--                </div>-->
                    <!--                <ul class="list-inline text-center mt-4 mb-0">-->
                    <!--                    <li class="list-inline-item text-muted font-italic">Earnings for this month</li>-->
                    <!--                </ul>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="col-md-6 col-lg-4">-->
                    <!--        <div class="card">-->
                    <!--            <div class="card-body">-->
                    <!--                <h4 class="card-title">Recent Activity</h4>-->
                    <!--                <div class="mt-4 activity">-->
                    <!--                    <div class="d-flex align-items-start border-left-line pb-3">-->
                    <!--                        <div>-->
                    <!--                            <a href="javascript:void(0)" class="btn btn-info btn-circle mb-2 btn-item">-->
                    <!--                                <i data-feather="shopping-cart"></i>-->
                    <!--                            </a>-->
                    <!--                        </div>-->
                    <!--                        <div class="ml-3 mt-2">-->
                    <!--                            <h5 class="text-dark font-weight-medium mb-2">New Product Sold!</h5>-->
                    <!--                            <p class="font-14 mb-2 text-muted">John Musa just purchased <br> Cannon 5M-->
                    <!--                                Camera.-->
                    <!--                            </p>-->
                    <!--                            <span class="font-weight-light font-14 text-muted">10 Minutes Ago</span>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="d-flex align-items-start border-left-line pb-3">-->
                    <!--                        <div>-->
                    <!--                            <a href="javascript:void(0)"-->
                    <!--                                class="btn btn-danger btn-circle mb-2 btn-item">-->
                    <!--                                <i data-feather="message-square"></i>-->
                    <!--                            </a>-->
                    <!--                        </div>-->
                    <!--                        <div class="ml-3 mt-2">-->
                    <!--                            <h5 class="text-dark font-weight-medium mb-2">New Support Ticket</h5>-->
                    <!--                            <p class="font-14 mb-2 text-muted">Richardson just create support <br>-->
                    <!--                                ticket</p>-->
                    <!--                            <span class="font-weight-light font-14 text-muted">25 Minutes Ago</span>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="d-flex align-items-start border-left-line">-->
                    <!--                        <div>-->
                    <!--                            <a href="javascript:void(0)" class="btn btn-cyan btn-circle mb-2 btn-item">-->
                    <!--                                <i data-feather="bell"></i>-->
                    <!--                            </a>-->
                    <!--                        </div>-->
                    <!--                        <div class="ml-3 mt-2">-->
                    <!--                            <h5 class="text-dark font-weight-medium mb-2">Notification Pending Order!-->
                    <!--                            </h5>-->
                    <!--                            <p class="font-14 mb-2 text-muted">One Pending order from Ryne <br> Doe</p>-->
                    <!--                            <span class="font-weight-light font-14 mb-1 d-block text-muted">2 Hours-->
                    <!--                                Ago</span>-->
                    <!--                            <a href="javascript:void(0)" class="font-14 border-bottom pb-1 border-info">Load More</a>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!-- *************************************************************** -->
                    <!-- End Location and Earnings Charts Section -->
                    <!-- *************************************************************** -->
                    <!-- *************************************************************** -->
                    <!-- Start Top Leader Table -->
                    <!-- *************************************************************** -->

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