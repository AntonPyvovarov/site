<div class=" row ">
    <div class="page-header">
        <h1><?php echo $data['category'][0]['category'] ?>

        </h1>
    </div>
    <?php if ($data['category']) {
        foreach ($data['category'] as $news) { ?>
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

<!--pagination-->
<hr/>
<nav>
    <ul class="pagination">
<?php foreach ($data['page']->buttons as $button) :
    if ($button->isActive) : ?>

        <li>
            <a href="News/category/<?= $data['category'][0]['category_id'] ?>?page=<?= $button->page ?>">
                <?= $button->text ?>
            </a>
        </li>
    <?php else : ?>
       <li>
           <span style="color:#555555"><?= $button->text ?></span>
       </li>

    <?php endif;
endforeach;
?>
    </ul>
</nav>
<!--End Pagination-->




<!---->
<!--<div class="table-responsive">-->
<!--    <table class="table">-->
<!--        --><?php //foreach ($data['category'] as $k => $news) { ?>
<!--            <tr>-->
<!--                <td>-->
<!--                    <p><a href="Category/item/--><?php //echo $news['id'] ?><!--"--><?php //echo $news ['title'] ?><!--</a></p><br>-->
<!--                    --><?php //echo $news ['category_id'] ?>
<!--                    --><?php //echo $news ['short_content'] ?><!--<br>-->
<!--                </td>-->
<!---->
<!--            </tr>-->
<!--        --><?php //} ?>
<!--    </table>-->
<!--</div>-->
<!---->
