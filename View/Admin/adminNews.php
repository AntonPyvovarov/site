<h1>News on Admin page</h1>
<br>
 <table class="table table-bordered">
    <?php foreach ($data['news'] as $news){ ?>
        <tr>
            <td><?php echo $news['id'] ?></td>
            <td><?php echo $news['title'] ?></td>
            <td><?php echo $news['date'] ?></td>
            <td><a class="btn btn-warning" href="" role="button">Редагувати</a></td>
            <td>
                <form class="form-inline" role="form" method="post">
                    <input type="hidden" name="action" value="deleteNews"/>
                    <input type="hidden" name="id" value="<?php echo $news['id'] ?>"/>
                    <button class="btn btn-danger" type="submit">Удалить</button>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>
<br>
<nav>
    <ul class="pagination">
        <?php foreach ($data['page']->buttons as $button) {
            if ($button->isActive) { ?>
                <li>
                    <a href="Admin/news/<?php echo  $data['news'][0]['category_id'] ?>?page=<?php echo  $button->page ?>">
                        <?= $button->text ?>
                    </a>
                </li>
            <?php }else { ?>
                <li>
                    <span style="color:#555555"><?php echo  $button->text ?></span>
                </li>
            <?php }} ?>
    </ul>
</nav>