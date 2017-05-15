<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo SITE_NAME ?></title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    font awesome-->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="http://getbootstrap.com/examples/starter-template/starter-template.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <base href="/mySite/">
</head>
<body>

<!-- navbar-->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed"
                    data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand " href=" "><?php echo SITE_NAME ?></a>
        </div>

        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href=" ">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Category
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="News/category/1">Категория 1</a></li>
                        <li><a href="News/category/5">Категория 5</a></li>
                    </ul>
                </li>
                <li><a href=" Index/contact/">Contact</a></li>
               <li> <button type="button" class="btn btn-default" aria-label="Left Align">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
               </li>
            </ul>


            <!-- Right side nav-bar menu -->

            <ul class="nav navbar-nav pull-right">
                <?php if (!\Common\Session::get ( 'user' )) { ?>
                    <!-- before login-->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Вход
                            на сайт <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href=" User/register">Регістрація</a></li>
                            <li><a href=" User/login">Вхід</a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                        <!--  after login-->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <?php echo \Common\Session::get ( 'user' ) ?>
                            на сайті <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <?php if(\Common\Session::get('isAdmin')==="1"){ ?>
                            <li><a href=" Admin/index">Адмінка</a></li>
                            <?php } ?>
                            <li><a href=" User/logOut">Вихід</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>

        </div><!--/.nav-collapse -->
    </div>
</nav>

<!--category-->
<?php //print_r($data['menu'])?>
<?php //foreach($data['menu'] as $category){?>
<?php // echo $category['category']?><!--<br>-->
<?php //}?>
<!--end Category-->

<!--Show message-->

<div class="container-fluid">
    <div class="starter-template">
        <div class="row ">
            <!--        Left block    advertising-->
            <div class="col-md-2">
                <p>Left side</p>
            </div>
            <!--            End left block advertising-->

            <div class="col-md-8">
                <?php if ($message) { ?>
                    <!--                    message block-->
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span>
                        </button>
                        <?php echo $message; ?>
                    </div>
                <?php } ?>
                <!--                    end message block-->
                <!--                show content-->
                <?php echo $content ?>
            </div>
            <!--        right    advertising block-->
            <div class="col-md-2">
                <p>Right side</p>
            </div>
            <!--            end right block-->
        </div>
    </div>

</div>
<!--End show message-->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="View/Bootstrap/css/bootstrap.css">

<!-- Optional theme -->
<!--<link rel="stylesheet" href="/View/Bootstrap/css/bootstrap-theme.css">-->
<!-- Latest compiled and minified JavaScript -->
<script src="View/Bootstrap/js/bootstrap.js"></script>

</body>
</html>