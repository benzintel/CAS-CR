<? if($this->session->userdata('error')){
    $message = $this->session->userdata('error'); ?>
    <script>alert('<?= $message; ?>')</script>
<? } else{ } ?>

<? $this->session->unset_userdata('error'); $message = ''; ?>

<html lang="en"><head>
    <meta charset="utf-8">
    <base href="<?= base_url(); ?>"/>
    <title>CAS-CR</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<!--    <script src="js/ckeditor/ckeditor.js"></script>-->
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
    <script src="js/dataTable.js"></script>
    <script src="//cdn.ckeditor.com/4.4.7/full/ckeditor.js"></script>


    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="css/dataTable.css" rel="stylesheet">
    <link rel="stylesheet" href="http://jqueryvalidation.org/files/demo/site-demos.css">
    <style type="text/css">
        /* make sidebar nav vertical */
        @media (min-width: 768px){
            .affix-content .container {
                width: 700px;
            }

            html,body{
                background-color: #f8f8f8;
                height: 100%;
                overflow: hidden;
            }
            .affix-content .container .page-header{
                margin-top: 0;
            }
            .sidebar-nav{
                position:fixed;
                width:100%;
            }
            .affix-sidebar{
                padding-right:0;
                font-size:small;
                padding-left: 0;
            }
            .affix-row, .affix-container, .affix-content{
                height: 100%;
                margin-left: 0;
                margin-right: 0;
            }
            .affix-content{
                background-color:white;
            }
            .sidebar-nav .navbar .navbar-collapse {
                padding: 0;
                max-height: none;
            }
            .sidebar-nav .navbar{
                border-radius:0;
                margin-bottom:0;
                border:0;
            }
            .sidebar-nav .navbar ul {
                float: none;
                display: block;
            }
            .sidebar-nav .navbar li {
                float: none;
                display: block;
            }
            .sidebar-nav .navbar li a {
                padding-top: 12px;
                padding-bottom: 12px;
            }
        }

        @media (min-width: 769px){
            .affix-content .container {
                width: 600px;
            }
            .affix-content .container .page-header{
                margin-top: 0;
            }
        }

        @media (min-width: 992px){
            .affix-content .container {
                width: 900px;
            }
            .affix-content .container .page-header{
                margin-top: 0;
            }
        }

        @media (min-width: 1220px){
            .affix-row{
                overflow: hidden;
            }

            .affix-content{
                overflow: auto;
            }

            .affix-content .container {
                width: 1000px;
            }

            .affix-content .container .page-header{
                margin-top: 0;
            }
            .affix-content{
                padding-right: 30px;
                padding-left: 30px;
            }
            .affix-title{
                border-bottom: 1px solid #ecf0f1;
                padding-bottom:10px;
            }
            .navbar-nav {
                margin: 0;
            }
            .navbar-collapse{
                padding: 0;
            }
            .sidebar-nav .navbar li a:hover {
                background-color: #428bca;
                color: white;
            }
            .sidebar-nav .navbar li a > .caret {
                margin-top: 8px;
            }
        }

    </style>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

</head>
<body style="">
<div class="row affix-row">
    <div class="col-sm-3 col-md-2 affix-sidebar">
        <div class="sidebar-nav">
            <div class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <span class="visible-xs navbar-brand">Kodera Electronics Co.,Ltd.</span>
                </div>
                <div class="navbar-collapse collapse sidebar-navbar-collapse">
                    <ul class="nav navbar-nav" id="sidenav01">
                        <li>
                            <img width="150" height="75" src="images/backend/logo.png"/>
                        </li>
                        <li>
                            <a href="index.php/backend/logout"><span class="glyphicon glyphicon-lock"></span>&nbsp;&nbsp;&nbsp;ลงชื่อออก</a>
                        </li>
                        <li>
                            <a data-toggle="collapse" data-target="#toggleDemo" data-parent="#sidenav01" class="collapsed">
                                <span class="glyphicon glyphicon-plus"></span> ADD MENU <small><span class="caret"></span></small>
                            </a>
                            <div class="collapse" id="toggleDemo" style="height: 0px;">
                                <ul class="nav nav-list">
                                    <li><a href="index.php/backend/add_user" ><span class="glyphicon glyphicon-user"></span> เพิ่มผู้ใช้งาน</a>
                                    <li><a href="index.php/backend/add_product" ><span class="glyphicon glyphicon-plus"></span> เพิ่มข้อมูล</a></li>
                                    <li><a href="index.php/backend/pageupload_images" ><span class="glyphicon glyphicon-plus"></span> เพื่มรูปภาพ</a></li>
                                    <li><a href="index.php/backend/add_news"><span class="glyphicon glyphicon-plus"></span> เพิ่มข่าว</a></li>
                                    <li><a href="index.php/backend/add_category"><span class="glyphicon glyphicon-plus"></span> เพิ่มหมวดหมู่</a></li>
                                    <li><a href="index.php/backend/add_sub_category"><span class="glyphicon glyphicon-plus"></span> เพิ่มหมวดหมู่ย่อย</a></li>
                                </ul>
                            </div>
                        </li>
<!--                        <li>-->
<!--                            <a data-toggle="collapse" data-target="#toggleDemo2" data-parent="#sidenav01" class="collapsed">-->
<!--                                <span class="glyphicon glyphicon-inbox"></span> Submenu 2 <small><span class="caret"></span></small>-->
<!--                            </a>-->
<!--                            <div class="collapse" id="toggleDemo2" style="height: 0px;">-->
<!--                                <ul class="nav nav-list">-->
<!--                                    <li><a href="#">Submenu2.1</a></li>-->
<!--                                    <li><a href="#">Submenu2.2</a></li>-->
<!--                                    <li><a href="#">Submenu2.3</a></li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </li>-->
                        <li><a href="index.php/backend/get_Pdata" ><span class="glyphicon glyphicon-list"></span> ตรวจสอบสินค้า <!-- span class="badge pull-right">42</span --></a></li>
                        <li><a href="index.php/backend/check_news_data" ><span class="glyphicon glyphicon-list"></span> จัดการข่าว</a></li>
                        <li><a href="index.php/backend/get_category" ><span class="glyphicon glyphicon-list"></span> ตรวจสอบหมวด</a></li>
                        <li><a href="index.php/backend/get_sub_category" ><span class="glyphicon glyphicon-list"></span> ตรวจสอบหมวดย่อย</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <div class="col-sm-9 col-md-10 affix-content">
        <div class="container">

