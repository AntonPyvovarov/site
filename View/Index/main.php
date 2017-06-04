<h1>Welcome to <?php echo SITE_NAME ?> </h1>
<!-- Carousel
   ================================================== -->


<div id="myCarousel" class="carousel slide " data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php for ($i = 0; $i <= 2; $i++) { ?>
            <li data-target="#myCarousel" data-slide-to="<?php echo $i ?>" class="<?php if ($i <= 0) {
                echo "active";
            } ?>"></li>
        <?php } ?>
    </ol>
    <!-- End Indicators           -->
    <div class="carousel-inner" role="listbox">
        <?php $counter = 1;
        if ($data['carousel']) {
            foreach ($data['carousel'] as $carousel) { ?>
                <div class="item <?php if ($counter <= 1) {
                    echo " active";
                } ?> ">
                    <div class=" img-responsive">
                        <img src="<?php echo $carousel['photo'] ?>" alt="slide">
                    </div>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1> <?php echo $carousel['title'] ?></h1>
                            <p> <?php echo $carousel['short_content'] ?></p>
                            <p><a class="btn btn-lg btn-primary" href="News/item/<?php echo $carousel['id'] ?>"
                                  role="button">Go to READ</a></p>
                        </div>
                    </div>
                </div>
                <?php $counter++ ?>
            <?php }
        } ?>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Попередня</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Наступна</span>
    </a>
</div><!-- /.carousel -->

<br><br><br><br>
<?php if ($data['mainNews']) {
    foreach ($data['mainNews'] as $news) { ?>
        <div class="col-xs-6 col-lg-4 mainNews">
            <img src="<?php echo $news['photo']  ?>" class="img-responsive " alt="Responsive image">
            <h2><?php echo $news['title'] ?></h2>
            <p><?php echo $news['short_content'] ?> </p>
            <p><a class="btn btn-success" href="News/item/<?php echo $news['id'] ?>" role="button">Проглянути деталі
                    &raquo;</a></p>
            <br><br>
        </div><!--/.col-xs-6.col-lg-4-->
    <?php }
} ?>
<!--/row-->


