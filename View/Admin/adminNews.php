<h1>News on Admin page</h1>
<br>
 <table class="table table-bordered">
    <?php foreach ($data['news'] as $news){ ?>
        <tr>
            <td><?php echo $news['id'] ?></td>
            <td><?php echo $news['title'] ?></td>
            <td><?php echo $news['date'] ?></td>
            <td><?php echo $news['raiting'] ?></td>
        </tr>
    <?php } ?>
</table>

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