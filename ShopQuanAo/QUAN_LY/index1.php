<?php
include_once('footer.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Fashion Admin</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../image/fa2.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <link rel="stylesheet" href="./css/style1.css" type="text/css">
    <link rel="stylesheet" href="./css/loginstyle.css" type="text/css">
    <!-- CDN create fas login user -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!--<meta http-equiv="refresh" content="15;url=">-->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>

    
</head>

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="index.php">
                <img src="img/khac/brand.png" class="navbar-brand-img" alt="brand image">
                </a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=1">
                            <i class="ni ni-basket text-orange"></i>
                            <span class="nav-link-text">Đơn đặt hàng mới</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="don-dat-hang.php?page=1">
                            <i class="ni ni-check-bold text-blue"></i>
                            <span class="nav-link-text">Đơn đặt hàng đã xử lý</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="hang-hoa.php?page=1"  >
                            <i class="ni ni-bullet-list-67 text-default"></i>
                            <span class="nav-link-text">Hàng hóa</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="loai-hang.php">
                            <i class="ni ni-archive-2 text-yellow"></i>
                            <span class="nav-link-text">Loại hàng</span>
                        </a>
                    </li>
                </ul>

                </div>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Search form -->
           
            <div class="navbar-nav align-items-left d-xl-none ml-0  ">
                <a  href="index.php">
                    <img src="img/khac/brandwhite.png" class="navbar-brand-img" alt="brand image" width="110px">
                </a>
            </div>
            
            <ul class="navbar-nav align-items-center  ml-md-auto ">
                <li class="nav-item d-xl-none">
                <!-- Sidenav toggler -->
                <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
                </li>
               
            </ul> 
            <!-- Tai khoan-->
            <div class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                
                <div class="nav-item dropdown">
                    <div class="nav-link pr-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="img/khac/avatar.png">
                            </span>
                            <div class="media-body  ml-2  d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">
                                    <?php echo $_SESSION['tennv']; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-menu  dropdown-menu-right " >
                        <div class="dropdown-header ">
                            <h6 class="text-overflow m-0">Xin chào</h6> 
                        </div>
                        <a href="profile.php" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>Thông tin</span>
                        </a>
                        <a href="logout.php" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>Đăng xuất</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </nav>
    <!-- Header -->