<div class=" row ">

<br>
<?php if ($data['search']) {
    foreach ($data['search'] as $news) { ?>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail ">
                <p><?php echo $news['id'] ?></p>
                <div><img src="<?php echo $news ['photo'] ?>"
                          class=" photo-img-responsive img-responsive center-block" alt="Чутливе зображення">
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
