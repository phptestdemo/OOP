<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title> Khoa Pham</title>

<!-- Bootstrap Core CSS -->
<link href="public/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="public/css/shop-homepage.css" rel="stylesheet">
<link href="public/css/my.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="?cn=index">Tin Tức</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="gioithieu.html">Giới thiệu</a>
                </li>
                <li>
                    <a href="lienhe.html">Liên hệ</a>
                </li>
            </ul>

            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" id="txtSearch" class="form-control" placeholder="Search">
                </div>
                <button type="button" id="btnSearch" class="btn btn-default">Submit</button>
            </form>

            <ul class="nav navbar-nav pull-right">
                
                <?php if (isset($_SESSION['username'])): ?>
                    <li>
                        <a>
                            <span class ="glyphicon glyphicon-user"></span>
                            <?=$_SESSION['username']?>
                        </a>
                    </li>

                    <li>
                        <a href="?cn=logout&m=logout">Đăng xuất</a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="?cn=signup&m=signup">Đăng ký</a>
                    </li>
                    <li>
                        <a href="?cn=signin&m=signin">Đăng nhập</a>
                    </li>
                <?php endif ?>
            </ul>
        </div>



        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">