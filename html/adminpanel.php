<?php
 session_start();
 include("./apis/auth.php");
 (new Auth())->requireLoginAdmin();
 include("./apis/SerSessionHandler.php");
$sh = new AdminSessionHandler();
if (!isset($_SESSION['sessid']) || !$sh->CheckSessionPresence()) {
  header("location: adminlogin.php");

}

if(!$sh->verifySessionKey($_SESSION['sessid'])){
    // die($_SESSION['sessid']);
    header("location: fbr.php");
}

 if(!isset($_SESSION['username']))
  {
   header("Location: adminlogin.php");
  }

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
    <title>Projects.ae - Admin</title>
    <!-- Custom CSS -->
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

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
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="adminpanel.php">
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
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
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
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                               
                                <span class="ml-2 d-none d-lg-inline-block"><span>Welcome ,</span> <span
                                        class="text-dark"><?php echo $_SESSION['username']?></span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        
                             
                                <a class="dropdown-item" href="logout.php"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
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
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="adminpanel.php"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Admin Dashboard</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Applications</span>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="employeemanage.php"
                                aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                                    class="hide-menu">Employee Management
                                </span></a>
                        </li>
                         <li class="sidebar-item"> <a class="sidebar-link" href="inspectormanage.php"
                                aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                                    class="hide-menu">Inspector Management
                                </span></a>
                        </li>
                         <li class="sidebar-item"> <a class="sidebar-link" href="assigntask1.php"
                                aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                                    class="hide-menu">Assign Assignment
                                </span></a>
                        </li>
                  
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="logout.php"
                                aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span
                                    class="hide-menu">Logout</span></a></li>
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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Morning <?php echo $_SESSION['username']?>!</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html"> Admin Dashboard</a>
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
                     <?php 
                                   
include_once 'dbcon.php';
$sql2 = "SELECT SUM(task_cost),  COUNT(task_id) , SUM(task_afterstatus) from task";
$result2 = $conn->query($sql2);
//display data on web page
$sql3 = "SELECT COUNT(user_name) from users";
$sql4 = "SELECT COUNT(user_name) from emp";
$result3 = $conn->query($sql3);
$result4 = $conn->query($sql4);
//display data on web page

while($row = mysqli_fetch_array($result2)){
    
   $sum = $row['SUM(task_cost)'];
   $count = $row['COUNT(task_id)'];
   
   $projectcompleted=$row['SUM(task_afterstatus)'];
}
while($row1 = mysqli_fetch_array($result3)){
    
 
   $count1 = $row1['COUNT(user_name)'];
}
while($row1 = mysqli_fetch_array($result4)){
    
 
   $empcount = $row1['COUNT(user_name)'];
}

?>
                  <div class="card-group">
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium"><?php echo $count ?></h2>
                                        
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">New Task</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium"><?php echo $empcount ?></h2>
                                        
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Employee</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                               
                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup class="set-doller">$</sup>
                                   <?php echo $sum ?></h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Earnings Till Now
                                    </h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium"><?php echo $count1 ?></h2>
                                   
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Users</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-dark mb-1 font-weight-medium"><?php echo $projectcompleted?></h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Projects Completed</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <div class="card-group">
                    
                    
                    
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
                                    $result = mysqli_query($conn,"SELECT * FROM task ORDER BY task_id DESC");
                        ?>
                                <?php
                                    if (mysqli_num_rows($result) > 0) { ?>
                                                <thead>
                                            <tr>
                                                <th>TASK ID</th>
                                                <th>Project Name</th>
                                                <th>Customer Name</th>
                                                
                                                <th>Employee Assigned</th>
                                                <th>Deadline Date</th>
                                                <th>Status</th>
                                                <th>Cost</th>
                                                <th>File</th>
                                                <th>Actions</th>
                                                <th style="">Completed File</th>
                                                <th>Submitted On</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
                                            <tr>
                                              <td><?php echo $row["task_id"]; ?></td>
                                            <td><?php echo $row["proj_name"]; ?></td>
                                             <td><?php echo $row["user_name"]; ?></td>
                                             
                                             <td><?php echo $row["employee_assigned"]; ?></td>
                                             <td><?php echo $row["task_deadline"]; ?></td>
                                             <td>  <div class="d-inline-flex align-items-center active">
                               
                                <div class="ps-2"><?php echo $row["task_status"]; ?></div>
                            </div>
                            </td>
                                             <td><?php if($row["task_cost"]!=""){
                                                 echo "$".$row["task_cost"];} else { 
                                             echo "Assign Cost";}?></td>
                                             <td> <?php echo '<p><a href="download.php?file=' . urlencode($row['fileaddress']) . '">Download</a></p>'; ?></td>
                                             <td>	
                                             <?php
                                             if($row['task_cost']==""){ ?>
                                             <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $row['task_id'] ?>">Add Cost</button> <?php }else if ($row['task_status']=="Cost Declined"){
                                             ?>
                                             <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $row['task_id'] ?>">Change Cost</button> <?php
                                             }
                                             ?>
                                             </td>
                                             <td><?php if($row["submittedfileaddress"]!=""){
                                                 echo '<p><a href="download.php?file=' . urlencode($row['submittedfileaddress']) . '">Download</a></p>';} else{ ?> <div class="d-inline-flex align-items-center waiting">
                               
                                <div class="ps-2"><?php echo "Pending";} ?>
                                             </td>
                                             <td> 
                                             <?php if($row["task_finaltime"]!=""){
                                                 echo $row["task_finaltime"];} else{ 
                                             echo "Not yet Completed";}?>
                                             </td>
                                            </tr>
                        <div id="myModal<?php echo $row['task_id'] ?>" class="modal fade" role="dialog">
			<div class="modal-dialog">
			    <div class="modal-content">
					<div class="modal-header">
						 <button type="button" class="close" data-dismiss="modal">&times;</button>
						    <h4 class="modal-title">Details</h4>
				    </div>
				    <div class="modal-body">
						 <h3>Task ID: <?php echo $row['task_id']; ?></h3>
						 <h3>Project Name : <?php echo $row['proj_name']; ?></h3>
						 <h3>Deadline Date : <?php echo $row['task_deadline']; ?></h3>
						 <form method="post" action="updatecost.php">
						     <br>
						     <input value='<?php echo $row['task_id']?>' name="taskid" hidden >
						     <label>Enter Cost</label>
						        
						     <input class="form-control" type="text" name="cost" placeholder="$$$$$$$" >
						     <br>
						     <button class="btn btn-light">Submit</button>
						     
						 </form>
				    </div>
				</div>
			</div>
		</div>

                                        </tbody>
                                                         <?php
$i++;
}
?>
                                    </table>
                                    <?php
}
else{
echo "No Task Created Yet, Click Above to Create new Task";
}
?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="card-group">
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">Download Report</h2>
                                       
                                       
                                    </div>
                                    <form method="post" action="downloadreport.php" >
      
       <br>
       <label>Select Start Date</label>
        <input type="date" name="start_date" class="form-control"  />
        <!-- <?php echo $start_date_error; ?> -->
     
     <br>
     <label>Select End Date</label>
        <input type="date" name="end_date" class="form-control"  />
        <!-- <?php echo $end_date_error; ?> -->
       
     <br>
     
       <input type="submit" name="export" value="Export" class="btn btn-info" />
      </div>
     </form>
                                  
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
  <script>

$(document).ready(function(){
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format: "yyyy-mm-dd",
  autoclose: true
 });
});


</script>


</body>

</html>