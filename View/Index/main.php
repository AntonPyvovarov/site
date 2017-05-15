<h1>Welcome to Irina <?php echo $data ['siteName'] ?> </h1>
<!-- Carousel
   ================================================== -->
<div class="row">

    <div class="col-md-10 col-md-offset-1 ">
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
                <?php } ?>
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
    </div>

</div>
<div class="row">
    <div class="address">
        <h1>h1. Заголовок Bootstrap <small>Додатковий текст</small></h1>
        <h2>h2. Заголовок Bootstrap <small>Додатковий текст</small></h2>
        <h3>h3. Заголовок Bootstrap <small>Додатковий текст</small></h3>
        <h4>h4. Заголовок Bootstrap <small>Додатковий текст</small></h4>
        <h5>h5. Заголовок Bootstrap <small>Додатковий текст</small></h5>
        <h6>h6. Заголовок Bootstrap <small>Додатковий текст</small></h6>
    </div>
</div>

