<!doctype html>
<html>
<head>
    <base href="<?= base_url(); ?>"/>
    <?php
        header('X-Frame-Options:Allow-From http://www.youtube.com');
        header('X-Frame-Options:GOFORIT');
    ?>
    <meta charset="UTF-8">
    <meta name="description" content="cas-cr">
    <meta name="keywords" content="...">
    <title>CAS-CR Co.,Ltd.</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- HTML5 shim for IE backwards compatibility -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
<!-- === HEADER ===-->
<header>
    <div class="container-bg">
        <div class="search">
            <form id="search-header">
                <input id="search-field" name="search" type="text" placeholder="Search">
                <a href="#" class="fa fa-search"></a>
            </form>
        </div>
        <a href="#"  class="logo" target="_self" title="logo cas-cr"><img src="img/head-cr.png"></a>
    </div>
    </div>
</header>
<!-- === NAV ===-->
<nav>
    <div id="mainNav">
        <ul>
            <li id="link" ><a href="index.php/welcome/index" >HOME</a></li>
            <li id="link1"><a href="index.php/welcome/about_us">ABOUT US</a></li>
            <li id="link2"><a href="index.php/welcome/product">PRODUCTS</a></li>
            <li id="link3"><a href="index.php/welcome/news">NEWS</a></li>
            <li id="link4"><a href="index.php/welcome/contact">CONTACT US</a></li>
        </ul>
    </div>
</nav>
<!-- === TOPIC ===-->
<div class="container-bg"></div>
<div class="outer-box container">
    <div class="container-wrapper">
        <section>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active"><img src="img/slide-ko.png" > </div>
                    <div class="item"><img src="img/sl2.png"></div>
                    <div class="item"><img src="img/sl3.png" > </div>
                </div>
            </div>
        </section>

        <!-- === BREADCRUMB ===-->
        <aside class="breadcrumb">
            <div class="container">
                <ul>
                    <li class="active"><a href="index.php/welcome/index">&nbsp;&nbsp;HOME</a></li>
                </ul>
            </div>
        </aside>
        <div class="clearfix"></div>
        <!-- === CONTENT ===-->
        <section class="content">
            <div class="container">
                <div class="col-r">
                    <img src="img/tab-most-viewed.png">
                    <ul class="col-r1">
                        <a href="#"><img src="img/bar-ko.jpg"></a>
                        <li><i class="fa fa-th-list"></i><a href="index.php/welcome/product/?sub=1">&nbsp;&nbsp;Casting</a></li>
                        <li><i class="fa fa-th-list"></i><a href="index.php/welcome/product/?sub=2">&nbsp;&nbsp;Castugnon</a></li>
                        <li><i class="fa fa-th-list"></i><a href="index.php/welcome/product/?sub=2">&nbsp;&nbsp;Chrimping Machine</a></li>
                        <li><i class="fa fa-th-list"></i><a href="index.php/welcome/product/?sub=3">&nbsp;&nbsp;Accessories</a></li>
                        <li><i class="fa fa-angle-double-right"></i><a href="index.php/welcome/product/?sub=4">&nbsp;&nbsp;Other Categories</a></li>
                    </ul>
                    <ul class="col-r1">
                        <a href="#"><img src="img/bar-ts.jpg"></a>
                        <li><i class="fa fa-th-list"></i><a href="index.php/welcome/product/?sub=5">&nbsp;Wire Hardness Processing Inspection</a></li>
                        <li><i class="fa fa-th-list"></i><a href="index.php/welcome/product/?sub=6">&nbsp;&nbsp;Crimp Terminal Total Inspection</a></li>
                        <li><i class="fa fa-th-list"></i><a href="index.php/welcome/product/?sub=7">&nbsp;&nbsp;Accessories</a></li>
                        <li><i class="fa fa-angle-double-right"></i><a href="index.php/welcome/product/?sub=8">&nbsp;&nbsp;Other Categories</a></li>
                    </ul>
                    <ul class="col-r1">
                        <a href="#"><img src="img/bar-stp.jpg"></a>
                        <li><i class="fa fa-th-list"></i><a href="index.php/welcome/product/?sub=9">&nbsp;&nbsp;Terminal</a></li>
                        <li><i class="fa fa-th-list"></i><a href="index.php/welcome/product/?sub=10">&nbsp;&nbsp;Housing</a></li>
                        <li><i class="fa fa-th-list"></i><a href="index.php/welcome/product/?sub=10">&nbsp;&nbsp;Accessories</a></li>
                        <li><i class="fa fa-th-list"></i><a href="index.php/welcome/product/?sub=10">&nbsp;&nbsp;Other Categories</a></li>
                    </ul>

                    <ul class="col-r1">
                        <a href="#"><img src="img/bar-km.png"></a>
                        <li><i class="fa fa-th-list"></i><a href="index.php/welcome/product/?sub=11">&nbsp;&nbsp;Electric Stripping Machine</a></li>
                        <li><i class="fa fa-th-list"></i><a href="index.php/welcome/product/?sub=11">&nbsp;&nbsp;Accessories</a></li>
                        <li><i class="fa fa-th-list"></i><a href="index.php/welcome/product/?sub=11">&nbsp;&nbsp;Other Categories</a></li>
                    </ul>
                    <ul class="col-r1">
                        <a href="#"><img src="img/bar-ot.jpg"></a>
                        <li><i class="fa fa-th-list"></i><a href="index.php/welcome/product/?sub=11">&nbsp;&nbsp;Electric Stripping Machine</a></li>
                        <li><i class="fa fa-th-list"></i><a href="index.php/welcome/product/?sub=11">&nbsp;&nbsp;Industrial Equipment</a></li>
                        <li><i class="fa fa-th-list"></i><a href="index.php/welcome/product/?sub=11">&nbsp;&nbsp;Environment Equipment</a></li>
                        <li><i class="fa fa-th-list"></i><a href="index.php/welcome/product/?sub=11">&nbsp;&nbsp;Accessories</a></li>
                        <li><i class="fa fa-th-list"></i><a href="index.php/welcome/product/?sub=11">&nbsp;&nbsp;Other Categories[1]</a></li>
                        <li><i class="fa fa-th-list"></i><a href="index.php/welcome/product/?sub=11">&nbsp;&nbsp;Other Categories[2]</a></li>
                        <li><i class="fa fa-th-list"></i><a href="index.php/welcome/product/?sub=11">&nbsp;&nbsp;Other Categories[3]</a></li>
                    </ul>
                    <br><br>
                    <img src="img/tab-news.png">

                    <?php foreach($news as $data){ ?>

                    <ul class="col-r2">
                        !-- NEWS --!
                        <li><a href="index.php/welcome/news/?news=<?php echo $data['news_id']; ?>"><?php echo $data['news_pic']; ?></a></li>
                        <li><a href="index.php/welcome/news/?news=<?php echo $data['news_id']; ?>"><?php echo $data['news_name']; ?></a></li>
                        !-- End News --!
                    </ul>

                    <?php } ?>
                </div>
                <div class="col-l">
                    <div class="col-l1">

