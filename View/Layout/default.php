<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo SITE_NAME ?></title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://getbootstrap.com/examples/starter-template/starter-template.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <base href="/site/">
</head>
<body>
<div>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=""><?php echo SITE_NAME ?></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Категорії
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <?php
                            foreach ($data['menu'] as $category) { ?>
                                <li>
                                    <a href="News/category/<?php echo $category['id'] ?>"><?php echo $category['category'] ?></a>
                                </li>
                            <?php } ?>

                        </ul>
                    </li>
                    <li><a href=" Index/contact/">Contact</a></li>
                </ul>
                <form class="navbar-form navbar-left" role="search" method="POST">
                    <div class="form-group">
                        <input class="form-control" placeholder="search" name="search" type="text">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <?php if (!\Common\Session::get ( 'user' )) { ?>
                        <!-- before login-->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">Вход
                                на сайт <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href=" User/register">Регістрація</a></li>
                                <li><a href=" User/login">Вхід</a></li>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <!--  after login-->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                <?php echo \Common\Session::get ( 'user' ) ?>
                                на сайті <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <?php if (\Common\Session::get ( 'isAdmin' ) === "1") { ?>
                                    <li><a href=" Admin/index">Адмінка</a></li>
                                <?php } ?>
                                <li><a href=" User/logOut">Вихід</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar-->


    <div class="container-fluid">
        <div class="starter-template">
            <!--        Left side-->
            <div class="row  col-sm-9 col-md-9 col-lg-9">


                <div class="col-sm-12 col-md-offset-1 col-md-11">
                    <!--  start search      -->
                    <?php if (isset( $this->data['search'] )) { ?>
                        <h1>this is search</h1>
                        <div class=" row ">

                            <br>
                            <?php if ($this->data['search']) {
                                foreach ($this->data['search'] as $news) { ?>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="thumbnail ">
                                            <p><?php echo $news['id'] ?></p>
                                            <div>
                                                <img src="http://localhost/mySite/View/img/<?php echo $news ['photo'] ?>"
                                                     class=" photo-img-responsive img-responsive center-block"
                                                     alt="Чутливе зображення">
                                            </div>

                                            <div class="caption">
                                                <h3><?php echo $news ['title'] ?></h3>

                                                <p><a href="News/item/<?php echo $news['id'] ?>" class="btn btn-primary"
                                                      role="button">Перейти</a></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            } ?>
                        </div>
                        <!-- End search-->

                    <?php } else { ?>
                        <div><?php echo $content ?></div>
                    <?php } ?>

                    <!--     END        show content-->
                </div>
            </div>
            <!--        right    side-->
            <div class=" col-sm-3 col-md-3 col-lg-3">
                <h2>Right side</h2>

                <?php if ($data['mainNews']) {
                    foreach ($data['mainNews'] as $news) { ?>

                        <div class="    ">
                            <img src="http://localhost/mySite/View/img/<?php echo $news['photo'] ?>"
                                 class="img-responsive " alt="Responsive image">
                            <h2><?php echo $news['title'] ?></h2>
                            <p><?php echo $news['short_content'] ?> </p>
                            <p><a class="btn btn-success" href="News/item/<?php echo $news['id'] ?>"
                                  role="button">Проглянути деталі
                                    &raquo;</a></p>
                            <br>
                        </div>

                    <?php }
                } ?>
            </div>


        </div>
    </div>
    <div class="starter-template"

    <footer class="footer panel-footer navbar-fixed-bottom">
        <div class="container">
            <a class="btn btn-social-icon btn-twitter">
                <span class="fa fa-twitter"></span>
            </a>
            <a class="btn btn-social-icon btn-vk">
                <span class="fa fa-vk"></span>
            </a>
            <a class="btn btn-social-icon btn-facebook">
                <span class="fa fa-facebook-official"></span>
            </a>

        </div>
    </footer>
</div>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="View/Bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="View/Bootstrap/css/bootstrap-social.css">
<link rel="stylesheet" href="View/Bootstrap/css/font-awesome.css">
<link rel="stylesheet" href="View/Bootstrap/css/main.css">

<!-- Optional theme -->
<!--<link rel="stylesheet" href="/View/Bootstrap/css/bootstrap-theme.css">-->
<!--  JavaScript -->
<script src="View/Bootstrap/js/bootstrap.js"></script>

</body>
</html>